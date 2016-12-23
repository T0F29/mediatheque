<h1>Inscription</h1>        
<div class="form-container">
    <form method="post" action="index.php?action=ValidationInscription">

        <?php
        if (isset($data['errors'])){
            echo '<div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> '.$data['errors'].'</div>';

        }
        ?>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="login">Nom d'utilisateur:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe:</label>
            <input type="password" class="form-control" id="mdp" name="mdp" required>
        </div>
        <div class="form-group">
            <label for="mdp_confirmation">Confirmez le mot de passe:</label>
            <input type="password" class="form-control" id="mdp_confirmation" name="mdp_confirmation" required>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" name="btn" class="btn">
                <i class="glyphicon glyphicon-log-in"></i> Inscription
            </button>
        </div>
        <br>
        
    </form>
    <p>Déjà inscrit? <a href="index.php?action=Enregistrement">Connectez-vous</a></p>
</div>
