<?php
/**
 * 类目列表
 */
define('PAGESIZE', 14);

class Cate extends CI_Controller {
	public function index() {
		//模型
		$this->load->model('category');
        $this->load->model('lists');
		
		//参数
		$cid = $this->input->get('cid',TRUE);
        $page = $this->input->get('page',TRUE);
		
		//判断ID是否存在
		$cid_exist = $this->category->isCid($cid);
		
		if(!$cid_exist) {
			show_404();
		}
        
        //获取分类下文章列表
        if($page && $page > 1) {
            $offset = ($page - 1) * PAGESIZE;
        } else {
            $offset = 0;
        }        
        $data['list'] = $this->lists->getList($cid,$offset,PAGESIZE);
		
		//网站信息
		$data['site'] = parent::getSiteValue();
		
		//获取分类类目
		$data['category'] = $this->category->getAllCategory();
		
		//标题
		$cname = $this->category->getCname($cid);
		$data['title'] = $cname['cname'];

		$this->load->view('common/header',$data);
		$this->load->view('cate',$data);
		$this->load->view('common/footer',$data);
	}
}