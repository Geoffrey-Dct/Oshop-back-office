<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;

class ProductController extends CoreController {
    
    public function products()
    {
        //$productModel=new Product;
        //$products = $productModel->findAll();

        $products = Product::findAll();
        //dd($products);
        $viewVars['products']= $products;
        $this->show('list/products', $viewVars);
    }

    public function productAdd()
    {
        $this->show('add-element/product_add');
    }

    /**
     * Création d'un produit
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
        $newProduct = new Product();
        $newProduct->setName($_POST["name"]);
        $newProduct->setDescription($_POST["description"]);
        $newProduct->setPicture($_POST["picture"]);
        $newProduct->setPrice($_POST["price"]);
        $newProduct->setRate($_POST["rate"]);
        $newProduct->setStatus($_POST["status"]);
        $newProduct->setBrandId($_POST["brand_id"]);
        $newProduct->setCategoryId($_POST["category_id"]);
        $newProduct->setTypeId($_POST["type_id"]);
        $newProduct->insert();
        header('Location:/products');
        // j'ai besoin des infos qui sont dans $_POST
        // j'ai besoin du model pour inserer en base
        // j'insère en base
        // normalement j'affiche quelquechose  ??? lecture CDC
        // CDC dit rediriger vers la liste avec header()

    }
    
}