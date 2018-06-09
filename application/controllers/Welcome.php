<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends \MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    const TOKEN_NAME = 'token';

    const TOKEN_LIFE_TIME = 0;

	public function index()
	{


	    if($this->user['id']){
            redirect('/user/index');
        }

		$this->load->view('welcome/welcome_message');
	}

    public function login()
    {
        $this->load->helper('cookie');
        $this->load->helper('encrypt');
        $username = '';
        $errors = array();


        //parent::isLogin();

        $code = $this->input->get_post('code');
        //var_dump($code);
        if ($this->isPOST()) {
            $username = $input['username'] = trim($this->input->post('username')); //email登录
            $input['password'] = trim($this->input->post('password'));

            $this->load->model('User', 'muser');
            $user = $this->muser->get_user_by_name($input['username']);


            if ($user) {
                if (!check_password($input['password'], $user['salt'], $user['password'])) {
                    $errors= '密码错误!';
                }
            } else {
                $errors = '用户名不存在!';
            }

            if (! $errors) {
                self::_set_login_cookie($user['id'], $user['password']);
                //如果密码是11111 设置跳转到student/change_password
                echo json_encode(array('status'=>1,'msg'=>"成功"));
            }else{
                echo json_encode(array('status'=>0,'msg'=>$errors));
            }
        }

    }

    /**
     * 设置令牌
     * @param $id
     * @param $password
     */
    private static function _set_login_cookie($id, $password)
    {

        $token = authcode("{$id}\t{$password}", 'ENCODE');
        set_cookie(self::TOKEN_NAME, $token, self::TOKEN_LIFE_TIME);
        return;
    }

    public function registered(){
        $this->load->view('welcome/registered');
    }

    public function add_user(){
        $this->load->helper('encrypt');

        $this->load->database();
        $data['user'] = trim($this->input->post('nickname'));
        $data['salt']='111111';
        $data['password']=  create_password($data['salt'], $data['salt']);

        $this->db->insert('user', $data);

        print_r($data);

        print_r($_POST); die();
    }
}
