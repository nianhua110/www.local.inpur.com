<?php
/**
 * 网站首页
 */
class Welcome extends CI_Controller {
	public function index() {
		//模型		
		$this->load->model('lists');
		$this->load->model('category');
		
		//获取分类类目
		$data['category'] = $this->category->getAllCategory();
		
		//获取企业案例
		$data['case'] = $this->lists->getList(5,0,5);
		
		//网站信息
		$data['site'] = parent::getSiteValue();
		
		//标题
		$data['title'] = '首页';
		
		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer',$data);
	}
}