<h1>Connexion</h1>        
<div class="form-container">
    <form method="post" action="index.php?action=ValidationEnregistrement">

        <?php
        if (isset($data['errors'])){
            echo '<div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> '.$data['errors'].'</div>';

        }
        ?>
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Login" required />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
        </div>

        <br>
        <div class="form-group">
            <button type="submit" name="btn" class="btn">
                <i class="glyphicon glyphicon-log-in"></i> Connexion
            </button>
        </div>
        <br>
        
    </form>
    <p>Pas encore de compte? <a href="index.php?action=Inscription">Inscription</a></p>
</div>
