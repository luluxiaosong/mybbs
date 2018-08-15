<?php if (!defined('BASEPATH')) exit('No access script allowed');

class user extends base_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('post_m');
    }

    //ajax检测用户名
    public function check_name()
    {
        if (!empty($_GET['name'])) {
            //查询是否已存在
            if ($this->user_m->check_name($_GET['name'])) {
                echo "<span style='color:#22a814cc'>OK</span>";
            } else {
                echo '已被注册，请更换';
            }
        } else {
            echo '请填写用户名';
        }
    }

    /*注册新用户
    */
    public function register()
    {
        //注册界面
        if(empty($_POST)){
            $this->load->view('home/register');
            return;
        }
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        $code = $this->input->post('captcha_code');
        //验证码检测
        if (strtolower($_SESSION['code']) == strtolower($code)) {
            //电子邮件检测
            if ($this->user_m->email($email)) {
                //用户名检测
                if ($this->user_m->check_name($username)) {
                    //密码检测
                    if (!empty($password) && !empty($password_confirm) && $password == $password_confirm) {
                        //入库
                        $data[''] = $username;
                        $data['email'] = $email;
                        $data['password'] = md5($password);
                        $data = array(
                            'username' => $username,
                            'email' => $email,
                            'password' => md5($password),
                            'regtime' => time()
                        );
                        if ($this->user_m->register($data)) {
                            echo "<script>alert('注册成功');location.href = '".site_url('home')."'</script>";
                            return;
                        } else {
                            echo "<script>alert('注册失败，未知原因，请重试');history.back();</script>";
                        }
                    } else {
                        echo "<script>alert('请正确填写密码'); history.back();</script>";
                    }
                } else {
                    echo "<script>alert('用户名不可用，请更改'); .history.back();</script>";
                }
            } else {
                echo "<script>alert('电子邮件不能使用，请重新填写'); history.back();</script>";
            }
        } else {
            echo "<script>alert('验证码错误,请重新填写'); history.back();</script>";
        }
    }

    public function login()
    {
        //登陆页面
        if(empty($_POST)){
            $this->load->view('home/login');
            return;
        }
        //验证码判断
        if (strtolower($_SESSION['code']) !== strtolower($this->input->post('captcha_code'))) {
            echo "<script>alert('验证码不正确');window.history.back();</script>";
            exit;
        }
        //用户名密码判断
        $data['username'] = strtolower($_POST['username']);
        $data['password'] = md5(strtolower($_POST['password']));
        //登陆成功
        if ($this->user_m->login($data)) {
            redirect('home');
        } else {
            echo "<script>alert('用户名或密码不正确，请重新登陆');history.back();</script>";
        }
    }


    //查看用户主页
    public function user_home()
    {
        $uid = $this->uri->segment(3);
        //基本资料
        $data['user'] = $this->user_m->get_user_by_uid($uid);
        //我是否已关注TA
        $data['is_follow'] = $this->user_m->is_follow($uid);
        //分页
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $param = array(
        'url'=> site_url("user/user_home/$uid"),
        'page'=> $page,
        'per_page'=> $this->config->item('page_nums'),
        'rows' => $this->post_m->posts_rows_by_uid($uid)
    );
        $this->load->library('page_turn',$param);
        $left = $this->page_turn->left();
        $data['page_link'] = $this->page_turn->page_link();
        $data['posts_list'] = $this->post_m->get_posts_by_uid($uid,$param['per_page'],$left);

        $this->load->view('home/user_home', $data);
    }
    //添加关注
    public function follow_add()
    {
        //判断登陆
        if(empty($_SESSION['uid'])){
            echo "<script>alert('请登陆！');history.back()</script>";
            exit;
        }
        //关注对象uid
        $follow_uid = $this->uri->segment(3);
        if($this->db->insert('follows',array('create_uid'=>$_SESSION['uid'], 'follow_uid'=>$follow_uid))){
            echo "<script>alert('关注成功');history.back();</script>";
            return;
        }
    }


    //会员列表
    public function user_list()
    {
        $data['nav_active'] = 'user';
        $data['users'] = $this->user_m->user_list();
        $this->load->view('home/user_list',$data);
    }

    //ajax 点赞 判断$_SESSION['thumb_up_xx']
    public function thumb_up()
    {
        $comment_id = $this->input->post('comment_id');
        //已赞
        if( !empty($_SESSION['thumb_'.$comment_id]) ){
            exit('NO');
        }else{
            $this->load->model('comment_m');
            $thumbs = $this->comment_m->thumbs($comment_id);
            if($this->db->where('id', $comment_id)
                ->update('comments',array('thumb_up'=>$thumbs + 1)))
            {
                $_SESSION['thumb_'.$comment_id] = 1;
                echo 'yes';
            }else{
                echo 'no';
            }


        }
    }

    //退出登陆
    public function out()
    {
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        unset($_SESSION['user_type']);
        redirect('home');
    }

}

?>
