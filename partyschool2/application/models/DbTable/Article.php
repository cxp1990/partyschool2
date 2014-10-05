<?php
class Application_Model_DbTable_Article extends Zend_Db_Table_Abstract
{
	protected $_name = 'article';
	/**
	 * 获取限制性特殊文章列表
	 * @param  array  $where [description]
	 * @return [type]        [description]
	 */
	// public function getArticle($where = array())
	// {
	// 	$select = $this->select();
	// 	if(count($where) > 0){
	// 		foreach ($where as $key=>$value) {
	// 			$select->where($key. ' = ?',$value);
	// 		}
	// 	}

	// 	$row  = $this->fetchRow($select);
	// 	if($row){
	// 		return $row;
	// 	}else{
	// 		return null;
	// 	}
	// }
	/**
	 * 获取页面列表
	 * @param  array  $where 定义where限制
	 * @param  [type] $order 定义列表排序规则
	 * @param  [type] $limit 定义获取数据条数
	 * @return [type]        [description]
	 */
	// public function getArticles($where = array(),
	//                             $order = null,
	//                             $limit = null){
	// 	$select = $this->select();
	// 	if(count($where) > 0 ){
	// 		foreach ($where as $key => $value) {
	// 			$select->where($key.' = ?', $value);
	// 		}
	// 	}
	// 	if ($order) {
	// 		$select->order($order);
	// 	}
	// 	if ($limit) {
	// 		$select->limit($limit);
	// 	}
	// 	$result = $this->fetchAll($select)->toArray();
	// 	 return $result;

		// if ($result->count() > 0) {
		// 	return $result;
		// }else{
		// 	return null;
		// }
	// }

}