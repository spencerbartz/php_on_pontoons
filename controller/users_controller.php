<?php
    include_once "abstract_controller.php";
    
    class UsersController extends AbstractController
    {
        public function __construct()
        {
            $user = NULL;
        }
        
        public function create()
        {
            echo "Create User";
        }
        
        public function index()
        {
            echo "User Index";
        }
        
        public function destroy()
        {
            echo "Destroy User with id: " . $_GET["id"];
        }
        
        public function display()
        {
            echo "Display User with id: " . $_GET["id"];
        }
        
        public function new_user_landing()
        {
            parent::render("../view/users/new_user_view.php");
        }
        
        public static function to_string()
        {
            return "users_controller";
        }
        
        public function update()
        {
            echo "Update User with id: " . $_GET["id"];
        }
    }
    
    UsersController::process_request();
?>