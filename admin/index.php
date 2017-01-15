<!doctype html>
<?php

include ('./lib/php/adm_liste_include.php');
$db = Connexion::getInstance($dsn, $user, $password);
session_start();
$styles = array();
$i2 = 0;
foreach (glob('./lib/css/*.css') as $css) {
    $styles[$i2] = $css;
    $i2++;
}
$scripts = array();
$i = 0;
foreach (glob('./lib/js/jquery/*.js') as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html>
    <head>
        <title>Formula 1 Administration</title>
        <meta charset='UTF-8'/>    
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css"/>
        <?php
        foreach ($styles as $css) {
            ?><link rel="stylesheet" type="text/css" href="<?php print $css; ?>"/>
            <?php
        }
        ?>
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/page_style.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css"/>
        <?php
        foreach ($fichierJs as $js) {
            ?><script type="text/javascript" src="<?php print $js; ?>"></script>
            <?php
        }
        ?>
            <script type="text/javascript" src="./lib/js/functionJquery1.js"></script> 
    </head>

    <body>    
        <header>
            <div class="container">
                <img src="../admin/images/F1_banniere.jpg" alt="Formula1"/>
                 <section id="deconnexion"> 

                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?><a href="./lib/php/disconnect.php" class="bDec">Déconnexion</a>
                        <?php
                    }
                    ?>
            </div>
        </header>
            

            <?php if (!isset($_SESSION['admin'])) {
                ?>
                <section id="login_form">
                    <?php
                    require './pages/ConnexionAdmin.php';
                    ?> </section><?php
            } else {
                ?>
                <section id="exemple">
   
                        <ul class="nav">

                            <?php
                            if (file_exists('./lib/php/menu.php')) {
                                include ('./lib/php/menu.php');
                            }
                            ?>

                        </ul>

                </section>

                <section id="all">


                        <?php
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                        $chemin = './pages/' . $_SESSION['page'] . '.php';
                        if (file_exists($chemin)) {

                            include ($chemin);
                        }
                        ?>                      
                    

                </section>		

                <footer id="footerAc">© Infos F1 - Copyright 2017.</footer>
    <?php
}
?>
    </body>
</html>

