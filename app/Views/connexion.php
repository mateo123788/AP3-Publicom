<?= $this->extend('layout') ?> 

<?= $this->section('contenu') ?>  

<section>

    <form class="form-blyat" method="get" action="">
        <input id="id" name="id" type="hidden" value="" />
        <label for="prenom">Nom utilisateur</label>
        <input id="prenom" name="prenom" type="text" required value="" />
        <label for="">Mot de passe</label>
        <input id="nom" name="nom" type="text" required value="" />
        <input class=button type="submit" value="Valider" />
    </form>

 <?= $this->endSection() ?> 

</section>