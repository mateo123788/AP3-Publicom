<?= $this->extend('layout.php') ?>
<?= $this->section('contenu') ?>


<h1 class=titre>AJOUTS MESSAGES</h1>

<form class="form-main" method="post" action="<?= url_to('create_message') ?>">
    <label for="message">Message :</label>
    <input type="text" name="LIBELLE" required>
    <label for="favcolor">Choisissez la couleur de votre message :</label>
    <input type="color" id="COULEUR" name="COULEUR" value="#ff0000">
    <p></p>
    <label for="client">Nom Commune :</label>
    <select name="ID_CLIENT">
        <!-- // name doit correspondere au nom de la colonne -->


        <!-- // boucle foreach sur les clients (il faut donc que le controleur envoie 'clients' à cette vue -->
        <!-- // générer (echo) <option value="<id du client courant>"> -->
        <!-- <nom du client courant>
        </option> -->

        <?php

        foreach ($listeClients as $client) {
            echo '<option value=' . $client['ID_CLIENT'] . '>' . $client['NOM_COMMUNE'] . '</option>';
        }

        ?>

        <!-- <option id="ID_CLIENT" <?php
                                    //SUPPR $table = new \CodeIgniter\View\Table();
                                    //SUPPR $table->setHeading('NOM COMMUNE');
                                    // foreach ($listeClient as $client) {
                                    //SUPPR $table->addRow(
                                    // $client['NOM_COMMUNE']
                                    // );
                                    //SUPPR echo $table->generate();
                                    // } 
                                    ?>></option> -->
    </select>

    <label for="ETAT_MESSAGE">Actif :</label>
    <input type="checkbox" id="ETAT_MESSAGE" name="ETAT_MESSAGE">
    <p></p>
    <!-- <button type="submit">Ajouter</button> -->
    <input class=button type="submit" value="Valider" />

    

</form>



    <?= $this->endSection() ?>