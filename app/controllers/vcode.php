<?php if (!defined('BASEPATH')) exit('No access script allowed');

class vcode extends CI_Controller
{

    //验证码 保存在$_SESSION['code']
    public function index()
    {
        session_start();
        $this->load->library('captcha');
        $this->captcha->show();
    }
}
