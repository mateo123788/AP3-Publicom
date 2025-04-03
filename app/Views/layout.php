<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />

</head>

<body class=background>

    <header class=head>

        <ul class=nav>

            <li> <?= $admin ? '<a href="' . url_to('liste_client') . '">Clients</a>' : '' ?></li>
            <!-- <li><a href="<?= url_to('liste-message') ?>">Clients</a></li> -->
            <li><a href="<?= url_to('liste-message') ?>">Messages</a></li>
            <li><a href="<?= url_to('liste-panneau') ?>">Panneaux</a></li>
            <!-- <li> <?= $admin ? '<a href="'. url_to('liste-panneau') .'">Panneaux</a>' : '' ?></li> -->
            <!-- <li><a href="<?= url_to('liste-message') ?>">Contact</a></li> -->
            <li><a href="<?= url_to('logout') ?>">Déconnexion</a></li>
        </ul>

        <div class="heroe">

            <h1 class=titre>Publicom</h1>

            <h2 class=titre>Bienvenue sur le site de publicom </h2>

        </div>
    </header>

    <!-- CONTENT -->

    <section>

        <?= $this->renderSection('contenu') ?>

    </section>



    <footer>

        <div id="copyright" align="center"></div>
        <script>
            (() => {
                const copyrightElement = document.getElementById("copyright");
                copyrightElement.innerHTML = "© 2024 - " + new Date().getFullYear() + "  - BOURGIR.";
            })();
        </script>

    </footer>

    <!-- SCRIPTS -->

    <!-- <script {csp-script-nonce}>
        document.getElementById("menuToggle").addEventListener('click', toggleMenu);

        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script> -->

    <script>
        function messageDelete() {
            confirm('Vous allez supprimer tous les messages et panneaux en relations avec le client etes vous sur ?') || event.preventDefault();
        }
    </script>

    <!-- -->

</body>

</html>