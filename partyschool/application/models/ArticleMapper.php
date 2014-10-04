<?php
class Application_Model_ArticleMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Article();
	}
	
	/**
	 * 根据id查找文章
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findArticleById($id=null)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('id =?',$id);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}

	/**
	 * 查找文章列表
	 * @param  array  $where [where限制条件array]
	 * @param  [type] $order [排序]
	 * @param  [type] $limit [篇数限制条件]
	 * @return [type]        [返回文章对象]
	 */
	public function getArticles($where = array(), $order = null, $limit = null)
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