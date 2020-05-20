<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2020 AD
 * Time: 10:17 PM
 */
class User extends Db_object
{
    protected static $db_table = "user"; // put"" at the user = "user" then you have to adjust all
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


     //function instantie
       public static function instantie($result)
       {
           $the_object = new self();
           $the_object->id = $result['id'];
           $the_object->username = $result['username'];
           $the_object->password = $result['password'];
           $the_object->first_name = $result['first_name'];
           $the_object->last_name = $result['last_name'];
           return $the_object;
       }

       // for not to write above again. we shall use the instantie method
       public static function instantie($result){
           $the_object = new self();
           foreach ($result as $the_attribute => $value){
               if($the_object->has_the_attribute($the_attribute)){
                   $the_object->$the_attribute =$value;
               }
           }
           return $the_object;
       }


       private function has_the_attribute($the_attribute){
           $object_properties = get_object_vars($this);
           return array_key_exists($the_attribute, $object_properties);
       }





       // this make to not double global$database writing
       public static function find_this_query($sql)
       {
           global $database;
           $result = $database->query($sql);
           // extra for array and have to adjust function that concerned
           $the_object_array = array();
           while ($row = mysqli_fetch_array($result)) {
               $the_object_array[] = self::instantie($row);
           }
           return $the_object_array;

           //  return $result;
       }

            public static function find_all()  public static function find_all_users()// has adjust


            public static function find_by_id($id)//public static function find_user_by_id($user_id)
           {
               $result = self::find_this_query("SELECT * from " . self::$db_table . " WHERE id=$id LIMIT 1"); //id=$user_id

               /*
               //   $user_found = mysqli_fetch_array($result);

               // adjust for using array
               if (!empty($result)) {
                   return array_shift($result);
               } else {
                   return false;
               }

               //  return $user_found; //*

           //the code here is the short version of adjust for array above
           return !empty($result) ? array_shift($result) : false;


    // for verify user
    public static function verify_user($user, $pass)
    {
        global $database;
        $username = $database->escape_string($user);
        $password = $database->escape_string($pass);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    /*
      public static function find_all_users(){
          global $database;
          $result = $database->query("select * from user");
          return $result;
      }
      public static function find_user_by_id($user_id){
          global $database;
          $result = $database->query("SELECT * from user WHERE id=$user_id");
          $user_found = mysqli_fetch_array($result);
          return $user_found;
      }


    // try to create find user by username but doesn't work- why?
    public static function find_user_by_username($username)
    {
        $result = self::find_this_query("SELECT * from user WHERE username=$username");
        return !empty($result) ? array_shift($result) : false;
    }
    */

        public function create()
        {
            global $database;
            $properties = $this->clean_properties();//$this->properties();
    
            // after we put the code - protected static $db_table = "user" above syntax sql "user" to " . self::$db_table ."
            // adjust this code after write properties var // $sql = "INSERT INTO " . self::$db_table . " (username, password, first_name, last_name)";
            $sql = "INSERT INTO " . self::$db_table . " (" . implode(",", array_keys($properties)) . ")";
            // $sql .= " VALUES ('";
            $sql .= " VALUES ('" . implode(",", array_values($properties)) . "')";
    
            /*
            $sql .= $database->escape_string($this->username) . "', '";
            $sql .= $database->escape_string($this->password) . "', '";
            $sql .= $database->escape_string($this->first_name) . "', '";
            $sql .= $database->escape_string($this->last_name) . "') ";
            */
        if ($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

        $database->query($sql);
    }

    public function update()
    {
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach ($properties as $key => $value) {
            $properties_assoc[] = "{key}='{value}'";
        }

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode(",", $properties_assoc);
        $sql .= "WHERE id = " . $database->escape_string($this->id);
        /* adjust for $properties_assoc
        $sql .= "username= '" . $database->escape_string($this->username) . "', ";
        $sql .= "password= '" . $database->escape_string($this->password) . "', ";
        $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
        $sql .= "WHERE id = " . $database->escape_string($this->id);*/

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete_id()
    {
        global $database;

        $sql = "DELETE FROM " . self::$db_table; // adjust user to cade after "
        $sql .= "WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }

    // try delete by username but code doesn't work
    public function delete_username()
    {
        global $database;

        $sql = "DELETE FROM user ";
        $sql .= "WHERE username= " . $database->escape_string($this->username);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function properties()
    { //the properties in the class will able to read.
        // return get_object_vars($this);
        $properties = array();
        foreach (self::$db_table_fields as $db_fields) {
            if (property_exists($this, $db_fields)) {
                $properties[$db_fields] = $this->$db_fields;
            }
        }
        return $properties;
    }

    protected function clean_properties()
    {
        global $database;
        $clean_properties = array();
        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }
    
        public function save(){
            return isset($this->id) ? $this->update() : $this->create();
        }


    // cut the code in the file class Db_object.php

}