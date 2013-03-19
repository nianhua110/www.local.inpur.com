<?php
class Lists extends CI_MODEL {
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * 获取列表
	 * @param $cid 分类
	 * @param $offset 起始
	 * @param $pagesize 总数
     * @return array
	 */
	public function getList($cid, $offset, $pagesize) {
		$sql 	= 	"SELECT id,title,datetime FROM lists WHERE cid='{$cid}' ORDER BY datetime DESC limit $offset,$pagesize";
		$res 	=	$this->db->query($sql);
		return $res->result_array();
	}
	
	/**
	 * 获取详细信息
	 * @param $id
	 */
	public function getDetail($id) {
		$sql 	= 	"SELECT id,title,content,author,datetime FROM lists WHERE id={$id}";
		$res 	= 	$this->db->query($sql);
		$result	=	$res->row_array();
		return $result;
	}
    
    /**
     * 获取所有列表
     */
    public function getLists($offset, $pagesize, $cid = '') {
        $sql = "SELECT l.id, l.cid, c.cname, l.title, l.content, l.author, l.links FROM lists as l left join category as c ON l.cid = c.cid";
        if($cid) {
            $sql .= " WHERE l.cid = '{$cid}'";
        }
        $sql .= " ORDER BY l.datetime DESC limit {$offset},{$pagesize}";
        
        $res    =   $this->db->query($sql);
        return $res->result_array();
    }
    
    /**
     * 统计所有
     */
    public function getAll($cid) {
        $sql = 'SELECT count(id) as count from lists';
        if($cid) {
            $sql .= " WHERE cid='{$cid}'";
        }
        $res = $this->db->query($sql);
        $result = $res->row_array();
        return $result['count'];
    }
    
    /**
     * 添加记录
     */
    public function addList($data) {
        if(empty($data)) {
            return false;
        }
        
        return $this->db->insert('lists',$data);        
    }
}
