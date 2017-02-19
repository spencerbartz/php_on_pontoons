<?php
	include_once "abstract_controller.php";

	class HomeController extends AbstractController {
		public function index() {
			print("IN INDEX<br/>");
			parent::render("view/home_view.php");
		}

		public static function to_string() {
			return "I'm the HomeController";
		}

		public static function process_request() {
			print("IN PROCESS REQUEST<br/>");
			parent::process_request();
		}
	}

	HomeController::process_request();
?>