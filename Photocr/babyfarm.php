<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>babyfarm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="babyfarm.css">
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


<!------------------BOUTON SCROLL-------------->










    <!--------------------------------------------CARROUSEL---------------------------------------------->

    <section id="carouss"></section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
        integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">


    <div id="myCarousel" class="carousel slide" data-interval="false">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <video controls autoplay loop muted class="myvid" id="player" button type="button"
                    class="btn btn-light">Light</button>

                    <source src="3VIDEOng vidéo.mp4" type="video/mp4">
                </video>
            </div>

            <div class="carousel-item">
                <video controls autoplay loop muted class="myvid" id="player2">
                    <source src="VIDEO2vidéo.mp4" type="video/mp4">
                </video>
            </div>

            <div class="carousel-item">
                <video controls autoplay loop muted class="myvid" id="player2">
                    <source src="coloré flat plat illustratif annonce teasing vidéo.mp4" type="video/mp4">

                </video>
            </div>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Vorige</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Volgende</span>
        </a>
    </div>
    </section>
    <section id="milieu">




        <section>








            <!----____________________________________________EN SZAVOIR  PLUS __________________________-->
            <div class="clearfix">
                <img id="babyfarm" src="photo main de bb.jpg" class="col-md-6 float-md-end mb-3 ms-md-3" alt="bb1">

                <p>

                    <!--------------------------BOUTON__________________________________________-->
                <div class="buttonsbb">
                    <a href="http://localhost:8888/monphp/babyfarm/montesso.php"> <button class="blob-btn">
                            <span class="blob-btn__text">En savoir plus sur l'approche Montessori</span>
                            <span class="blob-btn__inner">
                                <span class="blob-btn__blobs">
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                </span>
                            </span>
                        </button></a>
                </div>
                <!-- SVG pour l'effet "gooey" -->
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                            <feColorMatrix in="blur" mode="matrix"
                                values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="goo" />
                            <feBlend in="SourceGraphic" in2="goo" />
                        </filter>
                    </defs>
                </svg>
                </p>


                <!----------------------------------boutonnnn fin------------------>
            </div>
            <br><br><br>


            <!----____________________________________________EN SZAVOIR  PLUS __________________________-->
            <div class="clearfix">
                <img id="babyfarm" src="main bb2.jpg" class="col-md-6 float-md-end mb-3 ms-md-3" alt="bb1">

                <p>

                    <!--------------------------BOUTON__________________________________________-->
                <div class="buttons1">
                    <a href="http://localhost:8888/monphp/babyfarm/crecheeco.php"> <button class="blob-btn">
                            <span class="blob-btn__text"> Notre creche eco responsable</span>
                            <span class="blob-btn__inner">
                                <span class="blob-btn__blobs">
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                </span>
                            </span>
                        </button></a>
                </div>
                <!-- SVG pour l'effet "gooey" -->
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                            <feColorMatrix in="blur" mode="matrix"
                                values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="goo" />
                            <feBlend in="SourceGraphic" in2="goo" />
                        </filter>
                    </defs>
                </svg>
                </p>

                <!----------------------------------boutonnnn fin------------------>
            </div>
            <br><br><br>

            <!----____________________________________________EN SZAVOIR  PLUS __________________________-->
            <div class="clearfix">
                <img id="babyfarm" src="lecture bebe.jpg" class="col-md-6 float-md-end mb-3 ms-md-3" alt="bb1">

                <p>

                    <!--------------------------BOUTON__________________________________________-->
                <div class="buttons1">
                    <a href="http://localhost:8888/monphp/babyfarm/info.php"><button class="blob-btn">
                            <span class="blob-btn__text"> Info pratique :</span>
                            <span class="blob-btn__inner">
                                <span class="blob-btn__blobs">
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                    <span class="blob-btn__blob"></span>
                                </span>
                            </span>
                        </button></a>
                </div>
                <!-- SVG pour l'effet "gooey" -->
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                            <feColorMatrix in="blur" mode="matrix"
                                values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="goo" />
                            <feBlend in="SourceGraphic" in2="goo" />
                        </filter>
                    </defs>
                </svg>
                </p>

                <!----------------------------------boutonnnn fin------------------>
            </div>
            <br><br><br>

        </section>


        <!-------------------------INCREMENTATION DEBUT________________________________________-->
        <br><br><br>
        <section class="stats">
            <div class="stat">
                <div class="number" data-target="235">0</div>
                <p id="incre1">Pains faits maison par an</p>
            </div>
            <div class="stat">
                <div class="number" data-target="250">0</div>
                <p id="incre1">L de peintures écolos</p>
            </div>
            <div class="stat">
                <div class="number" data-target="6">0</div>
                <p id="incre1">Pros passionnées</p>
            </div>
            <div class="stat">
                <div class="number" data-target="110">0</div>
                <p id="incre1">M² de sol tout doux</p>
            </div>
            <div class="stat">
                <div class="number" data-target="50">0</div>
                <p id="incre1">Couches bio par jour</p>
            </div>
            <div class="stat">
                <div class="number" data-target="15">0</div>
                <p id="incre1">Enfants épanouis</p>
            </div>
        </section>
        <br><br><br>
        <!-------------------------INCREMENTATION FINNNN________________________________________-->







        <!-------------------------menu_________________________________________-->
        <!-------------------------menu_________________________________________-->


        <br><br><br>
        <section id="menu">
            <p id="menuenfant">Au menu aujourd'hui: </p> <br><br>
            <!-------------------------menu_________________________________________-->
            <!-------------------------menu_________________________________________-->
            <!-------------------------menu_________________________________________-->

            <div class="main">
                <ul class="cards">
                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image">
                                <span class="note">Menu petit ourson (viande)</span>
                                <img src="Boeuf-aux-oignons-et-nouilles-sautees-aux-legumes-H-2048x1152.jpg"
                                    alt="mixed vegetable salad in a mason jar." />
                                <span class="card_price"><span></span>🐻</span>
                            </div>
                            <div class="card_content">
                                <h2 class="card_title">Boeuf aux oignons et nouilles sautées aux légumes</h2>
                                <div class="card_text">
                                    <p>Ingrédients :

                                        Bœuf tendre, coupé en petits morceaux
                                        Oignons doux, finement hachés
                                        Nouilles (petites et faciles à manger)
                                        Carottes, courgettes et petits pois (légumes tout doux)
                                        Sauce soja douce (un petit peu, pour le goût)
                                    </p>
                                    <hr />
                                    <p>Comment c'est cuisiné ? Le bœuf est d'abord cuit avec des oignons doux pour
                                        qu'ils
                                        soient tout tendres. Ensuite, on ajoute des légumes coupés tout petits comme
                                        les
                                        carottes, courgettes et petits pois. Les nouilles sont cuites séparément et
                                        sautées
                                        dans un peu d'huile pour les rendre toutes moelleuses. Tout est mélangé
                                        doucement,
                                        pour que chaque bouchée soit facile à manger, et on y ajoute une petite
                                        touche
                                        de
                                        sauce soja douce pour un goût très léger.

                                        Un plat tout doux, plein de vitamines et de saveurs, spécialement préparé
                                        pour
                                        les
                                        petits gourmands !
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image">
                                <span class="note">Menu petit pêcheur (poisson) </span>
                                <img src="Lasagnes-saumon-epinards-H-2048x1152.jpg"
                                    alt="a Reuben sandwich on wax paper." />
                                <span class="card_price"><span></span>🐟</span>
                            </div>
                            <div class="card_content">
                                <h2 class="card_title">Lasagnes saumon épinards</h2>
                                <div class="card_text">
                                    <p>Ingrédients :

                                        Saumon frais, coupé en morceaux tout petits
                                        Épinards, cuits et bien hachés
                                        Pâtes à lasagne (tendres et faciles à mâcher)
                                        Crème légère pour rendre tout doux
                                        Fromage râpé pour le goût délicieux
                                    </p>
                                    </hr>
                                    <p>Comment c'est cuisiné ? Les morces de saumon sont doucement cuites jusqu'à ce
                                        qu'elles soient bien tendres. On ajoute des épinards tout mous, puis une
                                        crème
                                        légère pour que le tout soit doux et crémeux. Ensuite, on fait des couches
                                        avec
                                        les
                                        pâtes à lasagne. Chaque couche est garnie de saumon et d'épinards, et on met
                                        un
                                        peu
                                        de fromage râpé dessus pour qu'il fonde bien. Le tout est cuit au four
                                        jusqu'à
                                        ce
                                        que ce soit tout chaud et fondant, prêt à être dégusté par nos petits
                                        gourmands
                                        !

                                        Un plat tout doux, riche en oméga 3 et plein de légumes pour des petites
                                        forces
                                        !
                                    </p>

                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image">
                                <span class="note">Menu veggie</span>
                                <img src="Cake-aubergines-tomates-sechees-et-mozzarella-H-2048x1152.jpg"
                                    alt="A side view of a plate of figs and berries." />
                                <span class="card_price"><span></span>🌱</span>
                            </div>
                            <div class="card_content">
                                <h2 class="card_title">Cake aubergines tomates séchées et mozzarella</h2>
                                <div class="card_text">
                                    <p>Ingrédients :

                                        Aubergines, coupées en petits morceaux
                                        Tomates séchées, hachées finement
                                        Mozzarella, fondante et douce
                                        Farine et œufs pour la pâte
                                        Huile d'olive pour la cuisson
                                        Herbes de Provence pour une touche parfumée
                                    </p>
                                    <hr />
                                    <p>CComment c'est cuisiné ? Les aubergines sont d'abord tendrement cuites à la
                                        poêle,
                                        puis mélangées avec de délicieuses tomates séchées et des morceaux de
                                        mozzarella
                                        qui
                                        fondent à la cuisson. Ensuite, tout ça est intégré dans une pâte à cake
                                        légère,
                                        avec
                                        un peu de farine et des œufs, pour donner une texture moelleuse. On ajoute
                                        un
                                        peu
                                        d'huile d'olive et des herbes de Provence pour parfumer délicatement le
                                        tout.
                                        Une
                                        fois dans le four, le cake cuit doucement et devient tout doré et savoureux
                                        !

                                        Un plat tout doux et fondant, parfait pour éveiller les papilles des petits
                                        avec
                                        des
                                        légumes et du fromage !
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <br><br>


            <button class="blob-btn">
                <span class="blob-btn__text"></span>
                <span class="blob-btn__text">


                    <a href="http://localhost:8888/monphp/babyfarm/chef.php" target="_blank">Decouvrez notre
                        chef</a>


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

        </section>
        <br><br><br>

        <!----____________________________________________fin menu__________________________-->
        <!----___________________________________________tab_________________________-->

        <div id="tab">
            <h1 style="text-align:center;">Info importantes</h1>


            <!-- from here for used code -->
            <div class="products-wrapper">
                <div class="tabs-wrapper">
                    <div class="tab-item">
                        <img src="malade.png" alt="show icon">
                    </div>
                    <div class="tab-item">
                        <img src="appareil-photo.png" alt="rainbow icon">
                    </div>
                    <div class="tab-item">
                        <img src="pluie.png" alt="thunder icon">
                    </div>
                    <div class="tab-item">
                        <img src="anniversaire.png" alt="cloudy icon">
                    </div>
                </div>
                <div class="tabbed-content">
                    <div class="item-content">
                        <div class="highlights">
                            <h4>1 Évaluation des symptômes</h4>
                            <p class="text-columns-block">
                                Si un enfant semble malade, le personnel évalue ses symptômes, comme la température
                                et
                                la fatigue. Cela aide à décider si une prise en charge spécifique est nécessaire</p>
                        </div>
                        <div class="highlights">
                            <h4>2 Isolement temporaire et confort</h4>
                            <p class="text-columns-block">
                                Si l’enfant semble malade, il est temporairement isolé des autres enfants pour
                                éviter la
                                propagation de tout virus. Le personnel lui apporte des soins et du réconfort, en
                                veillant à ce qu’il se repose dans un espace calme. Des efforts sont faits pour
                                maintenir son bien-être jusqu’à l’arrivée de ses parents.</p>
                        </div>
                        <div class="highlights">
                            <h4>3 Contact des parents
                            </h4>
                            <p class="text-columns-block">
                                Les parents sont rapidement informés de la situation, avec une description précise
                                des
                                symptômes observés. Le personnel fournit également des recommandations, notamment si
                                une
                                consultation médicale est nécessaire. En fonction de l'état de l'enfant, les parents
                                peuvent être invités à venir le récupérer rapidement</p>
                        </div>
                        <div class="highlights">
                            <h4>4 Nettoyage et désinfection</h4>
                            <p class="text-columns-block">
                                Après le départ de l’enfant, les espaces qu'il a utilisés sont nettoyés et
                                désinfectés
                                pour réduire les risques de contagion. Cette précaution aide à maintenir un
                                environnement sain pour tous.</p>
                        </div>
                    </div>










                    <div class="item-content">
                        <div class="highlights">
                            <h4>1 Consentement des parents</h4>
                            <p class="text-columns-block">
                                Avant de prendre des photos des enfants, un consentement écrit des parents est
                                obligatoire. Ce document précise les utilisations possibles des images, comme les
                                affichages internes ou les publications sur le site de la crèche.</p>
                        </div>
                        <div class="highlights">
                            <h4> 2 Utilisation limitée des images</h4>
                            <p class="text-columns-block">
                                Les photos sont principalement destinées à l'usage interne pour partager les
                                activités
                                quotidiennes avec les familles. Les images peuvent être utilisées dans des supports
                                internes ou lors de réunions avec les parents.</p>
                        </div>
                        <div class="highlights">
                            <h4>3 Protection de la vie privée</h4>
                            <p class="text-columns-block">
                                Les photos ne sont jamais partagées sur les réseaux sociaux ou dans des espaces
                                publics
                                sans une autorisation spécifique et explicite des parents. Cela garantit la sécurité
                                et
                                la vie privée des enfants.</p>
                        </div>
                        <div class="highlights">
                            <h4>4 Stockage et accès sécurisé</h4>
                            <p class="text-columns-block">
                                Les photos sont stockées de manière sécurisée, avec un accès restreint au personnel
                                autorisé de la crèche. Les images sont supprimées régulièrement pour éviter tout
                                usage
                                inapproprié et respecter le droit à l'image des enfants.</p>
                        </div>
                    </div>









                    <div class="item-content">
                        <div class="highlights">
                            <h4>1 Activités adaptées</h4>
                            <p class="text-columns-block">
                                En cas de pluie, les activités sont majoritairement organisées en intérieur pour
                                garantir la sécurité des enfants. Des jeux moteurs, lectures et ateliers créatifs
                                sont
                                privilégiés pour les occuper.</p>
                        </div>
                        <div class="highlights">
                            <h4>3 Renforcement de la vigilance</h4>
                            <p class="text-columns-block">Le personnel redouble d'attention pour éviter que les
                                enfants
                                ne se mouillent lors de
                                transitions extérieures. Les entrées et sorties sont organisées pour limiter
                                l'exposition à la pluie.</p>
                        </div>
                        <div class="highlights">
                            <h4>2 Vêtements de rechange</h4>
                            <p class="text-columns-block">
                                Il est conseillé aux parents de prévoir un manteau imperméable, des bottes et une
                                tenue
                                de rechange complète. Cela permet de maintenir les enfants au sec s'ils sont
                                mouillés en
                                allant ou revenant de la crèche.</p>
                        </div>
                        <div class="highlights">
                            <h4>4 Hygiène et confort</h4>
                            <p class="text-columns-block">
                                Les enfants sont changés immédiatement s'ils se mouillent pour éviter tout
                                inconfort. Un
                                espace est dédié aux vêtements mouillés, afin qu’ils soient mis à sécher rapidement.
                            </p>
                        </div>
                    </div>






                    <div class="item-content">
                        <div class="highlights">
                            <h4> 1 Planification et communication</h4>
                            <p class="text-columns-block">Les anniversaires sont célébrés une fois par mois pour
                                tous
                                les enfants nés durant ce
                                mois. Les parents sont informés à l'avance pour qu'ils puissent participer en
                                apportant,
                                si souhaité, une petite contribution comme un gâteau.</p>
                        </div>
                        <div class="highlights">
                            <h4> 2 Sécurité alimentaire</h4>
                            <p class="text-columns-block">

                                Les aliments apportés doivent être adaptés aux enfants et respecter les règles
                                d’allergies de la crèche. Les parents sont encouragés à fournir une liste des
                                ingrédients pour assurer la sécurité de tous.
                            </p>
                        </div>
                        <div class="highlights">
                            <h4>3 Activités festives adaptées</h4>
                            <p class="text-columns-block">
                                Des jeux et activités spécifiques sont organisés pour marquer l'événement, avec des
                                animations adaptées aux âges des enfants. Les éducateurs veillent à ce que chaque
                                enfant
                                se sente inclus et valorisé.
                            </p>
                        </div>
                        <div class="highlights">
                            <h4>4 Souvenirs et photos</h4>
                            <p class="text-columns-block">
                                Des photos des moments forts de la journée sont prises pour partager l’événement
                                avec
                                les familles, sous réserve de leur accord pour le droit à l'image. Chaque enfant
                                repart
                                avec un petit souvenir de la célébration.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
















    </section>
    <!--------------------------NOSVALEURS__________________________________________-->
    <!--------------------------NOSVALEURS__________________________________________-->
    <!--------------------------NOSVALEURS_____________________________________
    <section id="nosvaleurs">____________________________________-->

    </div>
    </section>
    <br><br><br><br> <br> <br> <br><br>
    <!--------------------------journééL__________________________________________-->
    <!-------------------------journée________________________________________-->
    <!-------------------------journée________________________________________-->
    <section id="journée">
        <h1 id="titrejournee">Une journée chez babyfarm🐣</h1>
        <br>
        </hr>
        <p id="textjournee">La routine est primordiale pour structurer le tout-petit, le faire patienter et rythmer
            sa
            journée avec des temps d'activité libres individualisés et des temps plus orchestrés de la vie
            quotidienne
            et de la vie du petit groupe. Elle permet aussi à l’équipe d’avoir une excellente organisation. Les
            enfants
            sont libres dans leur choix de particper ou non aux ateliers proposés, ou de s'orienter vers les
            activités
            libres. Ils peuvent être également acteur des ateliers par l'observation essentielle à leur
            construction.
            Nous pouvons noter que les horaires sont une base de repère mais nous gardons une souplesse quant au
            rythme
            en fonctuon des besoins des uns et des autres...

        </p>



        <!--------------------------BOUTON__________________________________________-->
        <div class="buttons1">
            <button class="blob-btn">
                <span class="blob-btn__text">En savoir plus</span>
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

        <!----------------------------------boutonnnn fin------------------>
        </div>
        <br><br><br><br> <br> <br> <br><br> <br> <br>



    </section>







    <!--------------------------PERSONEL__________________________________________-->
    <!--------------------------PERSONEL__________________________________________-->
    <!--------------------------PERSONEL__________________________________________-->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <section class="custom-hero-section">

        <div class="buttons22">
            <button class="blob-btn">
                <span class="blob-btn__text">Notre équipe</span>
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

        <div class="custom-card-grid">



            <a class="custom-card" href="#">
                <div class="custom-card__background" style="background-image: url(woman-7175038_1280.jpg)">
                </div>
                <div class="custom-card__content">
                    <p class="custom-card__category">Responsable</p>
                    <h3 class="custom-card__heading">SONIA</h3>

                </div>
            </a>
            <a class="custom-card" href="#">
                <div class="custom-card__background" style="background-image: url(sun-7350734_1280.jpg)">
                </div>
                <div class="custom-card__content">
                    <p class="custom-card__category">Puericultrice</p>
                    <h3 class="custom-card__heading">MURIEL</h3>
                </div>
            </a>
            <a class="custom-card" href="#">
                <div class="custom-card__background" style="background-image: url(woman-657753_1280.jpg)">
                </div>
                <div class="custom-card__content">
                    <p class="custom-card__category">Atsem</p>
                    <h3 class="custom-card__heading">CHARLOTTE</h3>
                </div>
            </a>
            <a class="custom-card" href="#">
                <div class="custom-card__background" style="background-image: url(girl-5775940_1280.jpg)">
                </div>
                <div class="custom-card__content">
                    <p class="custom-card__category">Animatrice</p>
                    <h3 class="custom-card__heading">JAQUELINE</h3>
                </div>
            </a>
        </div>






        <style>
            :root {
                --background-dark: rgb(235, 224, 209);
                --text-light: rgba(255, 255, 255, 0.6);
                --text-lighter: rgba(255, 255, 255, 0.9);
                --spacing-s: 8px;
                --spacing-m: 16px;
                --spacing-l: 24px;
                --spacing-xl: 32px;
                --spacing-xxl: 64px;
                --width-container: 1200px;

            }

            * {
                border: 0;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html {
                height: 100%;

                font-size: 14px;
            }

            body {
                height: 100%;
            }

            .custom-hero-section {
                align-items: flex-start;
                background-image: linear-gradient(15deg, #d6d8cc 0%, #d3d2c9 150%);
                display: flex;

                justify-content: center;
                height: 60%;
            }

            .custom-card-grid {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                grid-column-gap: var(--spacing-l);
                grid-row-gap: var(--spacing-l);
                max-width: var(--width-container);
                width: 100%;
            }

            @media(min-width: 540px) {
                .custom-card-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media(min-width: 960px) {
                .custom-card-grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            .custom-card {
                list-style: none;
                position: relative;
            }

            .custom-card:before {
                content: '';
                display: block;
                padding-bottom: 150%;
                width: 100%;
            }

            .custom-card__background {
                background-size: cover;
                background-position: center;
                border-radius: var(--spacing-l);
                bottom: 0;
                filter: brightness(0.75) saturate(1.2) contrast(0.85);
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                transform-origin: center;
                transform: scale(1) translateZ(0);
                transition:
                    filter 200ms linear,
                    transform 200ms linear;
            }

            .custom-card:hover .custom-card__background {
                transform: scale(1.05) translateZ(0);
            }

            .custom-card-grid:hover>.custom-card:not(:hover) .custom-card__background {
                filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
            }

            .custom-card__content {
                left: 0;
                padding: var(--spacing-l);
                position: absolute;
                top: 0;
            }
        </style>
    </section>
    <br><br><br>
    <!--------------------------FIN  PERSONEL__________________________________________-->
    <!--------------------------FIN  PERSONEL__________________________________________-->
    <!--------------------------FIN   PERSONEL__________________________________________-->







    <br><br><br> <br><br><br>





    <br> <br> <br>

    <!--------------------------AIDES__________________________________________-->
    <!-------------------------AIDES________________________________________-->
    <!-------------------------AIDES________________________________________-->
    <section id="aides">
        <h1 id="titrejournee">Tarifs et préstations 🐥</h1>
        <h2 id="aidess">Définir mes besoins de garde</h2>
        <br>
        </hr>
        <p id="textjournee">Crèches privées ne signifient pas forcément hors de prix ! Le coût d’une place chez Mini
            Montessori après les différentes aides, varie en fonction du nombre de jours de garde, du montant de
            l’aide
            de la CAF et du crédit d’impôts accordé.

        </p>



        <!--------------------------BOUTON__________________________________________-->
        <div class="buttons1">
            <button class="blob-btn">
                <span class="blob-btn__text">En savoir plus</span>
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

        <!----------------------------------boutonnnn fin------------------>
        </div>
        <h2 id="aidess">Connaître les aides publiques</h2>
        <br>
        </hr>
        <p id="textjournee">
            Vous pouvez bénéficier, sous certaines conditions, du complément de libre choix du mode de garde (CMG)
            de la
            Paje pour la garde de votre enfant de moins de 6 ans. Vous pouvez obtenir par ailleurs une déduction
            fiscale
            sous forme d’un crédit d’impôt de 50 % du montant des frais de garde.

        </p>



        <!--------------------------BOUTON__________________________________________-->
        <div class="buttons1">
            <button class="blob-btn">
                <span class="blob-btn__text">


                    <a href="https://www.impots.gouv.fr/particulier/deductions-liees-la-famille" target="_blank">Crédit
                        d'impot</a>


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

        <!----------------------------------boutonnnn fin------------------>



        <h2 id="aidess">ESTIMER MON BUDGET</h2>
        <br>
        </hr>
        <p id="textjournee">Les tarifs varient entre 8€ et 10€ de l’heure sans les réductions, de 0,8 à 4,7 euros
            avec
            les réductions. Nos tarifs incluent les repas (déjeuner et goûter bio ou labelisé), les couches
            écologiques,
            les produits d’hygiène, les ateliers hebdomadaires et les sorties.
        </p>



        <!--------------------------BOUTON__________________________________________-->
        <div class="buttons1">
            <button class="blob-btn">
                <span class="blob-btn__text">En savoir plus</span>
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

        <!----------------------------------boutonnnn fin------------------>



        <!--------------------------GOUT__________________________________________-->
        <!--------------------------GOUT_________________________________________-->
        <!-----------------------GOUT_________________________________________-->




        <br><br>

        <section id="contactus">
            <p6 id="besoin">Besoin de plus de renseignement </p6>


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



        <script src="babyfarm.js">
        </script>












<div class="notification-card">
    <div class="notification-card-header">
        <h3 class="notification-card-title">Nouvelle notification</h3>
        <i class="fa fa-times notification-card-close"></i>
    </div>
    <div class="notification-card-container">
        <div class="notification-card-media">
            <img src="woman-7175038_1280.jpg" alt="" class="notification-card-user-avatar">
           
        </div>
        <div class="notification-card-content">
            <p class="notification-card-text">
                <strong>SONIA</strong>, <strong>Bienvenu</strong> sur notre site babyfarm!
            </p>
            <span class="notification-card-timer">Il y a 1j</span>
        </div>
       
    </div>
</div>

<style>
/* Style global */



.notification-card-close::before {
    content: "×";
    color: #000;
    font-size: 16px;
    font-weight: bold;
}



body {
    background-color: #F0F2F5;
    font-family: "Arial", sans-serif;
}
strong {
    font-weight: 600;
}
.notification-card {
    width: 360px;
    padding: 15px;
    background-color: white;
    border-radius: 16px;
    position: fixed;
    bottom: 15px;
    left: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(200%);
    animation: noti-card 2s forwards ease-in;
}
.notification-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}
.notification-card-title {
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
}
.notification-card-close {
    cursor: pointer;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F0F2F5;
    font-size: 14px;
    transition: background-color 0.3s;
}
.notification-card-close:hover {
    background-color: #d9d9d9;
}
.notification-card-container {
    display: flex;
    align-items: flex-start;
}
.notification-card-user-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}
.notification-card-reaction {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: white;
    background-image: linear-gradient(45deg, #0070E1, #14ABFE);
    font-size: 14px;
    position: absolute;
    bottom: 0;
    right: 0;
}
.notification-card-content {
    width: calc(100% - 60px);
    padding-left: 20px;
    line-height: 1.2;
}
.notification-card-text {
    margin-bottom: 5px;
    font-family: "Playwrite GB S", cursive;
}
.notification-card-timer {
    color: #1876F2;
    font-weight: 600;
    font-size: 14px;
}
.notification-card-status {
    position: absolute;
    right: 15px;
    top: 50%;
    width: 15px;
    height: 15px;
    background-color: #1876F2;
    border-radius: 50%;
}
@keyframes noti-card {
    50% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(0);
    }
}
</style>

<script>
    // Afficher la notification immédiatement
    const notification = document.querySelector(".notification-card");
    notification.style.transform = "translateY(0)";
    notification.style.opacity = "1";

    // Bouton de fermeture
    const closeButton = document.querySelector(".notification-card-close");
    closeButton.addEventListener("click", () => {
        notification.style.transform = "translateY(200%)";
        notification.style.opacity = "0";
    });

    // Cacher la notification après 40 secondes
    setTimeout(() => {
        notification.style.transform = "translateY(200%)";
        notification.style.opacity = "0";
    }, 40000); // 40 000 ms = 40 secondes
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