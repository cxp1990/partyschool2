<?php
class Application_Model_UserMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_User();
	}

	/**
	 * 检测用户是否存在
	 * @param  [type] $username [description]
	 * @param  [type] $pw       [description]
	 * @return [type]           [description]
	 */
	public function checkUser($username,$pw)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('username = ?',$username)
				 .$ab->quoteInto('AND pw = ?',$pw);
		$arr = $this->db->fetchAll($where)->toArray();
		// if(count($arr) > 0){
		// 	return $arr;
		// }else{
		// 	return null;
		// }	
		return $arr;
	}
	/**
	 * 查找所有用户信息
	 * @return [type] [description]
	 */
	public function findAllUser()
	{
		$arr = $this->db->fetchAll()->toArray();
		if(count($arr) > 0){
			return $arr;
		}else{
			return null;
		}
	}
	/**
	 * 查找指定用户信息
	 * @param  [type] $userid [description]
	 * @return [type]         [description]
	 */
	public function findUserByID($userid)
	{
		$ab = $this->db->getAdapter();
		$where=$ab->quoteInto('userid = ?',$userid);
		$arr = $this->db->fetchAll($where)->toArray();
		if(count($arr) > 0){
			return $arr;	
		}else{
			return null;
		}
		
	}
	/**
	 * 按用户名查找用户信息
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function findUserByName($username)
	{
		$ab = $this->db->getAdapter();
		$where=$ab->quoteInto('username = ?',$username);
		$arr = $this->db->fetchAll($where)->toArray();
		if(count($arr) > 0){
			return $arr;	
		}else{
			return null;
		}
	}
	/**
	 * 将新用户信息插入数据库
	 * @param [type] $username [description]
	 * @param [type] $realname [description]
	 * @param [type] $pw       [description]
	 * @param [type] $depid    [description]
	 */
	public function addUser($username,$realname,$pw,$depid)
	{
		$arr = array('username' => $username,
		 			 'realname' => $realname,
		 			 'pw' => $pw,
		 			 'depid' => $depid);
		$res = $this->db->insert($arr);
		return $res;
	}
	/**
	 * 修改用户信息
	 * @param  [type] $userid   [description]
	 * @param  [type] $username [description]
	 * @param  [type] $realname [description]
	 * @param  [type] $depid    [description]
	 * @return [type]           [description]
	 */
	public function editUser($userid,$username,$realname,$depid)
	{
		$arr = array('username' => $username,
		             'realname' => $realname,
		             'depid' => $depid);
		$ab=$this->db->getAdapter();
		$where=$ab->quoteInto('userid=?',$userid);
		$res=$this->db->update($set=$arr,$where);

		return $res;
	}
	/**
	 * 修改用户密码
	 * @param  [type] $userid [description]
	 * @param  [type] $pw     [description]
	 * @return [type]         [description]
	 */
	public function modifyUserPwd($userid,$pw)
	{
		// $arr = array('Password'=>md5($Password),);
		$arr = array('pw' => $pw, );
		$ab=$this->db->getAdapter();
		$where=$ab->quoteInto('userid=?',$userid);
		$res=$this->db->update($set=$arr,$where);

		return $res;
	}

	
}