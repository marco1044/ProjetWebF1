<!doctype html>

<?php

include ('./lib/php/Jliste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $password);

session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bienvenue sur mon site de F1 </title>  
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/bootstrap-3.3.7/dist/css/bootstrap.css"/>

        
        <link rel="stylesheet" type="text/css" href="./lib/css/page_styles.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/contact_inscription.css" />
        <script type="text/javascript" src="../admin/lib/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="../admin/lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <script src="admin/lib/js/functionsJquery.js" type="text/javascript"></script>
        <script src="admin/lib/js/functionsJqueryVal.js" type="text/javascript"></script>
        <script src="admin/lib/js/functionsJqueryAdmin.js" type="text/javascript"></script>

    </head>

    <body>
        <header>
          <div class="lel">
            <img src="../admin/images/F1_banniere.jpg" alt="Formula1"/>
          </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                       <?php
                        if (file_exists('./lib/php/menu.php')) {
                            include ('./lib/php/menu.php');
                        }
                        ?>
                    </nav>
                </div>
                
                <div class ="accueil">
                    <?php
                        if(!isset($_SESSION['page'])){
                            $_SESSION['page']='accueil';
                        }
                        if(isset($_GET['page'])){
                            $_SESSION['page']=$_GET['page'];
                        }
                        $path='./pages/'.$_SESSION['page'].'.php';
                        if(file_exists($path)){
                            include($path);
                        }
                        else {
                            print "Page introuvable";
                        }
                    ?>
                </div>
            </div>
            <footer>
                © Infos F1 - Copyright 2017.
            </footer>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#jquerytest").text(" Hello world ");
});
        </script>
    </body>
</html>
