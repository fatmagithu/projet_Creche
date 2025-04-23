<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulles d'Eveil </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="PcrecheAcceuil1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">
   
</head>
<body>
<header id="nav">
  <nav class="navbar navbar-expand-lg navbar-light ultra-navbar">
    <!-- Logo & Brand Name -->
    <a class="navbar-brand d-flex align-items-center" href="PCrecheAcceuil1.php" target="_blank">
      <img src="NOUNOU (7).png" width="68" height="88" alt="Logo" class="mr-2 logo-navbar" />
     
    </a>

    <!-- Burger Icon -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto nav-items-wrapper">
        <li class="nav-item"><a class="nav-link" href="#">Nos micro-crèches</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Notre équipe</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Rejoignez-nous</a></li>
        <li class="nav-item"><a class="nav-link" href="PcrecheForm1.php">Inscription</a></li>

        <li class="nav-item"><a class="nav-link" href="pcrecheLOGIN.php">Connexion</a></li>

        <li class="nav-item">
          <a class="nav-link btn-contact" href="#">Nous contacter</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<style>
/* Design niveau branding pro pour navbar */
.ultra-navbar {
  background-color: #fcf8f4; /* beige élégant */
  padding: 0.4rem 1rem;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.02);
  border-radius: 0 0 16px 16px;
  font-family: "Playwrite GB S", cursive;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo-navbar {
  transition: transform 0.3s ease;

  width: 40px;
  height: 60px;
}

.logo-navbar:hover {
  transform: scale(1.08);
}

.brand-name {
  font-size: 1.3rem;
  font-weight: bold;
  color: #2c7a4b;
  letter-spacing: 1px;
  text-shadow: 0.5px 0.5px #ccc;
  text-transform: lowercase;
}

.navbar-nav .nav-link {
  color: #5c4a38;
  margin: 0 0.3rem;
  font-size: 0.75rem;
  font-weight: 400;
  position: relative;
  transition: all 0.3s ease;
}

