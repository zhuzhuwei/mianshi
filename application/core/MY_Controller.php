<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends \CI_Controller
{
    //令牌名称
    const TOKEN_NAME = 'token';

    //令牌有效时常
    const TOKEN_LIFE_TIME = 0;

    /**
     * 保存登录有的用户信息
     * @var array
     */
    public $user = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        if ($this->isLogin()) {
            $this->load->vars('user', $this->user);

            //$header = $this->headerCount();
            //$this->load->vars($header);
        } else {
            if($this->router->fetch_class()!='welcome'){
                redirect('/welcome/index');
            }
            //

        }

        if (isset($_GET['CRM_DEBUG']) && $_GET['CRM_DEBUG'] == 'bj') {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     * 当前http请求是否为post
     * @return bool
     */
    protected function isPOST()
    {
        return $this->input->server('REQUEST_METHOD') === 'POST';
    }

    /**
     * 当前http请求是否为ajax
     * @return mixed
     */
    protected function isAjax()
    {
        return $this->input->is_ajax_request() || isset($_GET['callback']);
    }

    /**
     * @param int $status 0管理员 1学生 2老师
     * @return bool
     */
    protected function isLogin()
    {
        if ($this->user) {
            return true;
        }
        $this->load->helper('cookie');
        $this->load->helper('encrypt');
        $token = get_cookie(self::TOKEN_NAME);
        $token = authcode($token, 'DECODE');
        $userid = 0;
        $password = '';
        if ($token) {
            $data = explode("\t", $token);
            $userid = isset($data[0]) ? $data[0] : 0;
            $password = isset($data[1]) ? $data[1] : '';
        }


        $this->load->model('User', 'muser');
        if ($userid > 0) {
            $user = $this->muser->get_user_by_id($userid, '*');
            if ($user) {
                if ($user['password'] === $password) {
                    $this->user = $user;
                    return true;
                }
            }
        }
        $this->user = array('id' => '0', 'username' => '', 'is_super' => 0);
        return false;
    }

    /**
     * ajax json输入
     * @param $data
     */
    static protected function json_output($data)
    {
        if (isset($_GET['callback'])) {
            $callback = $_GET['callback'];
            echo "{$callback}(", json_encode($data), ")";
            die;
        }
        echo json_encode($data);
        die;
    }

    /**
     * 检查请求是否过期
     * @return mixed
     */
    protected function HTTPLastModified()
    {
        $IF_MODIFIED_SINCE = $this->input->server('HTTP_IF_MODIFIED_SINCE');
        if ($IF_MODIFIED_SINCE !== false
            && (TIMESTAMP - (strtotime($IF_MODIFIED_SINCE)) < config_item('http_expires'))
        ) //(当前时间减去最后修改时间) < 不满过期周期
        {
            $this->output->set_status_header(304);
            die;
        } else {
            $Last_Modified = gmdate('D, d M Y H:i:s', TIMESTAMP) . ' GMT'; //修改时间
            $Expires = gmdate('D, d M Y H:i:s', TIMESTAMP + config_item('http_expires')) . ' GMT'; //过期时间
            $this->output->set_header('Last-Modified: ' . $Last_Modified);
            $this->output->set_header('Expires: ' . $Expires);
        }
        return;
    }

    /**
     * 头部统计信息
     */
    protected function headerCount()
    {

        $now_day = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $this->load->model('count', 'mod_count');
        $this->load->model('permission', 'depart');
        $this->load->model('message');

        $arr_user = $this->depart->get_all_user($this->user['id']);
        $str_user = implode(',', $arr_user);

        $register_num = $this->mod_count->get_register_num($str_user, $now_day);
        $class_stu_num = $this->mod_count->get_class_num($str_user, $now_day);
        $exp_num = $this->mod_count->get_exp_num($str_user, $now_day);
        $get_num = $this->mod_count->get_transfer_num($this->user['id'], 'to_id', $now_day);
        $put_num = $this->mod_count->get_transfer_num($this->user['id'], 'from_id', $now_day);
        $oper_num = $this->mod_count->get_transfer_num($this->user['id'], 'user_id', $now_day);
        $message_num = $this->message->sys_message_num();
        $view_var = array(
            'register_num' => $register_num,
            'class_stu_num' => $class_stu_num,
            'exp_num' => $exp_num,
            'get_num' => $get_num['count'],
            'put_num' => $put_num['count'],
            'oper_num' => $oper_num['count'],
            'is_master' => $oper_num['is_master'],
            'sys_message_num' => $message_num['num']
        );

        return $view_var;
    }

}
