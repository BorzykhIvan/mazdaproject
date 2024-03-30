

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MAZDA</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="header">
    <nav class="navbar">
      <div class="container">
        <div class="navbar__wrap">
          <div class="hamb">
            <div class="hamb__field" id="hamb">
              <span class="bar"></span> <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </div>
          <a href="main.php" class="logo" id="logo"><img src="images/MAZDALOGO1.svg" alt="mazdalogo"></a>
          <ul class="menu" id="menu">
            <li><a href="main.php">Mazda</a></li>
            <li><a href="mazda6gg.php">GG</a></li>
            <li><a href="mazda6gh.php">GH</a></li>
            <li><a href="mazda6gj.php">GJ</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="form.php">Formularz</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <div class="popup" id="popup"></div>
  </header>
  <section class="mainn">

    <div class="container-info">

      <div class="form">

        <form id="newsletterForm" action="formaplikate.php" method="post" enctype="multipart/form-data">
          <fieldset class="contactInfo">
            <h2>Dodaj auto</h2>
            <ul>
              <li>
                <label for="Model">Model</label>
                <input type="number" name="model" id="model" />
              </li>
              <li>
                <label for="nr_rej">NUMER REJESTRACYJNY</label>
                <input type="text" name="nr_rejestracyjny" id="nr_rej" />
              </li>
              <li>
                <label for="rok">ROK PRODUKCJI</label>
                <input type="number" name="rok" id="rok" />
              </li>
              <li>
                <label for="rodzaj">RODZAJ PALIWA</label>
                <select name="rodzaj" id="rodzaj">
                  <option selected="selected">Wybierz Rodzaj</option>
                  <option value="Benzyna">Benzyna</option>
                  <option value="LPG">LPG</option>
                  <option value="Diesel">Diesel</option>
                </select>
              </li>
              <li>
                <label for="typ">TYP NADWOZIA</label>
                <select name="typ" id="typ">
                  <option selected="selected">Wybierz Typ</option>
                  <option value="Sedan">Sedan</option>
                  <option value="Kombi">Kombi</option>
                  <option value="Hatchback">Hatchback</option>
                </select>
              </li>
              <li>
                <label for="file">DODAJ ZDJECIE</label>
                <input type="file" name="car" placeholder="Image" accept="image/png, image/jpg, image/jpeg" required>
              </li>
            </ul>
          </fieldset>
          <div class="forms_buttonss">
            <input type="submit" value="DODAJ AUTO" class="forms_buttonss-action">
          </div>
        </form>


      </div>

    </div>

  </section>
  <section class="table_cars">

    <div class="container-info">
      <div class="tablephp">

      <?php
        $mysql = new mysqli('localhost','root','','mabaza');

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = array_keys($_POST)[0];
        $result = mysqli_query($mysql, "DELETE FROM cars WHERE id = '$id';");
      }
        $mysql->close();
      
?>

    <?php
    $mysql = new mysqli('localhost','root','','mabaza');
    $sql = "SELECT * FROM `cars`";
    if($result = $mysql->query($sql)){
        echo "<table class=\"rwd-table\"><tr><th>ID</th><th>MODEL</th><th>NR_REJESTRACYJNY</th><th>ROK</th><th>RODZAJ</th><th>TYP NADWOZIA</th><th>CAR</th><th>USUN</th>";
        foreach($result as $row){
            echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["nr_rejestracyjny"] . "</td>";
                echo "<td>" . $row["rok"] . "</td>";
                echo "<td>" . $row["rodzaj"] . "</td>";
                echo "<td>" . $row["typ"] . "</td>";
                echo "<td>" . "<img class=\"car_table\" src=\"" . $row["car"] . "\">" . "</td>";
                echo "<td><form action=\"\" method=\"post\" class=\"usun\"> <input class=\"usun\"type=\"submit\" name=\"".$row["id"]."\" value=\"Usun\"></form></td>";
            echo "</tr>";
        }
        echo "</table>";
        $result->free();
    } 
    $mysql->close();
    ?>
    </div>
    </div>

  </section>
  <footer>
    <div class="footer-container">
      <div class="footer-info">
        <a href="#" class="footer-title">
          <img class="logo-img-footer" src="images/MAZDALOGO.svg" alt="logo">
        </a>
        <p class="footer-taglin">Mazda.</p>
        <p class="footer-tagline">FEEL ALIVE</p>
      </div>
      <div class="footer-section-wrapper">
        <div class="footer-section">
          <h2 class="footer-category">INTERESUJE MNIE</h2>
          <nav class="footer-list">
            <ul>
              <li>
                <a href="#" class="footer-link">ASO MAZDA</a>
              </li>
              <li>
                <a href="#" class="footer-link">MYMAZDA</a>
              </li>
              <li>
                <a href="#" class="footer-link">KONTAKT Z MAZDA</a>
              </li>
              <li>
                <a href="#" class="footer-link">GADŻETY MAZDA</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="footer-section">
          <h2 class="footer-category">DOWIEDZ SIĘ WIĘCEJ</h2>
          <nav class="footer-list">
            <ul>
              <li>
                <a href="#" class="footer-link">AKTUALNOŚCI</a>
              </li>
              <li>
                <a href="#" class="footer-link">PROGRAMY LOJALNOŚCIOWE</a>
              </li>
              <li>
                <a href="#" class="footer-link">TPRACA W MAŹDZIE</a>
              </li>
              <li>
                <a href="#" class="footer-link">PORADY</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="footer-section">
          <h2 class="footer-category">PRZYDATNE IMFORMACJE</h2>
          <nav class="footer-list">
            <ul>
              <li>
                <a href="#" class="footer-link">FAQ PYTANIE I ODPOWIEDZI</a>
              </li>
              <li>
                <a href="#" class="footer-link">INSTRUKCJE</a>
              </li>
              <li>
                <a href="#" class="footer-link">MAZDA DLA FIRM</a>
              </li>
              <li>
                <a href="#" class="footer-link">POMOC W AWARII</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="footer-section">
          <h2 class="footer-category">POZOSTAŁE</h2>
          <nav class="footer-list">
            <ul>
              <li>
                <a href="#" class="footer-link">REGULAMIN PORTALU</a>
              </li>
              <li>
                <a href="#" class="footer-link">PLIKI COOKIES</a>
              </li>
              <li>
                <a href="#" class="footer-link">POLITYKA PRYWATNOŚCI</a>
              </li>
              <li>
                <a href="#" class="footer-link">O NAS</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-bottom-container">
        <p class="footer-copyright">© 2022 Mazda.</p>
        <div class="footer-social">
          <a href="#" class="footer-social-icon">
            <svg fill="currentColor" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Facebook</title>
              <path
                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>
          <a href="#" class="footer-social-icon">
            <svg fill="currentColor" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>
          <a href="#" class="footer-social-icon">
            <svg fill="currentColor" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>
          <a href="#" class="footer-social-icon">
            <svg fill="currentColor" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>LinkedIn</title>
              <path
                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <div id="button-up"><img src="images/Group%208.svg" alt="arrow"></div>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="hamburger.js"></script>
  <script src="jquerydown.js"></script>
  <script src="buttonjquery.js"></script>
</body>

</html>