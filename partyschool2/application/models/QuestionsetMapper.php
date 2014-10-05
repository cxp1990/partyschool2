<?php
class Application_Model_QuestionsetMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Questionset();
	}
	/**
	 * 查找所有抽取到的题目
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function findAllQuestionset($order)
	{
		$ab = $this->db->getAdapter();
		// $where = $ab->quoteInto('type =?',$type);
		$where = null;
		$res = $this->db->fetchAll($where,$order)->toArray();

		return $res;
	}
	/**
	 * 根据id查找抽取到的题目
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findQuestionsetById($qeid=null)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('qeid =?',$qeid);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}
	/**
	 * 查找题目，每页8个题目
	 * @param  array  $where [description]
	 * @param  [type] $order [description]
	 * @param  [type] $limit [description]
	 * @return [type]        [description]
	 */
	public function findQuestionFenYe($where=array(),$order = null,$limit = null)
	{
		$select = $this->db->select();
		if (count($where) > 0) {
			foreach ($where as $key => $value) {
				$select->where($key.'=?',$value);
			}
		}

		if ($order) {
			$select->order($order);
		}

		if ($limit) {
			$select->limit($limit);
		}

		$arr = $this->db->fetchAll($select);

		if ($arr->count() > 0) {
			return $arr;
		}else{
			return null;
		}
	}
}