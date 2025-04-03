<?= $this->extend('layout.php') ?>
<?= $this->section('contenu') ?>
<form class=form-main method="post" action="<?= url_to('update_message') ?>">
    <input type="hidden" id="ID_MESSAGE" name="ID_MESSAGE" value="<?= $message['ID_MESSAGE'] ?>">

    <label for="LIBELLE">Message :</label>
    <input type="text" id="LIBELLE" name="LIBELLE" value="<?= $message['LIBELLE'] ?>" required>
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $message['ID_CLIENT'] ?>">
    <label for="favcolor">Choisi la couleur de ton message:</label>
    <input type="color" id="COULEUR" name="COULEUR" value="#ff0000">
    <label for="ETAT_MESSAGE">Actif:</label>
    <input type="checkbox" id="ETAT_MESSAGE" name="ETAT_MESSAGE" value="<?= $message['ETAT_MESSAGE'] ?>"><p></p>

    <input class=button type="submit" value="Valider"  />
</form>

<?= $this->endSection() ?>