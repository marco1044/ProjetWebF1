
<div id="contenu">

</div>

<?php
if (isset($_GET['submit_compte'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($nom) != '' && trim($prenom) != '' && trim($adresse) != '' && trim($ville) != '' && trim($pays) != '') {
        $mg2 = new creercompteManager($db);
        $retour = $mg2->addClient($_GET);
        if ($retour >= 0) {
            $texte = "<span class='txtGras'>Demande enregistrée.</span>";
            print '$texte';
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        }
    } else {
        $texte = "Complétez tous les champs.";
        if (trim($nom_cc) != '') {
            $_SESSION['form']['nom'] = $nom;
        }
        if (trim($pren_cc) != '') {
            $_SESSION['form']['prenom'] = $prenom;
        }
        if (trim($adresse_cc) != '') {
            $_SESSION['form']['adresse'] = $adresse;
        }
        if (trim($ville_cc) != '') {
            $_SESSION['form']['ville'] = $ville;
        }
        if (trim($pays_cc) != '') {
            $_SESSION['form']['pays'] = $pays;
        }
    }
}
?>



<div id="contenu2">
    <form id="form_contact">
        <fieldset>
            <legend class="txtContact">S'enregistrer</legend>
            <table id="tabContact">
                <tr>
                    <td>Nom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['nom'])) { ?>
                            <input type="text" name="nom" id="nom" value="<?php print $_SESSION['form']['nom']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom" id="nom" placeholder="Nom" required/>
                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>

                <tr>
                    <td>Prenom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['prenom'])) { ?>
                            <input type="text" name="prenom" id="prenom" value="<?php print $_SESSION['form']['prenom']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>

                <tr>
                     <td>Adresse</td>
                    <td>
                        <?php if (isset($_SESSION['form']['adresse'])) { ?>
                            <input type="text" name="adresse" id="adresse_cc" value="<?php print $_SESSION['form']['adresse']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required/>
                            <?php
                        }
                        ?><br/><br/>

                    </td>
                </tr>
                
                <tr>
                    <td>Ville</td>
                    <td>
                        <?php if (isset($_SESSION['form']['ville'])) { ?>
                            <input type="text" name="ville" id="ville_cc" value="<?php print $_SESSION['form']['ville']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="ville" id="ville" placeholder="Ville" required/>
                            <?php
                        }
                        ?><br/><br/>

                    </td>
                </tr>
                
                 <tr>
                    <td>Pays</td>
                    <td>
                        <?php if (isset($_SESSION['form']['pays'])) { ?>
                            <input type="text" name="pays" id="pays" value="<?php print $_SESSION['form']['pays']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="pays" id="pays" placeholder="Pays" required/>
                            <?php
                        }
                        ?><br/><br/>

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        &nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit_reserv" id="submit_reserv" value="S'enregistrer" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" id="reset" value="Remise à zéro du formulaire" />
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</div>





<?php
if (isset($_POST['Envoyer'])) {
    if ($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['adresse'] != "" && $_POST['ville'] != "" && $_POST['pays'] != "") {// Vérif case vide
        $query = "insert into membres(nom,prenom,adresse,ville,pays) 
            values('" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['adresse'] . "','". $_POST['ville'] . "','" . $_POST['pays'] . "')";
        $result = pg_query($cnx, $query);
        echo "Votre formulaire a bien été envoy&eacute;e.";
    } else {
        echo "votre formulaire est incomplet";
    }
}
?>


