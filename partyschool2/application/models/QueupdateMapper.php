<?php
class Application_Model_QueupdateMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Queupdate();
	}
	/**
	 * 查找所有题目
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function findAllQueupdate($order)
	{
		$ab = $this->db->getAdapter();
		// $where = $ab->quoteInto('type =?',$type);
		$where = null;
		$res = $this->db->fetchAll($where,$order)->toArray();

		return $res;
	}
	/**
	 * 根据id查找题目
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findQueupdateById($qeid=null)
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

/*	public function delQuestionById($qeid=null)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('qeid =?',$qeid);
		$res = $this->db->delete($where);
		if ($res>0) {
			return true;
		}else{
			return false;
		}
	}*/

	
/**
		* 删除题目
		*/
		public function deleteQuestion($qeid)
		{
			if (!is_array($qeid))
				$qeid=array($qeid);

			$ab=$this->db->getAdapter();

			foreach ($qeid as $qeid) {
				$where=$ab->quoteInto('qeid=?',$qeid);
				$arr=$this->db->fetchAll($where)->toArray();


				//进行问题的删除
				$del=$this->db->delete($where);
				if ($del!='') {
					$info="题目已成功删除！";
				}  else {
					$info="删除题目失败，请重新删除！";
				}
			}
			
			return $info;
		}

/*		public function addQuestion($quesData = array())
		{
			$row = $this->db->createRow();
			if (count($quesData) > 0) {
				foreach ($quesData as $key => $value) {
					$row->$key = $value;
				}
				$row->save();
				return '该问题添加成功';
			}else{
				return null;
			}
		}
*/

/**
		* 添加题目
		*/
		public function addQuestion($qetitle,$ansA,$ansB,$ansC,$ansD,$ansY)
		{

			$arr = array(
						 'qetitle'=>$qetitle,
						 //'ansA'=>md5($Password),
						 'ansA'	=>$ansA,
						 'ansB'=>$ansB,
						 'ansC'	=>$ansC,
						 'ansD'=>$ansD,
						 'ansY'=>$ansY

						);
			$ab=$this->db->getAdapter();
			$res = $this->db->insert($arr,true);
			
			return $res;
		}


}

