<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Médiathèque</title>      
        <link rel="stylesheet" href="assets/css/app.css">
    </head>
    <body>
    <header>
        <div id="bandeau">
            <div id="logo">
                <img src="assets/img/logo_pleyber.gif">
            </div>
            <div id="titre">
                Médiathèque Pleyber Christ
            </div>
        </div>
        <nav id="menu">
            <ul id="menu-gauche">
                <li>
                    <a href="index.php?action=Accueil">Médiathèque</a>
                </li>
                <?php 
                if (isset($_SESSION['isadmin']) and $_SESSION['isadmin']) {
                ?>
                <li>
                    <a href="index.php?action=Reservations">Gérer les réservations non traitées</a>
                </li>
                <li>
                    <a href="index.php?action=ReservationsTraitees">Gérer les réservations traitées</a>
                </li>
                <li>
                    <a href="index.php?action=Emprunts">Gérer les emprunts</a>
                </li>
                <?php                    
                }
                else
                {
                ?>
                <li>
                    <a href="index.php?action=Nouveautes">Nouveautés</a>
                </li>
                <li>
                    <a href="index.php?action=Catalogue">Catalogue</a>
                </li>
                <?php 
                    if (!empty($_SESSION['current_user'])) { 
                ?>
                <li>
                    <a href="index.php?action=MesReservations">Mes réservations</a>
                </li>
                <li>
                    <a href="index.php?action=MesEmprunts">Mes emprunts en cours</a>
                </li>
                <?php                    
                }
                }
                ?>


            </ul>
            <ul id="menu-droite">
                <?php 
                    if (!empty($data["current_user"])) { 
                ?>
                <li>
                    <em>Bienvenue <?php echo $data["current_user"]; ?></em>
                </li>
                <li>
                    <a href="index.php?action=ValidationDeconnexion" class="navbar-brand"><strong>Déconnexion</strong></a>
                </li>
                <?php                    
                    } else {
                ?>
                <li>
                    <a href="index.php?action=Inscription"><span class="glyphicon glyphicon-user"></span> Inscription</a>
                </li>
                <li>
                    <a href="index.php?action=Enregistrement"><span class="glyphicon glyphicon-log-in"></span> Enregistrement</a>
                </li>
                <?php
                    }
                 ?>
            </ul>
        </nav>
    </header>

        <main>
            
            <?php
            
                echo $data['content']; 
            
            ?>
            
            

        </main>
    <footer>
        Mairie - Square Anne de Bretagne - 29410 Pleyber-Christ<br> Tél : 02 98 78 41 67 | Mail : <a href="mailto:pleyber.christ-mairie@wanadoo.fr">pleyber.christ-mairie@wanadoo.fr</a>
    </footer>

        </body>
</html>
    
    

