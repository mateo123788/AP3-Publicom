<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<section>

    <?php

    use \CodeIgniter\View\Table;

    $table = new Table();

    $table->setHeading('NOM COMMUNE', 'RESPONSABLE', 'DESCRIPTION', 'MODIFIER', 'SUPPRIMER');

    ?>

    <h1 class=titre>GESTIONS CLIENTS</h1>

    <!-- <a class=button href="<?= url_to('ajout_client') ?>">Ajouts Clients</a> -->
    <?= $admin ? '<a class=button href="' . url_to('ajout_client') . '">Ajouts Clients</a>' : '' ?><p></p>


    <?php
    // var_dump($listeClients);

    foreach ($listeClients as $clients) {
        $table->addRow(
            // $client['ID_CLIENT'],
            $clients['NOM_COMMUNE'],
            $clients['NOM_RESPONSABLE'],
            $clients['DESCRIPTION'],
            // $clients['GEOLOCALISATION'],
            '<a class=button href="' . url_to('modif_client', $clients['ID_CLIENT']) . '">Modifier</a>',
            '<form method="post" action="' . url_to('suppr_client', $clients['ID_CLIENT']) . '">
                <input type="hidden" name="ID_CLIENT" value="' . $clients['ID_CLIENT'] . '">
                <input onclick="messageDelete()" type="submit" value="Supprimer" class="button">
            </form>'
        );
    }

    echo $table->generate(); // Crée une table depuis la base de donnée

    ?>
    <?= $this->endSection() ?>

   

</section>