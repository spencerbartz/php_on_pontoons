<?php
  include_once "abstract_controller.php";

  class UsersController extends AbstractController {

    public function __construct() {
      $user = NULL;
    }

    public function create() {
      echo "Create User";
    }

    public function index() {
      echo "User Index";
    }

    public function destroy() {
    }

    public function display() {
      parent::render("view/user_display_view.php");
      // echo "Display User with id: " . $_GET["id"];
    }

    public function new_user_landing() {
      parent::render("../view/users/new_user_view.php");
    }

    public static function to_string() {
      return "users_controller";
    }

    public function update() {
      echo "Update User with id: " . $_GET["id"];
    }

    public static function process_request() {
			parent::process_request();
		}
  }

  UsersController::process_request();
?>