<?php

require_once 'config.php';


function xiu_get_current_user () {

	// if(isset($GLOBALS['current_user'])) {
	// 	return $GLOBALS['current_user'];
	// }

	//判断用户的登陆信息是否在session 当中记录过 没有就跳转登录页面
	session_start();

	if(empty($_SESSION['current_logged_in_user_id']) || !is_numeric($_SESSION['current_logged_in_user_id'])) {

		header('Location: /admin/login.php');
		exit;
	}

}