.navbar-nav .nav-link::before {
  content: "";
  position: absolute;
  width: 0%;
  height: 2px;
  bottom: -4px;
  left: 0;
  background-color: #3b925f;
  transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover {
  color: #3b925f;
}

.navbar-nav .nav-link:hover::before {
  width: 100%;
}

.btn-contact {
  background-color: #d0f0e3;
  color: #1e5537 !important;
  padding: 5px 14px;
  border-radius: 32px;
  font-weight: 600;
  font-size: 0.8rem;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.btn-contact:hover {
  background-color: #a8dec5;
  transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
  .brand-name {
    font-size: 1.2rem;
  }
  .navbar-nav .nav-link {
    margin: 0.3rem 0;
    text-align: center;
    font-size: 0.85rem;
  }
  .ultra-navbar {
    padding: 0.5rem 0.8rem;
  }
}
</style>


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
                    <source src="colorévidéoBB.mp4" type="video/mp4">

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






<!----------------NOTRE HISTOIRE __--------->

<!----------------NOTRE HISTOIRE __--------->


<!----------------NOTRE HISTOIRE __--------->





<div class="clearfix">
 
    <h2 style="font-family: 'Playwrite GB S', cursive; color: #a78d6e;">Notre Histoire</h2>
    <br>
    <p style="font-size: 1rem; font-family: 'Playwrite GB S', cursive; color: #333;">
        Bulles d’éveil a été fondé par une éducatrice de jeunes enfants, Madame Oulhaci remplie d’une farouche volonté de réfléchir à l’accueil des jeunes enfants autrement. En 2012, elle a lancé notre première micro-crèche sur le territoire des Yvelines, plus précisément à Buchelay. C’était un vrai défi à l’époque mais l’envie de créer des lieux où la parole de l’enfant est entendue nous a donné des ailes. 
        <br><br>
        À ce jour, Bulles d’Eveil, c’est un réseau de 7 micro-crèches, avec plus d’une trentaine de salariées. Depuis notre création, ce sont des centaines de familles qui nous ont fait confiance pour l’accueil et le développement de leurs enfants.
        <br><br>
        Plus qu’un mode de garde, Madame Oulhaci souhaite que chaque structure porte des valeurs fortes basées sur le respect de la parole de l’autre, de son identité unique et le développement de la confiance en soi qui en découle. 
        <br><br>
        Nous croyons au potentiel de chaque enfant qui rejoint nos structures et nous mettons tout en œuvre pour que chacun d’entre eux puisse se dire que sa parole compte : <strong>Pour que l’enfant d’aujourd’hui soit l’adulte serein et confiant de demain.</strong>
    </p>

    <div class="buttonsbb">
        <a href="">
            <button class="blob-btn">
                <span class="blob-btn__text">Nous contacter</span>
                <span class="blob-btn__inner">
                    <span class="blob-btn__blobs">
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                    </span>
                </span>
            </button>
        </a>
    </div>

    <!-- SVG pour effet gooey -->
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
</div>

</div>
<br><br><br>


<!----------------NOTRE HISTOIRE finnnnnnn __--------->

<!----------------NOTRE HISTOIRE finnnn __--------->


<!----------------NOTRE HISTOIRE finnnn__--------->










<!----------------NOs  valeurs debut  __--------->

<!----------------Nos valeurs debut __--------->


<!----------------Nos valeurs debut  __--------->





<div class="clearfix bg-valeurss">
    <div class="overlay"></div>

    <div class="texte-clef texte-sur-fond">
        <h2 class="titre-clef">Nos Valeurs</h2>
        <p id="txtNosValeurs">
            Bienveillance et empathie sont les maîtres mots de nos équipes. Afin que nos valeurs prennent vie au quotidien dans nos structures, nous mettons en place un programme d’accompagnement spécifique des équipes : formation régulière, réunion d’équipe, projets pédagogiques et éducatifs…<br><br>
            Les professionnelles sont entourées par des techniciennes (coordinatrice départementale) spécialistes de la Petite Enfance permettant d’apporter un dynamisme dans les projets, les festivités et différentes manifestations. De nombreux projets sont portés (signes associés à la parole, éveil à l’anglais…) et surtout partagés avec les familles qui sont régulièrement invitées.<br><br>
            Bulles d’Eveil a dans son ADN une profonde envie de créer un cadre agréable, sécuritaire et éveillé auprès de tous nos adhérents, parents et enfants, salariés, collectivités et partenaires.
        </p>

        <div class="buttons1">
            <a href="http://localhost:8888/monphp/babyfarm/info.php">
                <button class="blob-btn">
                    <span class="blob-btn__text">Inscription
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
            </a>
        </div>
    </div>
</div>
<style>
/* SECTION AVEC FOND PHOTO + TEXTE LISIBLE */
.bg-valeurss {
    position: relative;
    background-image: url('lecture bebe.jpg');
    background-size: cover;
    background-position: center;
    border-radius: 16px;
    overflow: hidden;
    padding: 60px 10%;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 500px;
    font-family: "Playwrite GB S", cursive;


}

/* Overlay pour obscurcir un peu le fond */
.bg-valeurss .overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.4); /* Opacité de 40% */
    z-index: 1;
    font-family: "Playwrite GB S", cursive;

}

/* Texte par-dessus */
.texte-sur-fond {
    position: relative;
    z-index: 2;
    color: #e6e2da; /* Beige doux */
    text-align: left;
    max-width: 900px;
    font-size: 1.1rem;
    line-height: 1.8;
    font-family: "Playwrite GB S", cursive;


}

#txtNosValeurs {
    color: #e6e2da;
    font-family: "Playwrite GB S", cursive;

}

.texte-sur-fond strong {
    color: #fff5da;
    font-family: "Playwrite GB S", cursive;

}

.texte-sur-fond .titre-clef {
    font-size: 2.2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #e6e2da; /* Même beige pour le titre */
    font-family: "Playwrite GB S", cursive;

}
</style>




<!----------------NOs  valeurs fin  __--------->

<!----------------Nos valeurs fin __--------->


