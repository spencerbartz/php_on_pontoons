<?php
  include_once "abstract_controller.php";

  class UsersController extends AbstractController {

    public function __construct() {
      $user = NULL;
    }

    public function create() {
      $user = new User();
    }

    public function index() {
      parent::render("app/view/user_index_view.php");
    }

    public function destroy() {
      echo "<h1>KABOOM!</h1>";
    }

    public function display() {
      parent::render("app/view/user_index_view.php");
    }

    public function new_user_landing() {
      parent::render("app/view/users/new_user_landing_view.php");
    }

    public static function to_string() {
      return "users_controller";
    }

    public function update() {
      echo "Update User with id: " . $_GET["id"];
    }

    public function read() {
      parent::render("app/view/user_index_view.php");
    }
  }

  UsersController::process_request();
?>