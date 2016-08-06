<?php
	include_once "abstract_controller.php";
	
    class HomeController extends AbstractController
    {
		public function index()
		{
			parent::render("view/home_view.php");
		}
	}
	
	HomeController::process_request();
?>