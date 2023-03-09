
 

 <!-- <!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu sur Vino</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
      
      
      /* Set background image */
      .accueil {
        background-image: url('https://via.placeholder.com/800x1200  ');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        font-family: Arial, sans-serif;
      }
      
      /* Set logo styles */
      .logo {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
      }
      
      .logo img {
        max-width: 100%;
      }
      
      /* Set title and description styles */
      .title {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        margin-top: 80px;
      }
      
      .description {
        font-size: 18px;
        color: #fff;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 80px;
      }
      
      /* Set button styles */
      .button {
        display: block;
        width: 200px;
        margin: 0 auto;
        background-color: #fff;
        color: #333;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        margin-bottom: 40px;
      }
      
      .button:hover {
        background-color: #333;
        color: #fff;
        transition: background-color 0.3s ease;
      }
      
      /* Set styles for larger screens */
      @media screen and (min-width: 768px) {
        /* Set background image */
        .accueil {
          background-image: url('https://via.placeholder.com/1600x1200');
          background-size: cover;
        }
        
        /* Set logo styles */
        .logo {
          margin-top: 40px;
          margin-bottom: 40px;
        }
        
        .logo img {
          width: 200px;
          height: 200px;
        }
        
        /* Set title and description styles */
        .title {
          font-size: 48px;
          margin-top: 120px;
          margin-bottom: 40px;
        }
        
        .description {
          font-size: 24px;
          margin-bottom: 80px;
        }
        
        /* Set navigation styles */
        nav {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin: 20px;
        }
        
        nav ul {
          list-style: none;
          display: flex;
        }
        
        nav li {
          margin-right: 20px;
        }
        
        nav a {
          text-decoration: none;
          color: #fff;
          font-size: 18px;
          font-weight: bold;
          text-transform: uppercase;
        }
        
        nav a:hover {
          color: #ccc;
        }
        
        /* Set button styles */
        .button {
          width: auto;
          margin: 0;
          margin-right: 20px;
          margin-bottom: 0;
        }
      }
    </style>
  </head>
  <body class="accueil">
   <div class="accueil">

       <div class="content">
         <h1 class="title">Bienvenu sur notre page principale de projet Vino-AGAK</h1>
         <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis diam sit amet sapien interdum facilisis. Fusce aliquet erat vitae urna eleifend mollis.</p>
         <a class="button" href="#">Learn More</a>
       </div>
   </div> -->
    <!-- <div class="logo">
      <img src="https://via.placeholder.com/200x200" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav> -->
  <!-- </body>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vino</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- isi la section logo/navigation est ajouté seulement pour la vue de la page au complet -->
     <div class="logo">
      <img src="https://via.placeholder.com/200x200" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Liste</a></li>
      </ul>
    </nav>
    <div class="welcome-container">
        <div class="welcome-overlay">
            <h1>Bienvenu chez Vino-AGAK</h1>
            <p>Notre page principale de projet Vino-AGAK</p>
            <button class="welcome-button">Enregistrer</button>
        </div>
    </div>
</body>
</html>



