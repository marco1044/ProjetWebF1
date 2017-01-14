<div id="contenu">

</div>
<?php
if (isset($_GET['submit_compte'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($prenom) != '' && trim($nom) != '' && trim($GPchoisi) != '' && trim($NbreTicket)) {
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
            $_SESSION['form']['prenom'] = $prenom;
        }
        if (trim($pren_cc) != '') {
            $_SESSION['form']['nom'] = $nom;
        }
        if (trim($adresse_cc) != '') {
            $_SESSION['form']['GPchoisi'] = $GPchoisi;
        }
        if (trim($ville_cc) != '') {
            $_SESSION['form']['NbreTicket'] = $NbreTicket;
        }
    }
}
?>



<div id="contenu2">
    <form id="form_contact">
        <fieldset>
            <legend class="txtContact">Achat de tickets</legend>
            <table id="tabContact">
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
                    <td>Nom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['nom'])) { ?>
                            <input type="text" name="nom" id="prenom" value="<?php print $_SESSION['form']['nom']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom" id="nom" placeholder="nom" required/>
                            <?php
                        }
                        ?><br/><br/>
                    </td>
                </tr>

                <tr>
                     <td>Nom du GP</td>
                    <td>
                        <?php if (isset($_SESSION['form']['GPchoisi'])) { ?>
                            <input type="text" name="GPchoisi" id="GPchoisi" value="<?php print $_SESSION['form']['GPchoisi']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <form><select type="text" name="GPchoisi"size="1" id="GPchoisi" placeholder="GPchoisi" required/>
                            <OPTION>Australie  <OPTION>Bahreïn  <OPTION>Chine <OPTION>Russie
                            <OPTION>Espagne <OPTION>Monaco <OPTION>Canada <OPTION>Europe
                            <OPTION>Autriche <OPTION>Grande-Bretagne <OPTION>Hongrie <OPTION>Allemagne
                            <OPTION>Belgique <OPTION>Italie <OPTION>Singapour <OPTION>Malaisie
                            <OPTION>Japon <OPTION>Etas-Unis <OPTION>Mexique <OPTION>Brésil <OPTION>Abu Dhabi
                            </select></form>
                            <?php
                        }
                        ?><br/><br/>

                    </td>
                </tr>
                
                <tr>
                    <td>Quantité</td>
                    <td>
                        <?php if (isset($_SESSION['form']['NbreTicket'])) { ?>
                            <input type="text" name="NbreTicket" id="ville_cc" value="<?php print $_SESSION['form']['NbreTicket']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="NbreTicket" id="NbreTicket" placeholder="NbreTicket" required/>
                            <?php
                        }
                        ?><br/><br/>

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        &nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit_reserv" id="submit_reserv" value="Acheter" />
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
    if ($_POST['prenom'] != "" && $_POST['nom'] != "" && $_POST['GPchoisi'] != "" && $_POST['NbreTicket'] != "" ) {// Vérif case vide
        $query="select idticket from ticket where prenom = :prenom";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':prenom', $_GET['prenom']);
        $resultset->execute();
        $data = $resultset->fetch();
        $_SESSION['prenom'] = $data['idticket'];
        
        
        $query = "insert into tickets(prenom,nom,GPchoisi,NbreTicket) 
            values('" . $_POST['prenom'] . "','" . $_POST['nom'] . "','" . $_POST['GPchoisi'] . "','". $_POST['NbreTicket'] .  "')";
        
        $resultset = $_db->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();
        
        echo "Votre formulaire a bien été envoy&eacute;e.";
    } else {
        echo "votre formulaire est incomplet";
    }
}
?>

        