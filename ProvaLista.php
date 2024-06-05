<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libri = [
        "libro1" => "Il mastino dei Baskerville",
        "libro2" => "Uno studio in Rosso",
        "libro3" => "Il segno dei quattro",
        "libro4" => "Uno scandalo in Boemia",
        "libro5" => "Il carbonchio azzurro"
    ];

    $all_selected = true;
    foreach ($libri as $key => $titolo) {
        if (!isset($_POST[$key])) {
            $all_selected = false;
            break;
        }
    }

    if ($all_selected) {
        foreach ($libri as $key => $titolo) {
            $stato = $_POST[$key];

            // Controlla se esiste già una risposta per questo libro
            $check_sql = "SELECT id FROM libri WHERE user_id = $user_id AND titolo = '$titolo'";
            $result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($result) > 0) {
                // Se esiste già, aggiorna la risposta
                $update_sql = "UPDATE libri SET stato = '$stato' WHERE user_id = $user_id AND titolo = '$titolo'";
                mysqli_query($conn, $update_sql);
            } else {
                // Altrimenti, inserisci una nuova risposta
                $insert_sql = "INSERT INTO libri (titolo, stato, user_id) VALUES ('$titolo', '$stato', $user_id)";
                mysqli_query($conn, $insert_sql);
            }
        }
    } else {
        $error = "E' NECESSARIO SELEZIONARE UN'OPZIONE PER OGNI LIBRO";
    }
}

$query_letti = "SELECT titolo FROM libri WHERE stato = 'letti' AND user_id = $user_id";
$query_non_letti = "SELECT titolo FROM libri WHERE stato = 'non_letti' AND user_id = $user_id";
$query_non_ricordo = "SELECT titolo FROM libri WHERE stato = 'non_ricordo' AND user_id = $user_id";

$libri_letti = mysqli_query($conn, $query_letti);
$libri_non_letti = mysqli_query($conn, $query_non_letti);
$libri_non_ricordo = mysqli_query($conn, $query_non_ricordo);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opzioni Lista</title>
    <link rel="stylesheet" href="lista.css">
    <script src="lista.js" defer></script>
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
    <section id="page-lista">
        <div id="titolo">Compila questo form ed ottieni la tua sherlock-lista!</div>
        <div id="lista-form">
            <div class="lista">
                <form method="post" id="form-liste">
                    <div class="flex-campo">
                        <div class="campi-uscita-titolo"><label>Titolo</label></div>
                        <div class="campi-uscita"><label>Letto</label></div>
                        <div class="campi-uscita"><label>Non letto</label></div>
                        <div class="campi-uscita"><label>Non ricordo</label></div>
                    </div>
                    <br>
                    <div class="uscita-opzioni">
                        <div class="titolo-uscita"><label>Il mastino dei Baskerville </label></div>
                        <input type="radio" name="libro1" value="letti">
                        <input type="radio" name="libro1" value="non_letti">
                        <input type="radio" name="libro1" value="non_ricordo">
                    </div>
                    <br>
                    <div class="uscita-opzioni">
                        <div class="titolo-uscita"><label>Uno studio in Rosso </label></div>
                        <input type="radio" name="libro2" value="letti">
                        <input type="radio" name="libro2" value="non_letti">
                        <input type="radio" name="libro2" value="non_ricordo">
                    </div>
                    <br>
                    <div class="uscita-opzioni">
                        <div class="titolo-uscita"><label>Il segno dei quattro </label></div>
                        <input type="radio" name="libro3" value="letti">
                        <input type="radio" name="libro3" value="non_letti">
                        <input type="radio" name="libro3" value="non_ricordo">
                    </div>
                    <br>
                    <div class="uscita-opzioni">
                        <div class="titolo-uscita"><label>Uno scandalo in Boemia </label></div>
                        <input type="radio" name="libro4" value="letti">
                        <input type="radio" name="libro4" value="non_letti">
                        <input type="radio" name="libro4" value="non_ricordo">
                    </div>
                    <br>
                    <div class="uscita-opzioni">
                        <div class="titolo-uscita"><label>Il carbonchio azzurro </label></div>
                        <input type="radio" name="libro5" value="letti">
                        <input type="radio" name="libro5" value="non_letti">
                        <input type="radio" name="libro5" value="non_ricordo">
                    </div>
                    <br>
                    <input id="submit-lista" type="submit" value="Crea lista">
                </form>
                <?php if ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="tripla-lista">
        <div id="triplo-flex">
            <div id="libri-letti">
                <div class="info-lista"><h1>Libri letti</h1></div>
                <?php if (mysqli_num_rows($libri_letti) > 0): ?>
                    <ul>
                        <?php while($row = mysqli_fetch_assoc($libri_letti)): ?>
                            <li><?php echo $row['titolo']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Nessun libro letto</p>
                <?php endif; ?>
            </div>
            <div id="libri-non-letti">
                <div class="info-lista"><h1>Libri non letti</h1></div>
                <?php if (mysqli_num_rows($libri_non_letti) > 0): ?>
                    <ul>
                        <?php while($row = mysqli_fetch_assoc($libri_non_letti)): ?>
                            <li><?php echo $row['titolo']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Hai letto tutti i libri!</p>
                <?php endif; ?>
            </div>
            <div id="libri-non-ricordo">
                <div class="info-lista"><h1>Libri che non ricordo</h1></div>
                <?php if (mysqli_num_rows($libri_non_ricordo) > 0): ?>
                    <ul>
                        <?php while($row = mysqli_fetch_assoc($libri_non_ricordo)): ?>
                            <li><?php echo $row['titolo']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Hai una memoria eccellente, degna di un detective!</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>
</html>
