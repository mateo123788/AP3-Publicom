<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

 <?php 
// var_dump($client)
// var_dump($listeDepartement)
?> 

<h1 class=titre>MODIFICATION CLIENT</h1>

<form class="form-main" method="post" action="<?= url_to('update_client')?>">
    <input id="ID_CLIENT" name="ID_CLIENT" type="hidden" value="<?= $client['ID_CLIENT']?>" />
    <label for="NOM_COMMUNE" >Nom commune: </label>
    <input id="NOM_COMMUNE" name="NOM_COMMUNE" type="text" required value="<?= $client['NOM_COMMUNE']?>" />
    <label for="NOM_RESPONSABLE">Nom responsable: </label>
    <input id="NOM_RESPONSABLE" name="NOM_RESPONSABLE" type="text" required value="<?= $client['NOM_RESPONSABLE']?>"/>
    <label for="DESCRIPTION">Description: </label>
    <textarea for="DESCRIPTION" name="DESCRIPTION" rows="4" cols="40" required ><?= $client['DESCRIPTION']?>

    </textarea>
    <input class=button type="submit" value="Valider"  />
</form>



<?= $this->endSection() ?>