<?php
class AdminController extends Zend_Controller_Action
{
	 public function init()
	 {

	 }
	 /**
	  * 党校总结控制
	  * @return [type] [description]
	  */
	 public function dxzjAction()
	 {

	 }
	 /**
	  * 修改密码控制
	  * @return [type] [description]
	  */
	 public function percenterAction()
	 {

	 }
	 /**
	  * 超级管理员“基本设置”控制
	  * @return [type] [description]
	  */
	 public function basesetAction()
	 {

	 }
	 /**
	  * 超级管理员“学员信息”控制
	  * @return [type] [description]
	  */
	 public function xyinfoAction()
	 {

	 }
	 /**
	  * 超级管理员“题目设置”控制
	  * @return [type] [description]
	  */
	 public function questionsetAction()
	 {
	 	        // action body
        //创建一个表模型

        // $questionsetMapper = new Application_Model_QuestionsetMapper();
        // $order = "";
        // $arrList = $questionsetMapper->findAllQuestionset($order);
        // $this->view->arrList = $arrList;

        $questionsetMapper = new Application_Model_QuestionsetMapper();
        $where = array();
        $order = null;
        $limit = 3;
        $arrList = $questionsetMapper->findQuestionFenYe($where,$order,$limit);
        $this->view->arrList = $arrList;

	 }
	 /**
	  * 超级管理员 “修改题库”控制
	  * @return [type] [description]
	  */
	 public function queupdateAction()
	 {
	 	$queupdateMapper = new Application_Model_QueupdateMapper();
        $order = "";
        $arrList = $queupdateMapper->findAllQueupdate($order);
        $this->view->arrList = $arrList;

	 }


	 	/**
	* 删除题目
	*/
	public function deletequestionAction()
	{
		$qeid=$this->getRequest()->getParam('qeid');
		
		$QueupdateMapper = new Application_Model_QueupdateMapper();
		$info = $QueupdateMapper->deleteQuestion($qeid);
		$this->view->info = $info;
/*		$string = "<meta http-equiv='content-type' content='text/html; charset=UTF-8'><script language=\"JavaScript\">alert(\"".$info."\");</script>";
				echo $string;*/

		$this->_redirect("/admin/queupdate");//admin?info=$info

	}

	public function xxAction()
	{


		$qetitle = $_POST['timu'];
		$ansA = $_POST['ansA'];
		$ansB = $_POST['ansB'];
		$ansC = $_POST['ansC'];
		$ansD = $_POST['ansD'];
		$ansY = $_POST['rightAns'];

		$queupdateMapper = new Application_Model_QueupdateMapper();
		$result = $queupdateMapper->addQuestion($qetitle,$ansA,$ansB,$ansC,$ansD,$ansY);


		echo $result;
		exit();

		//return $backStr;

		//$this->view->result = $result;

	}





	 /**
	  * 超级管理员 “学习资讯”控制
	  * @return [type] [description]
	  */
	 public function learninfoAction()
	 {

	 }

	 public function addzxAction()
	 {

	 }


}