<?php

namespace application\controller;

use \application\service\Service;
use \application\service\FrontController;
use \application\model\UserModel;

/**
 * /?path=auth/{action}
 */
class AuthController extends FrontController {

	public function action_login() {
		$userModel = new UserModel();
		$user = $userModel->getUser();

		if ($user == false){
			$this->view->render("auth/login", [
			"title"	=> "Please, Log in"
			]);
		} else {
			$this->action_profile();
		}
	}

	public function action_logout() {
		
	}	

	public function action_profile() {
		$userModel = new UserModel();
		$user = $userModel->getUser();
		if (!$user == false){
			$this->view->render("auth/profile", [
				"name" => $user
			]);
		} else {
			if(null != $this->request->get("name")){
				$user = $this->request->get("name");
				$userModel->setUser($user);
				$this->view->render("auth/profile", [
					"name" => $user
				]);
			} 
		}
	}
}