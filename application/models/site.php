<?php
class Site extends CI_Model {
	public function __construct() {
		parent::__construct();		
	}
	
	public function getValue() {
		$sql = "SELECT `key`,`value` FROM site";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
	public function updateValue($arr) {
		if(!is_array($arr) || empty($arr)) {
			return false;
		}
		
		foreach($arr as $key=>$value) {
		    if($value == '' || empty($value)) {
		        continue;
		    }
			$value = base64_encode($value);
			$sql = "INSERT INTO site (`key`, `value`) VALUES ('$key','$value') ON DUPLICATE KEY UPDATE value='$value'";
			$this->db->query($sql);
		}
		
		return true;
	}
}