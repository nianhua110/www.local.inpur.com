<?php
/**
 * 后台管理
 */
define('PAGESIZE', 20);
 
class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user');
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	//管理首页
	public function index() {
		$this->isLogin();
		$this->load->view('/admin/index.php');
	}
	
	//登录页面
	public function Login() {
		$this->session->sess_destroy();
		$this->load->view('/admin/login.php');
	}
	
	//用户登录
	public function goLogin() {
		$username	=	$this->input->post('username',TRUE);
		$password	=	$this->input->post('password',TRUE);
		
		if(!$username || !$password) {
			exit(json_encode(array('status'=>false,'info'=>'用户名或密码不能为空')));
		}
		
		$password	=	md5($password);
		$res		=	$this->user->ckeckLogin($username, $password);
		
		if(!$res) {
			exit(json_encode(array('status'=>false,'info'=>'用户名或密码错误')));
		}else{
			$sess	=	array('username'=>$username);
			$this->session->set_userdata($sess);
			exit(json_encode(array('status'=>true,'info'=>'登录成功，跳转中...')));
		}
	}
	
	//用户退出
	public function Logout(){
		$this->session->sess_destroy();
		redirect();
	}

	//验证是否登录
	private function isLogin(){
		if(!$this->session->userdata('username')) {
			redirect("c=admin&m=Login");
		}
	}
	
	//服务器信息
	public function info() {
		$this->isLogin();
		$data = array(
						'HTTP_HOST' => $_SERVER['HTTP_HOST'],
						'SERVER_SOFTWARE' => $_SERVER['SERVER_SOFTWARE'],
						'MYSQL_VERSION' => mysql_get_server_info(),
						'SERVER_PORT' => $_SERVER['SERVER_PORT'],
						'IP' => $this->input->ip_address(),
						'USER' => $this->session->userdata('username'),
					);
		$this->load->view('/common/admin_header');
		$this->load->view('/admin/info.php',$data);
		$this->load->view('/common/admin_footer');
	}
	
	//站点设置
	public function site() {
		$this->isLogin();		
		$data = parent::getSiteValue();
		$this->load->view('/common/admin_header');
		$this->load->view('/admin/site',$data);
		$this->load->view('/common/admin_footer');
	}
	
	//更新站点设置
	public function updateSite() {
	    $this->isLogin();
		$arr = array(
						'copyright' => $this->input->post('copyright',TRUE),
						'address' => $this->input->post('address',TRUE),
						'zipcode' => $this->input->post('zipcode',TRUE),
						'tel' => $this->input->post('tel',TRUE),
						'fax' => $this->input->post('fax',TRUE),
						'email' => $this->input->post('email',TRUE)
					);
		
		if(!empty($arr)) {
			$this->load->model('site');
			$res = $this->site->updateValue($arr);
			if($res) {
				exit(json_encode(array('status'=>true)));
			}
		}
		
		exit(json_encode(array('status'=>false)));
	}
	
	//类目
	public function category() {
		$this->isLogin();
		
		//获取类目列表
		$this->load->model('category');
		$data['category'] = $this->category->getAllCategory();
		
		$this->load->view("common/admin_header");
		$this->load->view("/admin/category",$data);
		$this->load->view("common/admin_footer");
	}
	
	//添加类目
	public function addcategory() {
		$this->isLogin();
		$this->load->model('category');
		
		$cname      =  $this->input->post('cname',TRUE);
		$view_order =  $this->input->post('view_order',TRUE);
		$links      =  $this->input->post('links',TRUE);
		
		if(!$cname || !$view_order) {
			exit(json_encode(array('status'=>false,'info'=>'类目名称或类目排序不能为空')));
		}
		
		//类目名称是否已存在
		$name_exist = $this->category->isCategory($cname);		
		if($name_exist) {
			exit(json_encode(array('status'=>false,'info'=>'类目名称已存在')));
		}
		
		//类目排序是否已存在
		$order_exist = $this->category->isOrder($view_order);		
		if($order_exist) {
			exit(json_encode(array('status'=>false,'info'=>'类目排序已存在')));
		}
		
		//添加类目
		$res = $this->category->addCategory($cname, $view_order, $links);
		if($res){
			exit(json_encode(array('status'=>true,'info'=>'添加成功')));
		}else{
			exit(json_encode(array('status'=>false,'info'=>'添加失败')));
		}
	}
    
    //删除分类
    public function delcate() {
        $this->isLogin();
        $this->load->model('category');
        
        $cid = $this->input->post('cid',TRUE);
        
        if(!$cid) {
            exit(json_encode(array('status'=>false,'info'=>'传入参数错误，删除失败')));
        }
        
        $cid_exist = $this->category->isCid($cid);
        
        if(!$cid_exist) {
            exit(json_encode(array('status'=>false,'info'=>'传入参数错误，删除失败')));
        }
        
        //删除操作
        $res = $this->category->delCate($cid);
        
        if($res){
            exit(json_encode(array('status'=>true,'info'=>'删除成功')));
        }else{
            exit(json_encode(array('status'=>false,'info'=>'删除失败')));
        }
    }
    
    //更新分类
    public function updatecate() {
        $this->isLogin();
        $this->load->model('category');
        
        $cid        =  $this->input->post('cid',TRUE);
        $cname      =  $this->input->post('cname',TRUE);
        $view_order =  $this->input->post('view_order',TRUE);
        $links      =  $this->input->post('links',TRUE);
        
        if(!$cid) {
            exit(json_encode(array('status'=>false,'info'=>'传入参数错误，更新失败')));
        }
        
        if(!$cname || !$view_order) {
            exit(json_encode(array('status'=>false,'info'=>'类目名称或类目排序不能为空')));
        }
        
        //类目是否存在
        $cid_exist = $this->category->isCid($cid);
        
        if(!$cid_exist) {
            exit(json_encode(array('status'=>false,'info'=>'传入参数错误，更新失败')));
        }
        
        //类目名称是否已存在
        $name_exist = $this->category->isCategory($cname, $cid);      
        if($name_exist) {
            exit(json_encode(array('status'=>false,'info'=>'类目名称已存在')));
        }
        
        //类目排序是否已存在
        $order_exist = $this->category->isOrder($view_order, $cid);       
        if($order_exist) {
            exit(json_encode(array('status'=>false,'info'=>'类目排序已存在')));
        }
        
        //更新类目
        $res = $this->category->updateCategory($cid, $cname, $view_order, $links);
        
        
        if($res) {
            exit(json_encode(array('status'=>true,'info'=>'更新成功')));
        } else {
            exit(json_encode(array('status'=>false,'info'=>'更新失败')));
        }
        
    }
	
	//文章列表
	public function lists() {
		$this->isLogin();
        $this->load->model('lists');
        
        //获取参数
        $page = $this->input->get('page',true);
        $cid = $this->input->get('cid',true);
        
        //统计总记录
        $count = $this->lists->getAll($cid);
        
        //统计总页码
        $sum  = ceil($count / PAGESIZE);
        
        //页码过滤
        $page = round($page);
        
        
        //页码判断
        if($page < 1) {
            $page = 1;
        }
        
        if(($page-1) * PAGESIZE > $count) {
            $page = $sum;
        }
        
        //取记录
        $data['news'] = $this->lists->getLists(($page-1),PAGESIZE,$cid);
        
        //分页参数
        $data['page']['prev'] = ($page > 1) ? ($page - 1) : '';
        $data['page']['next'] = ($page < $sum) ? ($page + 1) : '';
        $data['page']['sum'] = $sum;
        $data['page']['current'] = $page;
        $data['page']['cid'] = $cid;
        
		$this->load->view("common/admin_header");
		$this->load->view("/admin/lists",$data);
		$this->load->view("common/admin_footer");
	}
    
    //添加文章
    public function addnews() {
        $this->isLogin();
        $this->load->model('category');
        
        //文章分类
        $data['category'] = $this->category->getAllCategory();
        $data['author'] = $this->session->userdata('username');
        
        $this->load->view("/common/admin_header");
        $this->load->view("/admin/addnews",$data);
        $this->load->view("/common/admin_footer");
    }
    
    //增加记录
    public function addcontent() {
        $this->isLogin();
        $this->load->model('lists');
        $this->load->model('category');
        
        $title = strip_tags($this->input->post('title',TRUE));
        $author = strip_tags($this->input->post('author',TRUE));
        $links = strip_tags($this->input->post('links',TRUE));
        $cid = strip_tags($this->input->post('category',TRUE));
        $content = $this->input->post('content',TRUE);
        
        //文章标题
        if(!$title) {
            exit(json_encode(array('status'=>false,'info'=>'请输入标题')));
        }
        
        //文章分类ID是否存在
        $cid_exist = $this->category->isCid($cid);        
        if(!$cid_exist) {
            exit(json_encode(array('status'=>false,'info'=>'文章分类错误')));
        }
        
        //文章内容
        if(!$content) {
            exit(json_encode(array('status'=>false,'info'=>'请输入文章内容')));
        }
        
        $data['title'] = $title;
        $data['author'] = $author ? $author : $this->session->userdata('username');
        $data['cid'] = $cid;
        $data['links'] = $links;
        $data['content'] = $content;
        $data['datetime'] = time();
        $data['is_show'] = 1;
        
        $res = $this->lists->addList($data);
        
        if($res) {
            exit(json_encode(array('status'=>true,'info'=>'添加成功')));
        } else {
            exit(json_encode(array('status'=>false,'info'=>'添加失败')));
        }
    }
	
	//用户
	public function user() {
		$this->isLogin();
		$data['user'] = $this->user->getAllUser();
		$this->load->view("/common/admin_header");
		$this->load->view("/admin/user",$data);
		$this->load->view("/common/admin_footer");
	}
	
	//添加新用户
	public function adduser() {
		$this->isLogin();
		$username	=	$this->input->post('username',TRUE);
		$password   =   $this->input->post('password',TRUE);
		
		if(!$username || !$password) {
			exit(json_encode(array('status'=>false,'info'=>'用户名或密码不能为空')));
		}
		
		$is_exit	=	$this->user->checkUsername($username);
		
		if($is_exit){
			exit(json_encode(array('status'=>false,'info'=>'用户名已存在')));
		}
		
		$password	=	md5($password);
		
		$res		=	$this->user->addUser($username,$password);
		
		if($res){
			exit(json_encode(array('status'=>true,'info'=>'用户添加成功')));
		}else{
			exit(json_encode(array('status'=>false,'info'=>'用户添加失败')));
		}
	}
	
	//删除用户
	public function deluser() {
		$this->isLogin();
		$id	=	$this->input->post('id',TRUE);
		
		if(!$id || !is_numeric($id)) {
			exit(json_encode(array('status'=>false,'info'=>'参数错误')));
		}
		
		$res = $this->user->delUser($id);
		
		if($res){
			exit(json_encode(array('status'=>true,'info'=>'删除成功')));
		}else{
			exit(json_encode(array('status'=>false,'info'=>'删除失败')));
		}	
	}
    
    //更新用户
    public function updateuser() {
        $this->isLogin();
        $this->load->model('user');
        
        $id = $this->input->post('id',true);
        $password = $this->input->post('password',true);
        $password_confirm = $this->input->post('password_confirm',true);
        
        if($password != $password_confirm) {
            exit(json_encode(array('status'=>false,'info'=>'密码输入不一致')));
        }
     
        $password = md5($password);
        
        $res = $this->user->updateUser($id, $password);
        
        if($res){
            exit(json_encode(array('status'=>true,'info'=>'更新成功')));
        }else{
            exit(json_encode(array('status'=>false,'info'=>'更新失败')));
        }
    }
}