<?php
  session_start();
  // echo '<div> <h1>Ciao ';
  // echo $_SESSION["username"];
  // echo'!</h1>';
  ?>

<html>


  <head>
    <title>Spotify2</title>
    <link rel="stylesheet" href="spotify.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="spotify.js" defer></script>
    
    <link rel="stylesheet" href="menu.css">
    <script src="menu.js" defer></script>
  </head>
  
  <body>
  <header>
            
            <div id="flex-container">
    
                <div id="menu" class="hidden"><img id="menu" src="img/Menu.png">
                        <div id="container-menu" class="hidden">
    
                            <div id="sub-menu">
                                <a class="sub-item" class="smooth-scroll" href="#scatola-item">COLLEZIONE</a> 
                                <a class="sub-item" class="smooth-scroll" href="#exit">USCITE</a> 
                                <a class="sub-item" class="smooth-scroll" href="#faq">FAQ</a> 
                                <a class="sub-item" class="smooth-scroll" href="#offerta">OFFERTA ABBONAMENTO</a> 
                            </div>
                        </div>
                </div>
    
                <div class="flex-item1"><a href="http://www.rbaitalia.it/"> <img src="img/RBA.png"></a></div>
                <div class="flex-item2"><a> <img src="img/logo.png"></a></div>
                <?php
                    if(isset ($_SESSION['username']))
                    {
                        echo '<div id="account"> <h1>';
                        echo $_SESSION["username"];
                        echo'</h1>';
                    }
                    else echo '<div id="account"> <h1>MY ACCOUNT</h1>';
                            echo '<div id="container-account"  class="hidden">';
    
                                echo '<div id="account-menu">';
                                    if(isset ($_SESSION['username'])){
                                        echo '<a id="log-out" class="account-item" href="index.php">HOME</a>';
                                        echo '<a id="log-out" class="account-item" href="logout.php">LOGOUT</a>';
                                        echo '<a class="account-item" href="ProvaLista.php">CREA LISTA</a>';
                                        echo '<a class="account-item" href="spotify.php">CERCA PLAYLIST</a>';
                                        echo '<a class="account-item" href="open_library_index.php">RICERCA OL</a>';
                                        echo '<a class="account-item" href="OL_salvati.php">LIBRI OL SALVATI</a>';
                                    }
                                    else 
                                    {
                                        echo '<a id="log-out" class="account-item" href="index.php">HOME</a>';
                                        echo '<a class="account-item" href="login.php">LOGIN</a>';
                                        echo '<a class="account-item" href="register.php">REGISTRAZIONE</a>';
                                        echo '<a class="account-item" href="login.php">CREA LISTA</a>';
                                        echo '<a class="account-item" href="login.php">CERCA PLAYLIST</a>';
                                        echo '<a class="account-item" href="login.php">RICERCA OL</a>';
                                        echo '<a class="account-item" href="login.php">LIBRI OL SALVATI</a>';
                                    }
    
                                    
                                    
                                    
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    ?>
            </div>
        </header>
    <div id="overlay" class="hidden">
    </div>
 
    <section id="search">
      <form id="form-playlist">
        <div class="search">
          <label for='search'>Cerca</label>
          <input type='text' name="search" id="search-playlist" class="searchBar">
          <input type="submit" value="Cerca">
        </div>
      </form>

      
    </section>
    <section id="flex-spotify">
        <div class="container">
            <div id="results">
                
            </div>

        </div>
                    <!--CRONOLOGIA -->
                    <div id="flex-cronologia">
                        <div id="sub-flexbox-cronologia">
                            <div id="cronologia-title"><a>CRONOLOGIA</a></div>
                            <div><button id="elimina-tutto">
                                <a id="cestina-cronologia"><img src="img/cestino.jpg"></a>
                            </button>
                            </div>
                        </div>
                        <div id="container-cronologia">
                        </div>
            </div>
    </section>
    
  </body>
  </html>