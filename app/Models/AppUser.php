<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class AppUser extends CoreModel
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $status;


    public static function find()
    {

    }

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `app_user`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\AppUser');
        
        return $results;
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `app_user` WHERE `email` = :email";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

        
        $requete = $pdoStatement->execute(); 

        if($requete===true){
            $result = $pdoStatement->fetchObject('App\Models\AppUser');
            return $result;
        }
        


        return false;

    }

    public static function findByPassword($password)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `app_user` WHERE `password` = :password";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':password', $password, PDO::PARAM_STR);

        
        $requeteOk = $pdoStatement->execute();
        //dd($requeteOk);
        
        if($requeteOk==true){
            $result = $pdoStatement->fetchObject('App\Models\AppUser');
            return $result;
        }
        


        return false;

    }
    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}