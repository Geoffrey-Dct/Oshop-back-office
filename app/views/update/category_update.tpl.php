<div class="container my-4">
        <a href="<?=$router->generate('categories')?>" class="btn btn-success float-right">Retour</a>
        <h2>Mettre à jour une catégorie</h2>
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" value="<?=$category->getName()?>" name="name" class="form-control" id="name" placeholder="Nom de la catégorie">
            </div>
            <div class="form-group">
                <label for="subtitle">Sous-titre</label>
                <input type="text" value="<?=$category->getSubtitle()?>" name="subtitle" class="form-control" id="subtitle" placeholder="Sous-titre" aria-describedby="subtitleHelpBlock">
                <small id="subtitleHelpBlock" class="form-text text-muted">
                    Sera affiché sur la page d'accueil comme bouton devant l'image
                </small>
            </div>
            <div class="form-group">
                <label for="picture">Image</label>
                <input type="text" value="<?=$category->getPicture()?>" name="picture" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="form-group">
                <label for="home_order">home_order</label>
                <input type="number" value="<?=$category->getHomeOrder()?>" name="home_order" class="form-control" id="home_order" placeholder="de 1 à 5" >
                
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
        </form>
    </div>
