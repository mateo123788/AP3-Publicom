<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<section>
    <?php

    $table = new \CodeIgniter\View\Table();

    $table->setHeading('NOM COMMUNE', 'MESSAGE', 'ACTIF', 'MODIFIER', 'SUPPRIMER');

    ?>

    <h1 class=titre>GESTIONS MESSAGES</h1>

    <a class=button href="<?= url_to('ajout_message') ?>">Ajouts Messages</a>
    <p></p>


    <?php

    foreach ($listeMessage as $message) {
        // echo $etudiant['nom'];
        // echo$etudiant['prenom'];
        // echo '<p>' . $etudiant['nom'] . ' ' . $etudiant['prenom'] . '</p>';
        // '<a href="#" class="button">Modifier</a>', '<a href="#" class="button">Supprimer</a>');

        $table->addRow(
            $message['NOM_COMMUNE'],
            '<p style="color:' . $message['COULEUR'] . ';">' . $message['LIBELLE'] . '<p/>',
            // fermer l'input
            // supprimer l'attribut value
            // rajouter l'attribut checked SEULEMENT SI $message['ETAT_MESSAGE'] = 1 (utiliser l'opérateur ternaire ? 'checked' : '')
            '<input type="checkbox" name="ETAT_MESSAGE" ' . ($message['ETAT_MESSAGE'] == 1 ? ' checked' : '') . ' disabled>',
            // '<a href="' . url_to('modif_message', $message['ID_MESSAGE']) . '" class="button">Modifier</a>',
            // '<a href="' . url_to('suppr_message', $message['ID_MESSAGE']) . '" class="button">Supprimer</a>'
            '<a class=button href="' . url_to('modif_message', $message['ID_MESSAGE']) . '" class="button">Modifier</a>',
            '<form method="post"  action="' . url_to('suppr_message', $message['ID_MESSAGE']) . '">
                        <input type="hidden" name="ID_CLIENT" value="' . $message['ID_MESSAGE'] . '">
                        <input type="submit" value="Supprimer" class="button">
            </form>'
        );
    }
    echo $table->generate()
    ?>

    <?= $this->endSection() ?>

</section