<?php
class Category extends CI_Model {
	public function __construct() {
		parent::__construct();		
	}	
	
	//获取所有分类
	public function getAllCategory() {
		$sql = "SELECT cid,cname,view_order,links FROM category order by view_order";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
	//判断类目名称是否已存在
	public function isCategory($cname,$cid=0) {
		$sql = "select cid from category where cname = '{$cname}'";
        if($cid) {
            $sql .= " and cid != '{$cid}'";
        }
		$res = $this->db->query($sql);
		return $res->num_rows();
	}
	
	//判断类目排序是否已存在
	public function isOrder($view_order,$cid=0) {
		$sql = "select cid from category where view_order = '{$view_order}'";
        if($cid) {
            $sql .= " and cid != '{$cid}'";
        }
		$res = $this->db->query($sql);
		return $res->num_rows();
	}
	
	//判断分类ID是否存在
	public function isCid($cid) {
		$sql = "select cid from category where cid = '{$cid}'";
		$res = $this->db->query($sql);
		return $res->num_rows();
	}
	
	//取分类标题
	public function getCname($cid) {
		$sql = "select cname from category where cid = '{$cid}'";
		$res = $this->db->query($sql);
		return $res->row_array();
	}
	
	//添加类目
	public function addCategory($cname, $view_order, $links = '') {
		$data = array('cname'=>$cname,'view_order'=>$view_order,'links'=>$links);
		return $this->db->insert('category',$data);
	}
    
    //删除类目
    public function delCate($cid) {
        $data = array('cid'=>$cid);
        return $this->db->delete('category',$data);
    }
    
    //更新类目
    public function updateCategory($cid, $cname, $view_order, $links = '') {
       $data = array('cname'=>$cname,'view_order'=>$view_order,'links'=>$links);
       $this->db->where('cid',$cid);
       return $this->db->update('category',$data);
    }
} 