<?php
namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    
    public function connect()
    {
        require_once __DIR__.'/../views/main/connect.tpl.php';
        require_once __DIR__.'/../views/layout/footer.tpl.php';
    }

    public function connecting()
    {
        global $router;
        //dd($_POST);
        $email = filter_input(INPUT_POST,'email');
       
        $password = filter_input(INPUT_POST,'password');

        $user = AppUser::findByEmail($email);
        //dd($user);
        if ($user === false){
            echo "l'email est incorrect";
            exit();
        }
        if($password === $user->getPassword()){
            
            $_SESSION['userObject'] = $user;
            
            header('location:'.$router->generate('main-home'));
            
        }
        else{
            echo "le mot de passe est incorrect";
        }




    }
    public function logout()
    {
        // on récupère le router
        global $router;

        // Dans notre application, déconnecter l'utilisateur veut dire supprimer ses données en session
        // Pour supprimer des données (une variable ou la clé d'un array) en PHP, on utilise unset()
        unset($_SESSION['userObject']);

        // une fois déconnecté, on redirige l'utilisateur vers la page de connexion
        // on utilise le routeur pour générer le chemin vers la page de connexion
        $homepageUrl = $router->generate('connect');
        // un petit coup de header() pour demander au navigateur de faire la redirection
        header('Location: ' . $homepageUrl);
    }

    public function users()
    {
        $rolesRequis[]='admin';
        $this->checkAuthorization($rolesRequis);
        $users=AppUser::findAll();
        $viewVars['users'] = $users;
        $this->show('list/users', $viewVars);
    }
}   
