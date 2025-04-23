<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">

</head>

<body>

<div id="nav">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="babyfarm.php" target="_blank">
            <img src="IMG_6908.png" width="80" height="80" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="montesso.php">Approche Montessori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crecheeco.php">Eco responsable</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chef.php">Restauration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Espace parents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loginpro.php">Espace pro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="info.php">Info pratique</a>
                </li>
               
            </ul>
        </div>
    </nav>
</div>



    <!-------------------------------------BANNIERE DEBUT -->
    <!-------------------------------------BANNIERE DEBUT -->

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');

        /* Variables uniques */
        .BanniereContainer {
            --TypoBanniere: 'Oswald', sans-serif;
            --TypoBanniere_Taille_Bold: 18pt;
            --TypoBanniere_Taille_Light: 14pt;
            --TypoBanniere_Couleur: rgb(177, 165, 127);
            --TypoBanniere_Bold: 600;
            --TypoBanniere_Light: 300;
            --VitesseBanniere: 12s;
            --Couleur_de_fond_Banniere: beige;

            position: relative;
            width: 100%;
            height: 60px;
            /* Taille réduite de la bannière */
            display: flex;
            flex-direction: column;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
            background-color: var(--Couleur_de_fond_Banniere);
        }

        /* Texte défilant */
        .texteDefilantBanniere {
            margin: auto;
            display: inline-block;
            width: 100%;
            font-family: var(--TypoBanniere);
            font-size: var(--TypoBanniere_Taille_Bold);
            color: var(--TypoBanniere_Couleur);
            text-align: center;
        }

        .texteDefilantBanniere b {
            font-weight: var(--TypoBanniere_Bold);
        }

        .texteDefilantBanniere i {
            font-size: var(--TypoBanniere_Taille_Light);
            font-style: normal;
            font-weight: var(--TypoBanniere_Light);
        }

        .texteDefilantBanniere div {
            position: absolute;
            transform: translateY(-50%);
            min-width: 100%;
        }

        .texteDefilantBanniere div span {
            left: 0;
        }

        /* Animation */
        .texteDefilantBanniere div span:first-child {
            animation: defilementBanniere var(--VitesseBanniere) infinite linear;
        }

        .texteDefilantBanniere div span:last-child {
            position: absolute;
            animation: defilementBanniere2 var(--VitesseBanniere) infinite linear;
        }

        @keyframes defilementBanniere {
            0% {
                margin-left: 0;
            }

            100% {
                margin-left: -100%;
            }
        }

        @keyframes defilementBanniere2 {
            0% {
                margin-left: 100%;
            }

            100% {
                margin-left: 0%;
            }
        }
    </style>

    <!---------------------------------------------------------- HTML -------------------------------------------------------------->

    <div class="BanniereContainer">
        <a href="#" class="texteDefilantBanniere">
            <div>
                <span>
                    <b>INSCRIPTION SORTIES 2025</b>
                    <i> - Calendrier des inscpritions 2025 est desormais disponible! -</i>&nbsp;
                </span>

            </div>
        </a>
    </div>

    <!------------------------------------------------------- Javascript ----------------------------------------------------------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script language="javascript">
        function marqueelikeBanniere() {
            $('.texteDefilantBanniere').each(function () {
                var texte = $(this).html();
                $(this).html('<div><span>' + texte + '</span><span>' + texte + '</span></div>');
            });
        }

        $(window).on('load', function () {
            marqueelikeBanniere();
        });
        
    </script>

    <!-------------------------------------BANNIERE FIN -->

    <!-------------------------------------BANNIERE FIN -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-------------------------------------------FIN DE LA NAV----------------------------------------->







    <br><br>
    <br>

    <!--LOGIN______________________________________________________________________-->
    <section class="container">

        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
                    alt="illustration" class="illustration" />
                <h1 class="opacity">Espace Administrateur</h1>
                <form action="connexionpro.php" method="POST">
                    <input type="text" name="nom" placeholder="NOM" required />
                    <input type="password" name="mot_de_passe" placeholder="MOT DE PASSE" required />
                    <input type="submit" value="Enregistrer"  class="btn btn-primary">
                </form>


                <!--- <a href="file:///Applications/MAMP/htdocs/monphp/babyfarm/loginpro.html">ESPACE PRO</a>-->
            </div>
        </div>
        <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>

    </section>




    <!--LOGIN______________________________________________________________________-->






    <!-- Copyright -->
    <div class="text-center33">
        © 2024 Votre Entreprise. Tous droits réservés.
    </div>
    </footer>