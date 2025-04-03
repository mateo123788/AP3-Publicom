<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>


<form class="form-main" method="post" action=<?= url_to('update_panneau') ?>>
    <label>Nom coommune :</label>
    <input type="text" readonly value="<?= $panneau['NOM_COMMUNE'] ?>">
    <input type="hidden" value="<?= $panneau['ID_PANNEAU'] ?>" name="ID_PANNEAU">
    <label>Geolocalisation :</label>
    <input name="GEOLOCALISATION" type="text" value=<?= $panneau['GEOLOCALISATION'] ?>>
    <input class=button type="submit" value="Valider" />

</form>

<?= $this->endSection() ?>