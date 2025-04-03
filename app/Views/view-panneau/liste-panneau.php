<?= $this->extend('layout.php') ?>
<?= $this->section('contenu') ?>

<section>

    <h1 class=titre>GESTIONS PANNEAUX</h1>

    <a class="button" href="<?= url_to('ajout_panneau') ?>">Ajouts Panneaux</a>
    <p></p>
    <?php
    $table = new \CodeIgniter\View\Table();
    // $table->setHeading('Panneau', 'Commune', 'Responsable', 'Description', 'Disponibilite','Messages','Etat Messages');
    $table->setHeading('NOM COMMUNE', 'GEOLOCALISATION', 'MODIFIER', 'SUPPRIMER');
    // SUPRESSION COLONNE MESSAGE ET PANNEAU AVEC LES ID
    foreach ($listePanneau as $panneau => $p) {
        foreach ($listClient as $clients => $c) {
            // foreach ($listMessage as $messages => $m) {

            if ($c['ID_CLIENT'] == $p['ID_CLIENT']) {
                $table->addRow(
                    // $p['ID_PANNEAU'],
                    // $p['ID_CLIENT'],
                    // $m['LIBELLE'],
                    $c['NOM_COMMUNE'],
                    $p['GEOLOCALISATION'],
                    '<a class="button" href="' . url_to('modif_panneau', $p['ID_PANNEAU']) . '">Modifier</a>',
                    // '<a class="button" href="' . url_to('suppr_panneau', $p['ID_PANNEAU']) . '">Supprimer</a>',
                    // '<a class=button href="' . url_to('modif_panneau', $p['ID_PANNEAU']) . '">Modifier</a>',
                    '<form method="post" action="' . url_to('suppr_panneau', $p['ID_PANNEAU']) . '">
                        <input type="hidden" name="ID_CLIENT" value="' . $p['ID_PANNEAU'] . '">
                        <input type="submit" value="Supprimer" class="button">
                    </form>'
                );
            }
            // }
        }
    }

    echo $table->generate();

    ?>

    <?= $this->endSection() ?>