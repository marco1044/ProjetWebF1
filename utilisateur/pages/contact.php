
<p>Si vous voulez en savoir plus sur la f1, 
    vous pouvez me contacter en m'envoyant un mail en remplissant le formulaire 
    ci-dessous.<br/></p>

<?php
if (isset($_GET['submit_reserv'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($nom_cpt) != '' && trim($email_cpt) != '' && trim($texte) != '' ) {
        $mg2 = new contactManager($db);
        $retour = $mg2->addContact($_GET);
        if ($retour == 1) {
            $texte = "<span class='txtGras'>Demande enregistrée.<br />Réponse dans les plus bref délais.</span>";
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        }
    } else {
        $texte = "Complétez tous les champs.";
        if (trim($nom_client) != '') {
            $_SESSION['form']['nom_cpt'] = $nom_cpt;
        }
        if (trim($email) != '') {
            $_SESSION['form']['email_cpt'] = $email_cpt;
        }
        if (trim($comm_client) != '') {
            $_SESSION['form']['texte'] = $texte;
        }
    }
}
?>



<div id="contenu">
    <form id="form_contact">
        <fieldset>
            <legend class="txtContact txtBlanc">Formulaire</legend>
            <table id="tabContact">
                <tr>
                    <td>Entrez votre nom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['nom_cpt'])) { ?>
                            <input type="text" name="nom_cpt" id="nom_cpt" value="<?php print $_SESSION['form']['nom_cpt']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom_cpt" id="nom_cpt" placeholder="Nom" required/>
                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>

                <tr>
                    <td>Votre email</td>
                    <td>
                        <?php if (isset($_SESSION['form']['email_cpt'])) { ?>
                            <input type="text" name="email_cpt" id="email_cpt" value="<?php print $_SESSION['form']['email_cpt']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="email_cpt" id="email_cpt" placeholder="Email" required/>
                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>

                <tr>
                    <td>Votre commentaire</td>
                    <td>
                        <?php if (isset($_SESSION['form']['texte'])) { ?>
                            <textarea name="texte" id="texte" rows="6" cols="22" value="<?php print $_SESSION['form']['texte']; ?>"/></textarea>
                            <?php
                        } else {
                            ?>
                            <textarea name="texte" id="texte" rows="6" cols="22" placeholder="Commentaire" required/></textarea>

                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit_reserv" id="submit_reserv" value="Envoyer" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" id="reset" value="Remise à zéro du formulaire" />
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</div>





<?php
$cnx = Connexion::getInstance($dsn, $user, $password);

extract($_GET);

if (isset($_POST['Envoyer'])) {
    $_db = $cnx;
    if ($_POST['nom'] != "" && $_POST['email'] != "" && $_POST['texte'] != "") {// Vérif case vide
        $query="select idcontact from contact where nom = :nom";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':nom', $_GET['enom']);
        $resultset->execute();
        $data = $resultset->fetch();
        $_SESSION['nom'] = $data['idcontact'];
        
        $query = "insert into contact(nom,email,texte) 
            values('" . $_POST['nom'] . "','" . $_POST['e'] . "','" . $_POST['texte'] . "')";
         $resultset = $_db->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();
        echo "Votre formulaire a bien été envoy&eacute;e.";
    } else {
        echo "votre formulaire est incomplet";
    }
}
?>


