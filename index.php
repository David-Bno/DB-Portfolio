<?php 

  $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
  $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
  $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
  $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

  $errors = array();

  if(!preg_match("/^[A-Za-z .'-]+$/", $name) || strlen($name) > 255){
    $errors['name'] = 'Nom invalide';
  }
  if(!preg_match("/^[A-Za-z0-9 .'-]+$/", $subject) || strlen($subject) > 255){
    $errors['subject'] = 'Sujet invalide';
  }
  if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email) || strlen($email) > 255){
    $errors['email'] = 'Email invalide';
  }
  if(strlen($message) === 0 || strlen($message) > 500){
    $errors['message'] = 'Le message ne peut pas être vide';
  }

  
  if(isset($_POST['submit'])) {
    
    if(!empty($errors)) {
      if(!empty($errors['name'])) {
        echo '<script>';
        echo 'alert("'.$errors['name'].'")';
        echo '</script>';
      } 
      elseif(!empty($errors['subject'])) {
        echo '<script>';
        echo 'alert("'.$errors['subject'].'")';
        echo '</script>';
      } 
      elseif(!empty($errors['email'])) {
        echo '<script>';
        echo 'alert("'.$errors['email'].'")';
        echo '</script>';
      } 
      elseif(!empty($errors['message'])) {
        echo '<script>';
        echo 'alert("'.$errors['message'].'")';
        echo '</script>';
      } 
    }

    if(empty($errors)){
      $to = 'contact@davidbno.fr';
      $sub = "Objet: $subject";
      $body = "Nom: $name\nE-mail: $email\nMessage:\n $message";

      if(mail($to, $sub, $body)){
        echo '<script>';
        echo 'alert("Votre message a bien été envoyé")';
        echo '</script>';
      } else {
        echo '<script>';
        echo 'alert("Une erreur est survenue lors de l\'envoi de votre message")';
        echo '</script>';
      }
    }

  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/tailwind.css">
  <link rel="stylesheet" href="css/style.css">
  <title>David Boccomino</title>
</head>

<body>
  <!-- Navbar -->
  <nav id="nav" class="flex nav items-center justify-between px-6 2xl:px-10 fixed w-screen z-10">
      <div class="mr-auto">
        <a href="#accueil"><h1 class="text-2xl 2xl:text-3xl font-bold">DAVID BOCCOMINO</h1></a>
        <hr class="mt-3">
      </div>

      <ul class="flex justify-around ml-auto flex-wrap nav-ul" id="menu">
        <li class="mx-5 font-light light-gray text-xl 2xl:text-2xl"><a href="#a-propos">A PROPOS</a></li>
        <li class="mx-5 font-light light-gray text-xl 2xl:text-2xl"><a href="#competences">COMPETENCES</a></li>
        <li class="mx-5 font-light light-gray text-xl 2xl:text-2xl"><a href="#parcours">PARCOURS</a></li>
        <li class="mx-5 font-light light-gray text-xl 2xl:text-2xl"><a href="#contact">CONTACT</a></li>
      </ul>

      <button id="btn-menu">&#9776;</button>

      <div id="sidebar-menu">
        <div id="sidebar-header"></div>
        <div id="sidebar-body"></div>
        <div id="sidebar-social"></div>
      </div>
      <div id="menu-overlay"></div>
  </nav>

  <!-- Socials -->
  <nav class="socials flex flex-col items-center fixed left-2 md:left-6 top-80 z-10" id="social">
    <a href="https://www.facebook.com/david.boccomino" target="_blank" class="my-2 image-hover">
      <img src="img/facebook-gray.svg" alt="Logo Facebook gris">
      <img src="img/facebook-blue.svg" alt="Logo Facebook bleu" class="hide">
    </a>
    <a href="https://www.instagram.com/david.bno/" target="_blank" class="my-2 image-hover">
      <img src="img/instagram-gray.svg" alt="Logo Instagram gris">
      <img src="img/instagram-blue.svg" alt="Logo Instagram bleu" class="hide">
    </a>
    <a href="https://twitter.com/davidbno_" target="_blank" class="my-2 image-hover">
      <img src="img/twitter-gray.svg" alt="Logo Twitter gris">
      <img src="img/twitter-blue.svg" alt="Logo Twitter bleu" class="hide">
    </a>
    <a href="https://www.linkedin.com/in/david-boccomino-854079202/" target="_blank" class="my-2 image-hover">
      <img src="img/linkedin-gray.svg" alt="Logo LinkedIn gris">
      <img src="img/linkedin-blue.svg" alt="Logo LinkedIn bleu" class="hide">
    </a>
  </nav>

  <!-- Page 1 / Hello -->
  <div class="page flex justify-center items-center lg:h-screen relative" id="accueil">
    <div class="container p-6 xl:mt-0 sm:p-14 lg:p-16 xl:p-20 2xl:p-14">

      <div class="grid grid-cols-3">
        <div class="intro col-span-3 mx-auto lg:col-span-2 mt-20 md:ml-14 lg:my-auto lg:mx-auto">
          <h2 class="text-4xl sm:text-6xl xl:text-7xl 2xl:text-8xl font-bold my-3">&lt;<span class="light-blue">h1</span>&gt;Hello&lt;/<span class="light-blue">h1</span>&gt;</h2>
          <h3 class="text-2xl sm:text-4xl xl:text-5xl 2xl:text-6xl font-light my-3">Je m'appelle <span class="light-blue">David</span>,</h3>
          <h3 class="text-2xl sm:text-4xl xl:text-5xl 2xl:text-6xl font-light my-3">Développeur front-end.</h3>
        </div>

        <div class="col-span-3 flex justify-center mt-10 lg:mt-0 lg:block lg:col-span-1">
          <div class="cadre flex justify-center items-center">
            <img src="img/photo-cv2.jpg" alt="Photo David Boccomino">
          </div>
        </div>
      </div>

      <div class="absolute hidden sm:block sm:bottom-10 xl:left-24">
        <img src="img/arrow-down.svg" alt="Arrow down" class="arrowDown">
        <p class="scroll-text mt-3">Scroll</p>
      </div>

    </div>
  </div>

  <!-- Page 2 / A propos de moi -->
  <div class="page flex justify-center items-center xl:h-screen relative" id="a-propos">
    <div class="container p-6 sm:p-14 lg:p-16 xl:p-10 2xl:p-14">

      <div class="fake-text top-2 md:top-0 xl:top-8">&lt;a propos de moi /&gt;</div>

      <div class="grid grid-cols-3 mt-24 md:mt-32 xl:mt-0">
        <div class="col-span-3 md:col-span-2 my-auto">
          <p class="text-lg md:text-xl xl:text-2xl my-10">Je suis un développeur Front-End du sud de la France, j'ai 23 ans. Passionné de veille
            technologique et de design, je me suis orienté vers une formation Symfony/Angular. 
            Ma soif de connaissance m'a impliqué par la suite dans l'apprentissage de nombreux 
            autres langages, frameworks et outils.</p>
          <p class="text-lg md:text-xl xl:text-2xl my-10">Curieux et appliqué, j'ai de nombreux centres d'intérêt tels que la guitare et la musique
            en général, les jeux vidéo, la téléphonie, l'horlogerie ou encore la Formule 1.</p>
          <p class="text-lg md:text-xl xl:text-2xl my-10">Mon goût pour les interfaces utilisateurs grandissant, je me spécialise donc
            dans ces dernières.</p>
        </div>

        <div class="col-span-3 md:col-span-1 relative">
          <h2 class="light-blue text-2xl md:text-3xl 2xl:text-4xl font-bold absolute top-0 md:left-24 lg:left-40 xl:left-64">Intuitif</h2>
          <h2 class="light-blue text-3xl md:text-4xl 2xl:text-5xl font-bold absolute top-8 right-10 sm:right-24 sm:top-6 md:top-16 md:left-8">Appliqué</h2>
          <h2 class="light-blue text-4xl md:text-5xl 2xl:text-7xl font-bold absolute top-20 left-14 sm:left-24 sm:top-14 md:top-40 md:left-28 lg:left-48 xl:left-52 2xl:left-72">Créatif</h2>
          <h2 class="light-blue text-2xl md:text-3xl 2xl:text-4xl font-bold absolute top-36 right-16 sm:top-28 sm:right-60 md:top-64 md:left-16">Assidu</h2>
        </div>
      </div>

    </div>
  </div>

  <!-- Page 3 / Compétences -->
  <div class="page flex justify-center items-center xl:h-screen relative" id="competences">
    <div class="container mt-28 sm:mt-20 lg:mt-0 p-6 sm:p-14 lg:p-16 xl:p-20 2xl:p-14">

      <div class="fake-text mt-20 top-50 sm:top-36 sm:right-16 md:top-0 lg:top-0 lg:right-40 xl:top-24 xl:mt-0">&lt;competences /&gt;</div>
      
      <div class="grid grid-cols-2 mt-36 md:mt-60 lg:mt-34 lg:grid-cols-3 xl:mt-0">
        <div class="col-span-3 sm:col-span-1">
          <div class="flex flex-col items-center">
            <div class="blue-circle-comp flex justify-center items-center">
              <img src="img/code.svg" alt="Icone de chevrons de code">
            </div>
            <h2 class="font-bold text-3xl sm:text-4xl md:text-5xl">Langages</h2>

            <ul class="text-lg sm:text-xl md:text-2xl mt-6 ml-3">
              <li>HTML</li>
              <li>CSS</li>
              <li>PHP</li>
              <li>SQL</li>
              <li>JavaScript</li>
            </ul>
          </div>
        </div>

        <div class="col-span-3 mt-10 sm:mt-0 sm:col-span-1">
          <div class="flex flex-col items-center">
            <div class="blue-circle-comp flex justify-center items-center">
              <img src="img/server.svg" alt="Icone de chevrons de code">
            </div>
            <h2 class="font-bold text-3xl sm:text-4xl md:text-5xl">Frameworks</h2>

            <ul class="text-lg sm:text-xl md:text-2xl mt-6">
              <li>Bootstrap</li>
              <li>TailwindCSS</li>
              <li>AngularJS</li>
              <li>Symfony</li>
              <li>PrestaShop</li>
            </ul>
          </div>
        </div>

        <div class="col-span-3 mt-10 lg:mt-0 lg:col-span-1">
          <div class="flex flex-col items-center">
            <div class="blue-circle-comp flex justify-center items-center">
              <img src="img/tools.svg" alt="Icone d'outils">
            </div>
            <h2 class="font-bold text-3xl sm:text-4xl md:text-5xl">Outils</h2>

            <ul class="text-lg sm:text-xl md:text-2xl mt-6 ml-3">
              <li>Visual Studio Code</li>
              <li>FileZilla</li>
              <li>Git</li>
              <li>WAMP</li>
              <li>Adobe Photoshop</li>
              <li>Adobe XD</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="absolute hidden sm:block sm:bottom-10 xl:left-24">
        <img src="img/arrow-down.svg" alt="Arrow down" class="arrowDown">
        <p class="scroll-text mt-3">Scroll</p>
      </div>

    </div>
  </div>

  <!-- Page 4 / Parcours -->
  <div class="page flex justify-center items-center xl:h-screen relative" id="parcours">
    <div class="container p-6 sm:p-14 lg:p-16 xl:p-20 2xl:p-14">

      <div class="fake-text top-20 left-28 sm:top-14 sm:left-64 lg:left-40 xl:top-0 2xl:top-10">&lt;parcours /&gt;</div>
      
      <div class="grid grid-cols-6 mt-40 sm:ml-12 lg:ml-0 xl:mt-40">

        <div class="col-span-6 lg:col-span-3 2xl:col-span-2">

          <div class="flex items-center">
            <div class="blue-circle flex justify-center items-center">
              <img src="img/briefcase.svg" alt="Icone de valise">
            </div>

            <h2 class="font-bold text-2xl xs:text-3xl sm:text-4xl md:text-5xl ml-4">Expériences</h2>
          </div>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">MARS - AVRIL 2021</li>
            <div class="ml-4">
              <li class="uppercase">Stage développeur web</li>
              <li class="light-gray">Desineo GLG SAS, Fréjus</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">NOV 2020</li>
            <div class="ml-4">
              <li class="uppercase">Tireur à quai</li>
              <li class="light-gray">ITM LOGISTIQUE, Brignoles</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">AOUT - OCT 2020</li>
            <div class="ml-4">
              <li class="uppercase">Réceptionnaire</li>
              <li class="light-gray">STAC SUD EST, Fuveau</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">JUILLET 2020</li>
            <div class="ml-4">
              <li class="uppercase">Préparateur de commandes</li>
              <li class="light-gray">LECASUD, Le Luc</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">OCT 2017 - JUIN 2020</li>
            <div class="ml-4">
              <li class="uppercase">Vendeur multimédia</li>
              <li class="light-gray">ESPACE CULTUREL E.LECLERC, Le Luc</li>
            </div>
          </ul>

        </div>

        <div class="col-span-6 mt-8 lg:mt-0 lg:col-span-3 2xl:col-span-2">

          <div class="flex items-center">
            <div class="blue-circle flex justify-center items-center">
              <img src="img/graduation.svg" alt="Icone de graduation">
            </div>

            <h2 class="font-bold text-2xl xs:text-3xl sm:text-4xl md:text-5xl ml-4">Formations</h2>
          </div>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">2020 - 2021</li>
            <div class="ml-4">
              <li class="uppercase">Développeur web Symfony Angular</li>
              <li class="light-gray">MODE83, Draguignan</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">2020</li>
            <div class="ml-4">
              <li class="uppercase">CACES 1A</li>
              <li class="light-gray">AFTRAL, Brignoles</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">2016 - 2017</li>
            <div class="ml-4">
              <li class="uppercase">LEA Anglais Japonais (interrompu)</li>
              <li class="light-gray">AIX MARSEILLE UNIVERSITE, Aix-en-Provence</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">2015</li>
            <div class="ml-4">
              <li class="uppercase">Baccalauréat Professionnel Commerce</li>
              <li class="light-gray">LYCEE RAYNOUARD, Brignoles</li>
            </div>
          </ul>

          <ul class="ml-12 my-3 font-bold">
            <li class="light-blue">2014</li>
            <div class="ml-4">
              <li class="uppercase">Brevet d'études professionnelles</li>
              <li class="light-gray">LYCEE RAYNOUARD, Brignoles</li>
            </div>
          </ul>

        </div>

        <div class="col-span-6 lg:flex lg:items-start 2xl:block 2xl:col-span-2 2xl:ml-12">

          <div class="mt-8 2xl:mt-0">
            <div class="flex items-center">
              <div class="blue-circle flex justify-center items-center">
                <img src="img/language.svg" alt="Icone de langages">
              </div>

              <h2 class="font-bold text-2xl xs:text-3xl sm:text-4xl md:text-5xl ml-4">Langues</h2>
            </div>

            <ul class="ml-12 my-3 font-bold">
              <li class="light-blue uppercase">Anglais</li>
              <div class="ml-4">
                <li class="uppercase">Très bon</li>
              </div>
            </ul>

            <ul class="ml-12 my-3 font-bold">
              <li class="light-blue uppercase">Japonais</li>
              <div class="ml-4">
                <li class="uppercase">Notions</li>
              </div>
            </ul>
          </div>

          <div class="flex items-center mt-8 lg:ml-44 xl:ml-72 2xl:ml-0 2xl:mt-24">
            <div class="blue-circle flex justify-center items-center">
              <img src="img/car-side.svg" alt="Icone de voiture">
            </div>
  
            <h2 class="font-bold text-2xl xs:text-3xl sm:text-4xl md:text-5xl ml-4">Permis B</h2>
          </div>

        </div>

      </div>

    </div>
  </div>

  <!-- Page 5 / Contact -->
  <div class="page flex justify-center items-center xl:h-screen relative" id="contact">
    <div class="container p-6 sm:p-14 lg:p-16 xl:p-20 2xl:p-14">

      <div class="fake-text top-0 right-16 md:right-36 xl:right-40 xl:top-20">&lt;contact /&gt;</div>
      
      <div class="grid grid-cols-2 mt-24 xl:mt-48">
        <div class="col-span-2 xl:col-span-1 my-auto">
          <p class="text-3xl xs:text-5xl md:text-7xl my-10 font-bold">Vous souhaitez <br> me contacter ?</p>
          <hr class="blue-hr">
          
          <div class="flex items-center mt-10">
            <img src="img/envelope.svg" alt="Envelope icone" class="social-img">
            <p class="text-lg xs:text-xl md:text-2xl ml-3"><strong>Email:</strong> contact@davidbno.fr</p>
          </div>

          <div class="flex items-center my-4">
            <img src="img/phone.svg" alt="Phone icone" class="social-img">
            <p class="text-lg xs:text-xl md:text-2xl ml-3"><strong>Téléphone:</strong> 06.69.47.88.70</p>
          </div>
        </div>

        <div class="col-span-2 xl:col-span-1 mt-10">

          <form action="index.php" method="POST">
            <input type="text" placeholder="Nom:*" name="name" required class="w-full p-3 italic my-2">
            <input type="text" placeholder="Sujet:*" name="subject" required class="w-full p-3 italic my-2">
            <input type="email" placeholder="Adresse Email:*" name="email" required class="w-full p-3 italic my-2">
            <textarea placeholder="Votre message" name="message" required class="w-full p-3 italic h-40 my-2"></textarea>
            <div class="flex justify-between xl:block">
              <button type="submit" name="submit" class="button font-bold text-xl my-2">Envoyer</button>
              <a href="#accueil" class="inline-block xl:hidden"><img src="img/arrow-circle-up.svg" alt="Arrow Circle Up" class="arrowUp"></a>
            </div>
          </form>

        </div>
      </div>

      <a href="#accueil" class="hidden xl:inline-block"><img src="img/arrow-circle-up.svg" alt="Arrow Circle Up" class="arrowUp"></a>

    </div>
  </div>

  <hr class="footer-hr">
  <footer class="w-full flex justify-center items-center">
    <h5>&copy; Copyright David Boccomino</h5>
  </footer>


  <script src="js/app.js"></script>
</body>

</html>