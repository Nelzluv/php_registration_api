<?php

class User{
    private $db;

    public function __construct (){
        $this->db = new Database;
    }

    public function register($data){
        //Insert Query
        $this->db->query("INSERT INTO user (firstname, lastname, username, email, password)
        VALUES (:firstname,:lastname, :username, :email, :password)");
        
			$this->db->bind(':firstname', $data->firstname);
			$this->db->bind(':lastname', $data->lastname);
			$this->db->bind(':username', $data->username);
			$this->db->bind(':email', $data->email);
            $this->db->bind(':password', $data->password);
            
        //execute
        if($row = $this->db->execute()){
            return $row;
        }
        else{
            return false;
        }
    }

    //function to handle login
    public function login($data) {
        $row = $this->db->query("SELECT * from user where username = :username");

        //bind parameters
        $this->db->bind(':username', $data->username);

        if($row = $this->db->single()) {
            if(password_verify($row->password, $data->password)){
                print_r($row);
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // updating user data
    public function update($id,$data){
        //Insert Query
        $this->db->query("UPDATE user
                SET
                firstname = :firstname,
                lastname = :lastname,
                username = :username,
                email = :email,
                password = :password
                WHERE id = :id");
        
		    $this->db->bind(':firstname', $data->firstname);
			$this->db->bind(':lastname', $data->lastname);
			$this->db->bind(':username', $data->username);
			$this->db->bind(':email', $data->email);
            $this->db->bind(':password', $data->password);
            $this->db->bind(':id', $id);
            
        //execute
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    //Delete user from database
    public function delete($id) {
        $this->db->query('DELETE FROM user WHERE id = :id');
        $this->db->bind(':id', $id);
            
        //execute
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}