<div class="container my-4">
        <a href="<?=$router->generate('users')?>" class="btn btn-success float-right">Retour</a>
        <h2>Ajouter un utilisateur</h2>
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="role">rôle</label>
                <select  name="role" class="form-control" id="role">
                <option value="">selectionner un rôle</option>
                <option value="catalog-manager">Catalog manager</option>
                <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status">
                <option value="">selectionner un status</option>
                <option value="1">actif</option>
                <option value="2">désactivé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
        </form>
    </div>