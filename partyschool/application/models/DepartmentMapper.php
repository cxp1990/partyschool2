<?php
class Application_Model_DepartmentMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Department();
	}
	/**
	 * 根据学院ID查找相关信息
	 * @param  [type] $depid [description]
	 * @return [type]        [description]
	 */
	public function findDept($depid)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('depid = ?', $depid);
	    $arr = $this->db->fetchAll($where)->toArray();
	    // if(count(arr) > 0){
	    // 	return $arr;
	    // }else{
	    // 	return null;
	    // }
	    return $arr;

	}
	/**
	 * 查找所有学院信息
	 * @return [type] [description]
	 */
	public function findAllDept()
	{
		$arr = $this->db->fetchAll()->toArray();
		if(count(arr) > 0){
	    	return $arr;
	    }else{
	    	return null;
	    }	
		
	}
}