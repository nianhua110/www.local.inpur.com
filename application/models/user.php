<?php
class User extends CI_Model {
	public function __construct() {
		parent::__construct();		
	}	
	
	//获取所有用户
	public function getAllUser() {
		$sql = "SELECT id,username,created FROM user";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
	//添加新用户
	public function addUser($username, $password) {
		$data	=	array('username'=>$username,'password'=>$password,'created'=>time());
		return $this->db->insert('user',$data);
	}
	
	//删除用户
	public function delUser($id) {
		$data	=	array('id'=>$id);
		return $this->db->delete('user',$data);
	}
	
	//检查用户名
	public function checkUsername($username) {
		$sql = "SELECT id FROM user WHERE username = '{$username}'";
		$res = $this->db->query($sql);
		return $res->num_rows();
	}
	
	//登录验证
	public function ckeckLogin($username, $password) {
		$sql = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
		$res = $this->db->query($sql);
		return $res->num_rows();
	}
    
    //更新用户
    public function updateUser($uid, $password) {
        $data = array('password'=>$password);
        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }
}