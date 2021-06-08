
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oShop BackOffice</title>

    <!-- Getting bootstrap (and reboot.css) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--
        And getting Font Awesome 4.7 (free)
        To get HTML code icons : https://fontawesome.com/v4.7.0/icons/
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <!-- We can still have our own CSS file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div class="container my-4">
        <p class="display-4">
            Bienvenue dans le backOffice <strong>Dans les shoe</strong>...
        </p>

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <div class="card text-white mb-3">
                    <div class="card-header bg-primary">Connexion</div>
                    <div class="card-body">
                    <form action="" method="POST" class="mt-5">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="veuillez saisir votre email"> 
                        <label for="email">Mot de Passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="veuillez saisir votre mot de passe">
                        <button type="submit" class="btn btn-primary btn-block mt-5">Se connecter</button> 
                    </form>
                    </div>
                </div>
            </div>