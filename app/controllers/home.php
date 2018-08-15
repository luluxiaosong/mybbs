<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends base_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    //首页
    public function index()
    {
        $this->load->model('post_m');
        $this->load->model('topic_m');
        //导航选项
        $data['nav_active'] = 'home';
        //当前页 默认为1
        $page= $this->input->get('page') ? $this->input->get('page') : 1;
        //分页
        $param = [
            'rows' => $this->post_m->get_posts_number_all(),//总记录数
            'per_page' => $this->config->item('page_nums'),//每页条数
            'url' => site_url('home/index'),
            'page' => $page //当前页数
        ];
        $this->load->library('page_turn', $param);
        $data['page_link'] = $this->page_turn->page_link();
        $left = ($page - 1) * $param['per_page']; //偏移起点
        //帖子列表
        $data['posts'] = $this->post_m->get_posts_all($param['per_page'], $left);
        //热门话题
        $data['topics'] = $this->topic_m->get_topics_hot();
        $this->load->view('home/home.php', $data);
    }
}





