<?php

class User extends Db_object
{
    protected static $db_table = "user";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $type;
    public $size;
    public $upload_directory = 'img'. DS .'users';
    public $image_placeholder = 'https://avatars.dicebear.com/v2/male/:seed.svg';
    public $tmp_path;
   

    // for verify user
    public static function verify_user($user, $pass)
    {
        global $database; // from the class database
        $username = $database->escape_string($user);
        $password = $database->escape_string($pass);

        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = static::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    
    // write self
    public static function find_by_user($username)
    {
        $result = static::find_this_query("SELECT * from " . static::$db_table . " WHERE username LIKE '$username'");
        return !empty($result) ? array_shift($result) : false;
    }


    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory. DS . $this->user_image;
    }

    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "No file uploaded!";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }


    public function save_user_and_image()
    {
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

        if($this->id){
            move_uploaded_file($this->tmp_path, $target_path);
            $this->update();
            unset($this->tmp_path);
            return true;
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "File not available";
                return false;
            }
            if(file_exists($target_path)){
                $this->errors[] = "file {$this->user_image} exists";
                return false;
            }
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if ($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[] = "this folder has no write rights";
                return false;
            }
        }
    }
}

?>