<!----------------Nos valeurs fin  __--------->











        </section>


        <!-------------------------INCREMENTATION DEBUT chiffres sur la creche tableau ________________________________________-->
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





        <!----___________________________________________tab information berceaux ENTREPRISES _________________________-->

        <div id="tab">
            <h1 style="text-align:center;">Berceaux Entreprises</h1>


            <!-- from here for used code -->
            <div class="products-wrapper">
                <div class="tabs-wrapper">
                    <div class="tab-item">
                        <img src="poignee-de-main.png" alt="show icon">
                    </div>
                    
                    <div class="tab-item">
                        <img src="student-housing_6535512.png" alt="rainbow icon">
                    </div>
                    <div class="tab-item">
                        <img src="Montre1.png" alt="thunder icon">
                    </div>
                    <div class="tab-item">
                        <img src="femme.png" alt="cloudy icon">
                    </div>
                </div>
                <div class="tabbed-content">
                    <div class="item-content">
                        <div class="highlights">
                            <h4></h4>
                            <p class="text-columns-block">
                            La micro-crèche dans laquelle vous avez fait une demande de réservation fait peut-être partie d’un réseau de micro-crèches d’entreprise partenaire.</p>
                        </div>
                        <div class="highlights">
                        
                            <p class="text-columns-block">
                            Dans le cadre de leurs engagements RSE (Responsabilité Sociale des Entreprises) et QVT (Qualité de Vie au Travail), les employeurs sont de plus en plus intéressés par la réservation de places en micro-crèches pour leurs salariés, levier de performance et de fidélisation..</p>
                        </div>
                    
                    </div>










                    <div class="item-content">
                        <div class="highlights">
                            
                            <p class="text-columns-block">
                                TPE et grands groupes nous font confinace depuis 8 ans </p>
                        </div>
                      
                    </div>









                    <div class="item-content">
                        <div class="highlights">
                       
                            <p class="text-columns-block">
                                Amplitudes horaires larges pour répondre aux attentes des entreprises.</p>
                        </div>
                       
                    </div>






                    <div class="item-content">
                        <div class="highlights">
                 
                            <p class="text-columns-block">Un interlocuteur privilégié pour la gestion de vos contrat.</p>
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>


<!----___________________________________________tab information berceaux ENTREPRISES FINNNN_________________________-->














    </section>
  
    </div>
    </section>
    <br><br><br><br> <br> <br> <br><br>


  <!--------------------------NOTRE RPOGRAMME _________________________________________-->
    <!--------------------------NOTRE RPOGRAMME _________________________________________-->
  <!--------------------------NOTRE RPOGRAMME _________________________________________
_______________________-->



    <section id="journee-babyfarm">
  <h1 class="titre-programme">Notre Programme</h1>

  <div class="programme-grid-2x2">
    <div class="programme-item">
      <img src="arts.png" alt="Art" class="icon-prog" />
      <h3 class="prog-title">Expérience<br>Artistique</h3>
      <p id="txtJournee">
        Modelage, peinture, collage, pointillisme... Les enfants auront un grand choix d’expériences artistiques variées en troquant pinceaux contre leurs doigts, éponges, peignes, plumes ...
      </p>
    </div>

    <div class="programme-item">
      <img src="homme.png" alt="Mouvement" class="icon-prog" />
      <h3 class="prog-title">L’art en<br>Mouvement</h3>
      <p id="txtJournee">
        L’enfant bouge pour jouer, pour grandir, pour montrer qu’il est là, pour découvrir et maîtriser son corps, pour rencontrer le monde extérieur, pour affirmer sa personnalité, pour rencontrer les autres…
      </p>
    </div>

    <div class="programme-item">
      <img src="muffin.png" alt="Gourmand" class="icon-prog" />
      <h3 class="prog-title">L’instant<br>Gourmand</h3>
      <p id="txtJournee">
        L’instant gourmand : concours « top chef des pâtisseries ». À Noël, conception d’une maison en pain d’épices. Les crêpes seront à l’honneur le jour de la Chandeleur. Chaque semaine est également rythmée par la découverte de nouvelles recettes : pizza, pain, cake…
      </p>
    </div>

    <div class="programme-item">
      <img src="terminer.png" alt="Clip" class="icon-prog" />
      <h3 class="prog-title">Clip de Fin</h3>
      <p id="txtJournee">
        Ce dernier trimestre sera l’occasion de se replonger dans les souvenirs de l’année à travers les photos, vidéo, et meilleurs moments de l’année.
      </p>
    </div>
  </div>
</section>

<style>
/* SECTION PRINCIPALE */
#journee-babyfarm {
  padding: 60px 5%;
  background-color: #fefcf9;
}

