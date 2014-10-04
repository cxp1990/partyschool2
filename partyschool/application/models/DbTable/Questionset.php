<?php
//这里必须继承Zend_Db_Table，否则就不是表模型
class  Application_Model_DbTable_Questionset extends Zend_Db_Table_Abstract{
	//默认主键为id  可以不写
    protected   $_primary='qeid';
	protected  $_name='question';

}