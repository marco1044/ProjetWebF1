<h2 class="txtRouge">Commandes</h2>

<?php
//traitement php formulaire
if(isset($_GET['commander'])){
    extract($_GET,EXTR_OVERWRITE);
    
    if(empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone)
            || empty($adresse) || empty($numero) || empty($codepostal) || empty($localite)){
        $erreur = "<span class='txtGras txtRouge'>Veuillez renseigner tous les champs</span>";
    }
    else {
        //vérific champ téléphone
        if(preg_match("#[0-9]{3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}#",$telephone) == true){
            print "ok";
        }
        else print "non";
        
        //appel procédure
        
        print "ok";
    }
}


if(!isset($_GET['id_gateau'])){?>
    <p><br/>Veuillez d'abord choisir <a href="./index.php?page=produit">ici</a></p>
<?php }
else {
    $gateau = new Vue_gateauxDB($cnx);
    $cake = $gateau->getVue_gateauById($_GET['id_gateau']);


?>

    <div class="row">
        <div class="col-xs-4 col-sm-2">
            <img src="./admin/images/<?php print $cake[0]['image']; ?>" alt="Votre commande"/>
        </div>
        <div class="col-xs-8 pull-left">
            <br/><span class="txtGras">Votre commande : <span class="txtRouge"><?php print $cake[0]['nom_gateau'];?></span></span><br/>
        </div>
    </div>

    Veuillez entrer vos coordonnées : <br/><br/>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php
                if(isset($erreur)) print $erreur;
                ?>
            </div>
        </div>
        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="get" id="form_commande">

            <div class="row">
                <div class="col-sm-2"><label for="email1">Email</label></div>
                <div class="col-sm-4">
                    <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2"><label for="email2">Confirmez votre email</label></div>
                <div class="col-sm-4">
                    <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-2"><label for="nom">Nom</label></div>
                <div class="col-sm-4">
                    <input type="text" name="nom" id="nom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"><label for="prenom">Prénom</label></div>
                <div class="col-sm-4">
                    <input type="text" name="prenom" id="prenom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"><label for="telephone">Téléphone</label></div>
                <div class="col-sm-4">
                    <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"><label for="adresse">Adresse</label></div>
                <div class="col-sm-4">
                    <input type="text" name="adresse" id="adresse" />
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-2"><label for="numero">Numéro</label></div>
                <div class="col-sm-4">
                    <input type="text" name="numero" id="numero" />
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-2"><label for="codepostal">Code postal</label></div>
                <div class="col-sm-4">
                    <input type="text" name="codepostal" id="codepostal" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"><label for="localite">Localité</label></div>
                <div class="col-sm-4">
                    <input type="text" name="localite" id="localite" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm-4">
                    <input type="hidden" name="id_gateau" value="<?php print $_GET['id_gateau'];?>"/>
                    <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
                    <input type="reset" id="reset" value="Annuler" class="pull-left"/>
                </div>
            </div>
        </form>
    </div>
    <?php
    }
    ?>