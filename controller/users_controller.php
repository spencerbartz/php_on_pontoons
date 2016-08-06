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
            $user = new UserModel("billy bob");
            $user.save();
        }
        
        public function index()
        {
            echo "Hiya Buddy";
        }
        
        public function destroy()
        {
            
        }
        
        public function new_user_landing()
        {
            parent::render("../view/users/new_user_view.php");
        }
        
        public static function to_string()
        {
            return "users_controller";
        }
    }
    
    UsersController::process_request();
?>