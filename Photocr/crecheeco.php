<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creche écologique</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="crecheeco.css">
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
    <!-------------------------------------------DEBUT CRECHE ECO S ----------------------------------------->


    <div class="eco-responsable-section">
        <div class="eco-responsable-content">
            <h1 id="ecoo">Eco Responsable</h1>
            <div class="line"></div>
        </div>
    </div>




    <section id="grandeco">
        <div id="diveco">
            <h1 id="presentationeco"> Notre crèche eco responsable</h1>
            <br>
            <img id="photoeco" src="main bb2.jpg">
            <br> <br>
            <br> <br>
            <h2 id="h3bb">Nos Engagements Écologiques</h3 id="h3bb">
                <p id="ecoT">
                    Nous avons mis en place une série d’initiatives pour réduire notre impact écologique et offrir un
                    environnement sain aux enfants.
                </p>
                <br> <br>
                <h3 id="h3bb">Utilisation de Matériaux Durables</h3 id="h3bb">
                <p id="ecoT">
                    Tous nos meubles et jouets sont conçus à partir de matériaux <strong>naturels et durables</strong>,
                    exempts de produits
                    toxiques pour la santé des enfants et de l’environnement.
                </p>
                <br> <br>
                <h3 id="h3bb">Alimentation Bio et Locale</h3 id="h3bb">
                <p id="ecoT">
                    Nos repas sont préparés à partir de produits <strong>biologiques et locaux</strong>, afin de
                    garantir
                    une alimentation
                    saine et respectueuse de la planète. Nous favorisons les producteurs locaux pour réduire notre
                    empreinte
                    carbone.
                </p>

    </section>



    <br>
    <section id="grandmontesso">
        <div id="divmontesso">

            <br>
            <img id="photomontessof" src="Mini_Montessori_eco-responsable_alimentation.jpg">
            <br><br>
            <p id="presentationtextemontesso">
            <h1>Une alimentation raisonnée</h1>     <br><br>     <br><br>
            <h9>

                Nous souhaitons que les enfants bénéficient de l’alimentation la plus saine et la moins polluante
                possible, avec des produits bio, de saison, frais, fournis par un prestataire privilégiant les
                circuits
                courts, les productions locales et raisonnées. Les goûters et les pains sont faits sur place.
            </h9>


        </div>







    </section>





    <br>
    <section id="grandmontesso">
        <div id="divmontesso">

            <br>
            <img id="photomontessof" src="Mini_Montessori_eco-responsable_entretien.jpg">
            <br><br>
            <p id="presentationtextemontesso">
            <h1>Entretien et hygiène écologiques</h1>
            <br><br>     <br><br>
            <h9>

            Nous utilisons uniquement des produits labelisés écologiques ou faits maison. Nous limitons au maximum
            nos
            consommables.
            </h9>


        </div>







    </section>









  



    </section>

























    <br><br> <br><br>


    <!-------------------------------------------FIN DE PAGE ----------------------------------------->

    <section id="contactus">
        <p id="besoin">Besoin de plus de renseignement </p>


        </div>


        <!--------------------------BOUTON__________________________________________-->
        <div class="buttons1">

            <button class="blob-btn">
                <span class="blob-btn__text"></span>
                <span class="blob-btn__text">


                    <a href="mailto:contact@crechemontessori.com" target="_blank">Nous contacter</a>


                </span>


                <span class="blob-btn__inner">
                    <span class="blob-btn__blobs">
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                    </span>
                </span>
            </button>
        </div>
        <!-- SVG pour l'effet "gooey" -->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10"
                        result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
        </p>
    </section>



    <script src="crecheeco.js">
    </script>
</body>


<!--------------------------FOOTER_________________________________________-->
<!-------------------------FOOTER________________________________________-->
<!-------------------------FOOTER________________________________________-->
<!-- Pied de page -->
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <!-- Adresse -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Adresse</h5>
                <p id="contact">
                    7 Rue de Paris, 75007 Paris, France<br>
                    +33 78 77 67 89<br>
                    contact@exemple.com
                </p>
            </div>

            <!-- Nous trouver (carte Google) -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Nous trouver</h5>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9994092364347!2d2.292292015674305!3d48.858844079287554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66efc6bfa2b67%3A0x40b82c3688c9460!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1637223457894!5m2!1sfr!2sfr"
                    width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <!-- Restez Connecté -->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Rejoindre la communauté babyfarm🐣</h5>
                <br>
                <ul class="list-unstyled">




                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-facebook">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-twitter">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M14.058 3.41c-1.807 .767 -2.995 2.453 -3.056 4.38l-.002 .182l-.243 -.023c-2.392 -.269 -4.498 -1.512 -5.944 -3.531a1 1 0 0 0 -1.685 .092l-.097 .186l-.049 .099c-.719 1.485 -1.19 3.29 -1.017 5.203l.03 .273c.283 2.263 1.5 4.215 3.779 5.679l.173 .107l-.081 .043c-1.315 .663 -2.518 .952 -3.827 .9c-1.056 -.04 -1.446 1.372 -.518 1.878c3.598 1.961 7.461 2.566 10.792 1.6c4.06 -1.18 7.152 -4.223 8.335 -8.433l.127 -.495c.238 -.993 .372 -2.006 .401 -3.024l.003 -.332l.393 -.779l.44 -.862l.214 -.434l.118 -.247c.265 -.565 .456 -1.033 .574 -1.43l.014 -.056l.008 -.018c.22 -.593 -.166 -1.358 -.941 -1.358l-.122 .007a.997 .997 0 0 0 -.231 .057l-.086 .038a7.46 7.46 0 0 1 -.88 .36l-.356 .115l-.271 .08l-.772 .214c-1.336 -1.118 -3.144 -1.254 -5.012 -.554l-.211 .084z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-google">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M20.945 11a9 9 0 1 1 -3.284 -5.997l-2.655 2.392a5.5 5.5 0 1 0 2.119 6.605h-4.125v-3h7.945z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-youtube">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1 -5 5h-12a5 5 0 0 1 -5 -5v-8a5 5 0 0 1 5 -5zm-9 6v6a1 1 0 0 0 1.514 .857l5 -3a1 1 0 0 0 0 -1.714l-5 -3a1 1 0 0 0 -1.514 .857z" />
                    </svg>


                </ul>
            </div>
        </div>
    </div>



    <!-- Copyright -->
    <div class="text-center33">
        © 2024 Votre Entreprise. Tous droits réservés.
    </div>
</footer>



</html>