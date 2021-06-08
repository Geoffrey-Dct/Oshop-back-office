<?php
namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    public function showConnect($viewName)
    {
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/layout/footer.tpl.php';
    }

    public function connect()
    {
       $this->showConnect('main/connect');
    }

    public function connecting()
    {
        //dd($_POST);
        $email = filter_input(INPUT_POST,'email');
       
        $password = filter_input(INPUT_POST,'password');

        $user = AppUser::findByEmail($email);
        //dd($user);
        if ($user === false){
            echo "l'email est incorrect";
            die();
        }
        if($password === $user->getPassword()){
            echo "ok !!!";
        }
        else{
            echo "le mot de passe est incorrect";
        }




    }
}   
