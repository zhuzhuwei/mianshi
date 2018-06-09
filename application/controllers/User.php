<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends \MY_Controller {

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
    function __construct()
    {
        parent::__construct();
        $this->load->model('User', 'muser');
    }





	public function index()
	{
        $this->load->view('user/index');
	}


	//添加分类
	public function add_category(){
        $data['name'] = trim($this->input->post('title'));
        $data['add_time']=time();
        $inset = $this->db->insert('category', $data);

        if($inset){
            redirect('/user/index');
        }else{
            echo "添加失败";
        }
    }


    public function add_question(){
        $category = $this->muser->get_all_category();
        $data['list'] = $category;
        $this->load->view('user/question',$data);
    }

    public function question_save(){

        $_POST['add_time'] = time();
        $_POST['update_time'] = time();

        $inset = $this->db->insert('questions', $_POST);



        if($inset){
            redirect('/user/add_question');
        }else{
            echo "添加失败";
        }
    }
    //获取所有的分类
    public function get_category(){
        $list =  $this->db->select('*')->from('category')->get()->result_array();
        foreach ($list as $key=>$value){
            $array[]=array('name'=>$value['name'],'id'=>$value['id']);
        }
        self::json_output(array('status'=>1,'msg'=>'成功','data'=>$array));

    }


    //获取分类的题干
    public function get_by_category_id_question(){

        if(isset($_GET['nextid'])){
            $next =$_GET['nextid']+1;
        }else{
            $next =0;
        }
        $list =  $this->db->select('*')->from('questions')->where('category_id',$_GET['category'])->order_by('level ASC')->limit(1,$next)->get()->row_array();
        $array = array('title'=>$list['title'],'body'=>$list['body'],'next'=>$next,'category'=>$_GET['category']);
        self::json_output(array('status'=>1,'msg'=>'成功','data'=>$array));
    }


    public function get_question_list(){

        $start = $this->input->get('per_page') ? $this->input->get('per_page') : 0;

        $this->load->library('pagination');
        $result = $this->db->select('s.title,s.id,s.add_time,si.name')
            ->from('questions AS s' )
            ->join('category AS si', 's.category_id = si.id', 'left' )
            ->limit(5, $start)
            ->get()->result_array();


        $count = $this->db->select('s.title,s.id,s.add_time,si.name')
            ->from('questions AS s' )
            ->join('category AS si', 's.category_id = si.id', 'left' )
            ->count_all_results();


        $data['list'] = $result;

        $data['pagination'] = $this->page_config('/user/get_question_list',$count);



        $this->load->view('user/question_list',$data);

    }


    //分页函数
    protected function page_config($url,$count,$limit=5){
        $config['base_url'] = $url;
        $config['total_rows'] = $count;
        $config['per_page'] = $limit;
        $config['page_query_string'] = true;
        $config['enable_query_strings'] = true;
        $config['reuse_query_string'] = true;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }


}
