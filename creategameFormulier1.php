<!DOCTYPE html>
<html lang="nl">

<head>
  <meta name="author" content="Anjo Eijweriks" charset="UTF-8">
  <title>gar-menu.php</title>
  <link rel="stylesheet" href="garage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: red;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body STYLE="background-color: #808080">
  <!-- navbar -->
  <header class="p-3 bg-dark text-white">
    <div class="h33">
      <img src="xgames.png" alt="Bedrijf foto" width="100"></h3>
    </div>
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="games.php" class="nav-link px-2 text-white">games</a></li>
          <li><a href="leverancier.php" class="nav-link px-2 text-white">leverancier</a></li>
          <li><a href="console.php" class="nav-link px-2 text-white">console</a></li>
        </ul>
      </div>
    </div>
  </header>
  <main>
    <div class="h33">
      <h1>Dit formulier wordt gebruikt om game gegevens in te voeren. </h1>
    </div>
    <div class="contact-section">
      <h1> </h1>

      <form class="contact-form" action="creategameFormulier2.php" method="post">
        <label>
          <input type="text" id="gamenaamvak" class="contact-form-text" placeholder="gamenaam" name="gamenaamvak"><br />
        </label>
        <label>
          <input type="number" id="gameprijsvak" class="contact-form-text" placeholder="gameprijs"
            name="gameprijsvak"><br />
        </label>
        <label>
          <input type="text" id="gameplatformvak" class="contact-form-text" placeholder="gameplatform"
            name="gameplatformvak"><br />
        </label>
        <input type="submit" class="contatct-form-btn" value="Verstuur">

      </form>
    </div>
  </main>
  <footer>
    <p>Bel nu gratis naar 0800.11.11.216 </p>
  </footer>
</body>

</html>