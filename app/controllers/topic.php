<?php if (!defined('BASEPATH')) exit('No direct acces script allowed');

class Topic extends base_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('topic_m');
        $this->load->model('post_m');

    }

    //全部话题列表
    public function topic_list()
    {
        //顶部导航
        $data['nav_active'] = 'topic';
        $data['topics'] = $this->topic_m->get_topics_all();
        $this->load->view('home/topic_list',$data);
    }
    //话题详情 帖子列表
    public function show()
    {
        //话题列表
        $data['topics'] = $this->topic_m->get_topics_hot();
        //帖子
        $topic_id = $this->uri->segment(3);
        $data['topic_id'] = $topic_id;
        //当前话题数据
        $data['topic'] = $this->topic_m->get_topic_by_topic_id($topic_id);
        //分页 首页默认为1
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        //默认以最新回复时间排序
        $data['option'] = $this->input->get('option') ? $this->input->get('option'): 'new';
        if( $data['option'] == 'new'){
            $param = [
                'rows' => $this->post_m->post_count_by_topic_id($topic_id),//当前话题下总帖子数
                'per_page' => $this->config->item('page_nums'),//每页条数
                'url' => site_url("topic/show/$topic_id?option=new"),
                'page' => $page //当前页数
            ];
            $this->load->library('page_turn', $param);
            $left = ($page - 1) * $param['per_page']; //偏移
            $data['page_link'] = $this->page_turn->page_link();
            $data['posts'] = $this->post_m->get_posts_by_topic_id($topic_id,$param['per_page'], $left);
        }
        // 可根据精品查看
        if($this->input->get('option') == 'good'){
            $data['option'] = 'good';
            $param = [
                'rows' => $this->post_m->post_good_count_by_topic_id($topic_id),//当前话题精品帖子数
                'per_page' => $this->config->item('page_nums'),//每页条数
                'url' => site_url("topic/show/$topic_id?option=good"),
                'page' => $page //当前页数
            ];
            $this->load->library('page_turn', $param);
            $left = ($page - 1) * $param['per_page']; //偏移
            $data['page_link'] = $this->page_turn->page_link();
            $data['posts'] = $this->post_m->get_posts_good_by_topic_id($topic_id,$param['per_page'], $left);
        }

        $this->load->view('home/topic', $data);
    }
}