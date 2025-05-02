<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>



<form class="form-main" method="post" action=<?= url_to('create_panneaux') ?>>
    <label for="listeDeroulanteClient">Choisir un nom de commune : </label>

    <select name="ID_CLIENT" id="ID_CLIENT">
        <option value="">--Choissisez un client--</option>
        <?php
        foreach ($listClient as $client) {
        ?>
            <option value="<?= $client['ID_CLIENT'] ?>"><?= $client['NOM_COMMUNE'] ?> </option>
        <?php
        }
        ?>

    </select>
    <label>Geolocalisation :</label>
    <input name="GEOLOCALISATION" type="text">
    
    <input class=button type="submit" value="Valider" />
</form>

<?= $this->endSection() ?>