/* TITRE PRINCIPAL */
.titre-programme {
  text-align: center;
  font-size: 3rem;

  font-family: "Playwrite GB S", cursive;
  margin-bottom: 60px;
}

/* GRILLE 2X2 */
.programme-grid-2x2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 60px 80px;
  justify-items: center;
  align-items: start;
}

/* CHAQUE BLOC */
.programme-item {
  text-align: center;
  font-family: "Playwrite GB S", cursive;
  
  max-width: 400px;
}

/* ICONES */
.icon-prog {
  width: 60px;
  height: auto;
  margin-bottom: 20px;
}

/* TITRE DE CHAQUE PARTIE */
.prog-title {
  
  font-size: 1.6rem;
  margin-bottom: 15px;
  font-weight: bold;
  font-family: "Playwrite GB S", cursive;
}

/* TEXTE DES PARAGRAPHES */
#txtJournee {
  font-family: "Playwrite GB S", cursive !important;
  font-size: 1.1rem;
  line-height: 1.8;
  
  text-align: justify;
  padding: 0 10px;
}

/* RESPONSIVE POUR MOBILE */
@media (max-width: 768px) {
  .programme-grid-2x2 {
    grid-template-columns: 1fr;
  }
}
</style>
  <!--------------------------NOTRE RPOGRAMME FINNN _________________________________________-->
    <!--------------------------NOTRE RPOGRAMME FINNN_________________________________________-->
  <!--------------------------NOTRE RPOGRAMME FINN ________________________________________
_______________________-->





    <!--------------------------PERSONEL CARD DEBUT__________________________________________-->
    <!--------------------------PERSONEL CARD  DEBUT__________________________________________-->
    <!--------------------------PERSONEL CARD DEBUT __________________________________________-->
<br><br><br><br><br><br><br>
<div class="custom-card-grid-wrapper">
  <div class="custom-card-grid">
    <a class="custom-card" href="#">
      <div class="custom-card__background" style="background-image: url(Sofiya.jpeg)"></div>
      <div class="custom-card__content">
        <p class="custom-card__category">Responsable</p>
        <h3 class="custom-card__heading">SOFIYA</h3>
      </div>
    </a>
    <a class="custom-card" href="#">
      <div class="custom-card__background" style="background-image: url(Grise.png)"></div>
      <div class="custom-card__content">
        <p class="custom-card__category">Puericultrice</p>
        <h3 class="custom-card__heading">MURIEL</h3>
      </div>
    </a>
    <a class="custom-card" href="#">
      <div class="custom-card__background" style="background-image: url(Grise.png)"></div>
      <div class="custom-card__content">
        <p class="custom-card__category">Atsem</p>
        <h3 class="custom-card__heading">CHARLOTTE</h3>
      </div>
    </a>
    <a class="custom-card" href="#">
      <div class="custom-card__background" style="background-image: url(Grise.png)"></div>
      <div class="custom-card__content">
        <p class="custom-card__category">Animatrice</p>
        <h3 class="custom-card__heading">JAQUELINE</h3>
      </div>
    </a>
  </div>
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

html, body {
  height: 100%;
}

.custom-hero-section {
  align-items: flex-start;
  background-image: linear-gradient(15deg, #d6d8cc 0%, #d3d2c9 150%);
  display: flex;
  justify-content: center;
  height: 60%;
}

.custom-card-grid-wrapper {
  display: flex;
  justify-content: center;
  width: 100%;
  padding: 0 1rem;
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

.custom-card-grid:hover > .custom-card:not(:hover) .custom-card__background {
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







    <br><br><br> <br>




      

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










    <!--------------------------NOTIFICATION__________________________________________-->
   

<div class="notification-card">
    <div class="notification-card-header">
        <h3 class="notification-card-title">Nouvelle notification</h3>
        <i class="fa fa-times notification-card-close"></i>
    </div>
    <div class="notification-card-container">
        <div class="notification-card-media">
            <img src="Sofiya.jpeg" alt="" class="notification-card-user-avatar">
           
        </div>
        <div class="notification-card-content">
            <p class="notification-card-text">
                <strong>SOFIYA</strong>, <strong>Bienvenu</strong> sur notre site babyfarm!
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



 <!--------------------------NOTIFICATION FIN__________________________________________-->
   














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
                <h5 class="text-uppercase"></h5>
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