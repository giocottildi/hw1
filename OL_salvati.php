<?php
  session_start();
//   echo '<div> <h1>Ciao ';
//   echo $_SESSION["username"];
//   echo'!</h1>';
  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libri Salvati - Open Library</title>
    <link rel="stylesheet" href="OL_salvati.css">
    <script src="open_library.js" defer></script>
    <script src="OL_salvati.js" defer></script>
    <link rel='stylesheet' href='menu.css'>
    <script src='menu.js' defer></script>
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
    <h1>Libri Salvati - Open Library</h1>
    <div class="container" id="saved-results-container"></div>
</body>
</html>
