<?php
/**
 * 文章详细
 */
class Detail extends CI_Controller {
	public function index() {
	    //模型
        $this->load->model('category');
        $this->load->model('lists');
        
        //文章ID
		$id = $this->input->get('id');
		
		if(!$id || !is_numeric($id)){
			show_404();
		}
		
		//文章内容
		$data['detail'] = $this->lists->getDetail($id);
		
		if(empty($data['detail'])){
			show_404();
		}
        
        //获取分类类目
        $data['category'] = $this->category->getAllCategory();
		
		//网站信息
		$data['site'] = parent::getSiteValue();
        
        //标题
        $data['title'] = $data['detail']['title'];
		
		$this->load->view('common/header',$data);
		$this->load->view('detail',$data);
		$this->load->view('common/footer',$data);
	}
}