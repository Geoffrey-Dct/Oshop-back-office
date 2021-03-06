<?php

namespace App\Controllers;

class CoreController {
    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewVars Tableau des données à transmettre aux vues
     * @return void
     */
    protected function show(string $viewName, $viewVars = []) {
        // On globalise $router car on ne sait pas faire mieux pour l'instant
        global $router;

        // Comme $viewVars est déclarée comme paramètre de la méthode show()
        // les vues y ont accès
        // ici une valeur dont on a besoin sur TOUTES les vues
        // donc on la définit dans show()
        $viewVars['currentPage'] = $viewName; 

        // définir l'url absolue pour nos assets
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        // définir l'url absolue pour la racine du site
        // /!\ != racine projet, ici on parle du répertoire public/
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];

        // On veut désormais accéder aux données de $viewVars, mais sans accéder au tableau
        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($viewVars);
        // => la variable $currentPage existe désormais, et sa valeur est $viewName
        // => la variable $assetsBaseUri existe désormais, et sa valeur est $_SERVER['BASE_URI'] . '/assets/'
        // => la variable $baseUri existe désormais, et sa valeur est $_SERVER['BASE_URI']
        // => il en va de même pour chaque élément du tableau

        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/layout/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/layout/footer.tpl.php';
    }

    /**
     * Méthode de vérification des droits d'entrée 
     * @param array $rolesRequis
     */
    protected function checkAuthorization($rolesRequis = [])
    {
        global $router;
        // si la personne n'est pas loggué
        if (!isset($_SESSION['userObject']))
        {
            // il est rentré par la fenètre ???
            header('Location: ' . $router->generate('connect'));
            exit();
        }

        // qu'est ce que je doit vérifier ?
        // je doit vérifier si le role de l'utilisateur via $_SESSION
        // correspond aux droitsRequis par le controller, donné en paramètre
        
        // je récupère mon user
        $user = $_SESSION['userObject'];

        $roleUser = $user->getRole();

        foreach ($rolesRequis as $role) {
            if ($roleUser === $role){
                return true;
            }
        }

        // qu'est ce que je fait si l'utilisateur n'a pas les droits ?
        http_response_code(403);
        exit();
    }
}
