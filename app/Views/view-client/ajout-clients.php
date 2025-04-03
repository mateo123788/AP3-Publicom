<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>



 <h1 class=titre>AJOUTS CLIENTS</h1>

<form class="form-main" method="post" action="<?= url_to('create_client') ?>">
    <label for="NOM_COMMUNE">Nom commune : </label>
    <input id="NOM_COMMUNE" name="NOM_COMMUNE" type="text" required  maxlength="15" placeholder="......................"/>
    <label for="NOM_RESPONSABLE">Nom responsable : </label>
    <input id="NOM_RESPONSABLE" name="NOM_RESPONSABLE" type="text" required maxlength="15" placeholder="......................" />
    <label for="DESCRIPTION">Description : </label>
    <textarea for="DESCRIPTION" name="DESCRIPTION" rows="4" cols="40" required>

    </textarea>
    <input class=button type="submit" value="Valider" />
</form>



<?= $this->endSection() ?>