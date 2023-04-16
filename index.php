<?php
include('config.php');

?>
<!DOCTYPE html>
<html>

<head>
<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"cd7cc32f7436aadaa09f22349510de2f","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title> Jeevani Ayurvedics </title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .dialog-flow {
      position: fixed;
      right: 30px;
      bottom: 50px;
      width: 350px;
      max-width: 85vw;
      max-height: 100vh;
    }

    #chat-circle {
      position: fixed;
      bottom: 50px;
      right: 50px;
      background: #5A5EB9;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      color: white;
      /* padding: 28px; */
      cursor: pointer;
      box-shadow: 0px 3px 16px 0px rgb(0 0 0 / 60%), 0 3px 1px -2px rgb(0 0 0 / 20%), 0 1px 5px 0 rgb(0 0 0 / 12%);
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #chat-close {
      position: fixed;
      bottom: 427px;
      right: 50px;
      background: red;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      color: white;
      /* padding: 28px; */
      cursor: pointer;
      box-shadow: 0px 3px 16px 0px rgb(0 0 0 / 60%), 0 3px 1px -2px rgb(0 0 0 / 20%), 0 1px 5px 0 rgb(0 0 0 / 12%);
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>

<body>
  <section class="header">
    <nav>
      <a href="index.html"><img src="images/logo.png"></a>
      <!---->
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <div id="google_element">
<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
                            <script >
                                function loadGoogleTranslate(){
                                   new google.translate.TranslateElement("google_element");
                                }
                            </script>
  </div>
        <ul>
          <li><a href="">HOME</a></li>
          <li><a class="navv-link" href="#about">ABOUT</a></li>

          <li><a class="navv-link" href="vpackages.php">TREATMENTS</a></li>
          <li><a class="navv-link" href="#dept">DEPARTMENTS</a></li>
          <li><a class="navv-link" href="#about">CONTACT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>


    <div class="text-box">
      <h1>WELCOME TO JEEVANI AYURVEDICS</h1>
      <p>Best Solution for Health issuess</p>
      <a href="user-login.php" class="hero-btn">login </a>
  </section>


  <!--Departments-->
  <section id="dept" class="departments">
    <h1>DEPARTMENTS</h1>

    <div class="row">

      <div class="departments-col">
        <h3> Baala chikits(Pediatrics) </h3>
        <p>Bala Chikitsa or Pediatrics refers to the branch of Ayurveda which deals
          with diseases of infancy, childhood and adolescence and their treatment.</p>
      </div>
      <div class="departments-col">
        <h3> Graha chikitsa(Demonology) </h3>
        <p>Graha Chikitsa or Psychiatry refers to the branch which deals of the diagnosis
          and treatments of mental dearrangements. Management of psychiatric diseases comes
          under this speciality.</p>
      </div>
      <div class="departments-col">
        <h3>Urdhvanga Chikitsa(Diseases of head & neck)</h3>
        <p>This branch of Ayurveda deals with the treatment of diseases of the organs above
          the clavicle.It includes the treatment of eyes, ears, nose, throat, mouth,
          teeth and head.</p>
      </div>
    </div>

    <div class="row">
      <div class="departments-col">
        <h3> Kayachikitsa(Internal medicine) </h3>
        <p>Kayachikitsa mainly deals with the diagnosis and treatment of general diseases
          such as Fever, Diabetes, and Liver Diseases etc.
          Ayurvedic diagnosis and treatment are based on the thridosha theory.</p>
      </div>
      <div class="departments-col">
        <h3> Shalya chikitsa(Surgery) </h3>
        <p>Shalya chikitsa is the surgery part of Ayurveda.Which deals with the surgical
          management to remove the foreign bodies like various grasses,wooden pieces etc ..</p>
      </div>
      <div class="departments-col">
        <h3>Shalakya Tantra(ENT and Opthalamology)</h3>
        <p>Shalakyatantra is Ayurveda for ENT & Ophthalmology. It is a branch of Ayurveda
          that deals with diseases affecting the body parts located above the neck.</p>
      </div>
    </div>


    <div class="row">

      <div class="departments-col">
        <h3> Visha chikitsa(Toxicology) </h3>
        <p>Visha Chikitsa or Agada Tantra include the treatment of diseases caused
          by poisons and toxins, such as spoilt food, animal, reptile and insect bites,
          poisonous minerals, metals and unsuitable food combinations . It is equivalent to
          toxicology in modern medicine.</p>
      </div>
      <div class="departments-col">
        <h3> Jara chikitsa(Rejuvenation) </h3>
        <p>Jarachikitsa or Rasayana is a unique therapeutic methodology to delay ageing and
          to minimize the intensity of problems occurring this degenerative phase of one's life.
          Future aging can be reduced before the occurrence of old age. In fact the ideal time
          for treating the geriatric problems is youth.</p>
      </div>
      <div class="departments-col">
        <h3> Vrsha chikitsa(Aphrodisiac therapy) </h3>
        <p>Vajikarana or Vrishya chikitsa is a one of eight major specialty of the Ashtanga
          Ayurveda. This subject is concerned with aphrodisiacs, virility and improving health
          of progeny.</p>
      </div>
    </div>




    </div>
  </section>






  <script>
    var navLinks = document.getElementById("navLinks")

    function showMenu() {
      navLinks.style.right = "0";
    }

    function hideMenu() {
      navLinks.style.right = "-200px";
    }
  </script>
  <!--Footer-->
  <section id="about" class="footer">
    <h3>About us </h3>
    <p>Ayurveda, in Sanskrit, signifies “A Science of life”, this old study of solution and positive Health
      initially Originated in India is still applicable and helpful to cutting edge lives. Not only an arrangement
      of preventive medication, ayurveda accentuates on an invigorating and illuminated way of life an idea that is increasing
      wide acknowledgment in India as well as over the globe.
    </p>
    <p>Online medical consultation has in one way or the other become a boon to the urban populace of the country. Hard pressed for time,
      having to travel long distances to the hospital are some of the reasons that are prompting many to online consultation
      We Jeevani Ayurvedics provides 24/7 availability for consulting doctor through online and get the prescription.</p>

    <div class="icons">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-linkedin"></i>
    </div>
    <p>Designed <i class="fa fa-heart-o"></i> by Abit Mon Rajan</p>
    <div class="dialog-flow" id="dialog_chat" style="display: none;">
      <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/186833d9-6bee-41f9-995e-fb021cb15c7b"></iframe>
    </div>

    <!-- abit -->
    <!-- <div class="dialog-flow" id="dialog_chat" style="display: none;">
      <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/1f7aae78-c9c0-4a9e-9cd2-d57d6ed5c388"></iframe>
    </div> -->
  

  </section>
  <!-- <div id="chat-circle" class="btn btn-raised">
    <div id="chat-overlay"></div>
    <i class="material-icons">Chat</i>
  </div>
  <div id="chat-close" class="btn btn-raised" style="display: none;">
    <div id="chat-overlay"></div>
    <i class="material-icons">X</i>
  </div>
  <script src="assets/js/jquery-3.2.1.min.js"></script> -->

  <!-- <script>
    $("#chat-circle").click(function() {
      $("#dialog_chat").css('display', 'block');
      $("#chat-close").css('display', 'flex');
      $("#chat-circle").css('display', 'none');
    })
    $("#chat-close").click(function() {
      $("#dialog_chat").css('display', 'none');
      $("#chat-close").css('display', 'none');
      $("#chat-circle").css('display', 'flex');
    })

    $(".chat-box-toggle").click(function() {
      $("#chat-circle").toggle('scale');
      $(".chat-box").toggle('scale');
    })
  </script> -->
</body>

</html>