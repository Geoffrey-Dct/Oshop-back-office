<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends CoreController
{
    public function categories()
    {
        $rolesRequis[] = 'catalog-manager';
        $rolesRequis[] = 'admin';
        // pas besoin de tester le retour de la fonction
        // car elle vire les gens si c'est pas bon.
        $this->checkAuthorization($rolesRequis);
        $categoryModel = new Category;
        $categories = $categoryModel->findAll();
        //dd($categories);
        $viewVars['categories'] = $categories;
        $this->show('list/categories', $viewVars);
    }

    public function categoryAdd()
    {
        
        $this->show('add-element/category_add');
    }

    /**
     * Création d'une catégories
     * Récupère les infos venant de $_POST
     * 
     * @return void
     */
    public function create()
    {
        // je réflechit
        // de quoi j'ai besoin ??
        //TODO dd($_POST);
        //dd($_POST);
        $name = filter_input(INPUT_POST, 'name');
        $subtitle = filter_input(INPUT_POST, 'subtitle');
        $picture = filter_input(INPUT_POST, 'picture');


        $newCategorie = new Category();
        $newCategorie->setName($name);
        $newCategorie->setSubtitle($subtitle);
        $newCategorie->setPicture($picture);
        $newCategorie->insert();
        header('Location:'.$_SERVER['BASE_URI'].'/categories');
        // j'ai besoin des infos qui sont dans $_POST
        // j'ai besoin du model pour inserer en base
        // j'insère en base
        // normalement j'affiche quelquechose  ??? lecture CDC
        // CDC dit rediriger vers la liste avec header()

    }

    public function categoryUpdate($param)
    {
        
        $categoryId = $param;
        //dd($categoryId);
        $category= Category::find($categoryId);
        
        $viewVars['category']= $category;
        $this->show('update/category_update', $viewVars);
    }
    
    public function update($param)
    {
        $categoryId=$param;
        
        //dd($categoryId);

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $homeOrder = filter_input(INPUT_POST, 'home_order', FILTER_VALIDATE_INT);

        $newCategorie = new Category();
        $newCategorie->setName($name);
        $newCategorie->setSubtitle($subtitle);
        $newCategorie->setPicture($picture);
        $newCategorie->setHomeOrder($homeOrder);
        $newCategorie->update($categoryId);
        
        header('Location:/categories');
    }
}