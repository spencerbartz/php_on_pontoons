<?php
    include_once "abstract_model.php";
    
    class UserModel extends AbstractModel
    {
        public function __construct($name)
        {
            parent::__construct($date_created);
            $this->fields["name"] = array($first_name, "VARCHAR(255)");
            parent::construct_if_not_exists();
        }
        
         //TODO Move thie ORM grunt work up into Abstract model
        public static function find($id)
        {
            $row = parent::find($id, UserModel::get_table_name());
            $um = new UserModel($row["name"]);
            $um->id = $row["id"];
            return $um;
        }

        public static function first()
        {
            $row =  parent::first(UserModel::get_table_name());
            $um = new UserModel($row["name"]);
            $um->id = $row["id"];
            return $um;
        }
        
        public static function last()
        {
            $row =  parent::last(UserModel::get_table_name());
            $um = new UserModel($row["name"]);
            $um->id = $row["id"];
            return $um;
        }
    }
    
   //Test
    function  user_model_test($delete)
    {
        $user = new UserModel("Test User");
        $user->save();
        $user->print_fields();
    
        
        //if($delete)
          //  $user->delete();
    
        $um = UserModel::find(UserModel::first()->id);
        $um->print_fields();

        $um = UserModel::find(UserModel::last()->id);
        $um->print_fields();
        
        UserModel::find(999);
    }
        
    if(isset($argv[1]))
    {
        $delete = isset($argv[2]) ? FALSE : TRUE;
        user_model_test($delete);
    }
?>