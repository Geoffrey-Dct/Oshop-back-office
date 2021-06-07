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

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $brand_id = filter_input(INPUT_POST, 'brand_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        
        $newProduct = new Product();
        $newProduct->setName($name);
        $newProduct->setDescription($description);
        $newProduct->setPicture($picture);
        $newProduct->setPrice($price);
        $newProduct->setRate($rate);
        $newProduct->setStatus($status );
        $newProduct->setBrandId( $brand_id);
        $newProduct->setCategoryId($category_id);
        $newProduct->setTypeId($type_id );
        $newProduct->insert();

        header('Location:'.$_SERVER['BASE_URI'].'/products');
        // j'ai besoin des infos qui sont dans $_POST
        // j'ai besoin du model pour inserer en base
        // j'insère en base
        // normalement j'affiche quelquechose  ??? lecture CDC
        // CDC dit rediriger vers la liste avec header()

    }

    public function update($param)
    {
        $productId = $param;

        $product = Product::find($productId);
        $viewVars['product']=$product;
        $this->show('update/product_update',$viewVars);
    }
    
}