<?php

namespace application\model;

use \application\service\Service;
use \application\model\BaseModel;

class UserModel extends BaseModel {

	public function setUser($user) {
		if (!isset($_SESSION["session_start"])){
			session_start();
			$_SESSION["session_start"] = true;
		};
		$_SESSION["user"] = $user;
	}	

	public function deleteUser(){
		unset($_SESSION["user"]);
	}

	public function getUser(){
		if (isset($_SESSION["user"])){
			return $_SESSION["user"];
		} else {
			return false;
		}
	}
}