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
?>