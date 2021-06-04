<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends CoreController
{
    public function categories()
    {
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
        $newCategorie = new Category();
        $newCategorie->setName($_POST["name"]);
        $newCategorie->setSubtitle($_POST["subtitle"]);
        $newCategorie->setPicture($_POST["picture"]);
        $newCategorie->insert();
        header('Location:/categories');
        // j'ai besoin des infos qui sont dans $_POST
        // j'ai besoin du model pour inserer en base
        // j'insère en base
        // normalement j'affiche quelquechose  ??? lecture CDC
        // CDC dit rediriger vers la liste avec header()

    }
    
}