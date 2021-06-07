<div class="container my-4">
        <a href="<?=$router->generate('products')?>" class="btn btn-success float-right">Retour</a>
        <h2>Mettre à jour un produit</h2>
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" value="<?=$product->getName()?>" name="name" class="form-control" id="name" placeholder="Nom du produit">
            </div>
            <div class="form-group">
                <label for="subtitle">Description</label>
                <input type="text" value="<?=$product->getDescription()?>" name="description" class="form-control" id="subtitle" placeholder="Description du produit">
            </div>
            <div class="form-group">
                <label for="picture">Image</label>
                <input type="text" value="<?=$product->getPicture()?>" name="picture" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" value="<?=$product->getPrice()?>" name="price" class="form-control" id="price" placeholder="Le prix du produit">
            </div>
            <div class="form-group">
                <label for="rate">Note</label>
                <input type="number" value="<?=$product->getRate()?>" name="rate" class="form-control" id="rate" placeholder="chiffre de 0 à 5">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="number" value="<?=$product->getStatus()?>" name="status" class="form-control" id="status" placeholder="1 = disponible, 2 = non disponible ">
            </div>
            <div class="form-group">
                <label for="brand_id">Id de la Marque</label>
                <input type="number" value="<?=$product->getBrandId()?>"  name="brand_id" class="form-control" id="brand_id" placeholder="Ex: 1">
            </div>
            <div class="form-group">
                <label for="category_id">Id de la catégorie</label>
                <input type="number" value="<?=$product->getCategoryId()?>" value="0" name="category_id" class="form-control" id="category_id" placeholder="Ex:1 (facultatif) ">
            </div>
            <div class="form-group">
                <label for="type_id">Id du type</label>
                <input type="number" value="<?=$product->getTypeId()?>"  name="type_id" class="form-control" id="type_id" placeholder="Ex : 1">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
        </form>
    </div>
