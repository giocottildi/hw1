<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>Sherlock Collection</title>
    <link rel="stylesheet" href="index.css">    
    <script src="index.js" defer></script>

 </head>
    <body>
      
    <header>
            
            <div id="flex-container">
    
                <div id="menu"><img id="menu" src="img/Menu.png">
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
        <nav>
            <div id="flex-container2">
                <button class="flex-item"> <a href="#scatola-item">COLLEZIONE</a> </button>
                <button class="flex-item"> <a href="#exit">USCITE</a> </button>
                <button class="flex-item"> <a href="#faq">FAQ</a> </button>
                <button class="flex-item"> <a href="#offerta">OFFERTA<br>ABBONAMENTO</a> </button>
            </div>
        </nav>
        <article>
            <section id="prima_sezione">
                <div class="carrousel">
                    <div class="container">
                    <div id="flex-container">
                        <div class="item-info"> 
                            <h1 class="titolo"> 
                                <strong>
                                    <span>EDIZIONE PER COLLEZIONISTI DEDICATA AL PIÙ ABILE DEI DETECTIVE, SHERLOCK HOLMES</span>    
                                </strong>
                            </h1>
                        </div>
                        <div class="item-box">
                            <p class="offerta_testo">sconti esclusivi</p>
                            <p class="offerta_subtesto">e fantastici regali</p>
                            <button><a href="#offerta">VEDI OFFERTA</a></button>
                        </div>
                    </div>
                </div>
            </section>
            
            <section>
                <div class="barra">       
                    <span>
                        <a>COLLEZIONE</a>
                    </span>
                </div>
                <div id="scatola-item">
                        <div class="testo">
                            <strong>
                                <span>
                                    <h4>La collezione più completa del re dei detective</h4>
                                </span>
                            </strong>
                        </div>                    
                        <div class="subtesto">
                            <br> <br>
                            Sherlock Holmes fa parte di quella famiglia di personaggi che superano la fama del loro stesso creatore diventando dei miti letterari. Fin dalla sua creazione, la popolarità di Sherlock Holmes fu tale che, con Conan Doyle ancora in vita, altri autori contribuirono all’immortalità del personaggio scrivendo un gran numero di romanzi e racconti con il detective come protagonista.
                            <br><br>
                            Questa collezione riunisce per la prima volta tutti i casi che hanno trasformato Sherlock Holmes in un mito a livello mondiale: le avventure e i romanzi scritti da Arthur Conan Doyle, il suo creatore, più una selezione di avventure sul personaggio scritte da altri autori contemporanei a Conan Doyle.
                            <br><br>
                            Un’edizione unica che ci permette di approfondire come non mai la figura del detective più famoso di tutti i tempi.
                            <br><br>
                            <h4>Un’edizione per collezionisti che evoca un’epoca unica</h4>
                            <br><br>
                            Un’esclusiva edizione vintage che riproduce le copertine della rivista <em>The Strand</em>, paradigma dello stile vittoriano dove furono pubblicate la maggior parte delle avventure del popolare detective. Inoltre negli interni, le illustrazioni delle sue prime pubblicazioni.
                        </div>
                        <div class="magazine">
                            <a>
                                <img src="img/libri.jpg">
                                <img src="img/left-arrow.png" id="left-arrow">
                                <img src="img/right-arrow.png" id="right-arrow">
                            </a>
                            </div>
                        <div class="pdf">
                            <a href="documents/sh.pdf">GUIDA ALL'OPERA</a>
                        </div>
                </div>
    
            </section>

<!-- Lascio un api implementata col js nel MHW3 come una sorta di anteprima per l'utente registrato e non -->
            
    <section id="Gutenberg">
        <h1>Libreria Gutenberg</h1>
        <form id="form1">
          Inserisci il genere di un libro
          <select id='topic'> 
            <option value="Crime">Crimine</option>
            <option value="Romance">Romanzo</option>
            <option value="Children">Per bambini</option>
            <option value="Thriller">Thriller</option>
          </select>
          <br>
          Inserisci la lingua del libro
          <select id='language'> 
            <option value="it">Italiano</option>
            <option value="fr">Francese</option>
            <option value="en">Inglese</option>
          </select>
          <input type='submit' id='submit1' value='Cerca'>
        </form>
    
    </section>
    
    <section id="elenco-view">
    </section>
    
    
            <!-- API SVOLTE NEL MHW3
                <section id="library">
                <h1>Consulta la libreria</h1>
                <form id="form2">
                  Seleziona il titolo:
                  <select id='titolo'> 
                    <option value="Mastino dei Baskerville">Mastino dei Baskerville</option>
                    <option value="Uno studio in rosso">Uno studio in rosso</option>
                    <option value="segno dei quattro">Il segno dei quattro</option>
                    <option value="scandalo in Boemia">Uno scandalo in Boemia</option>
                    <option value="carbonchio azzurro">Il carboncino azzurro</option>
                  </select>
                  <input type='submit' id='submit2' value='Cerca'>
                </form>
            </section>
            
                <section id="library-view">
                </section>
    
    <section id="spotify">
    
        <h1>playlist musicali</h1>
        <form id="form3">
          Inserisci il nome di un playlist 
          <select id='playlist'> 
            <option value="Sherlock Holmes">Sherlock Holmes</option>
            <option value="Sherlock ost">Sherlock ost</option>
            <option value="Sherlock opening">Sherlock opening</option>
            <option value="Holmes adventure">Holmes adventure</option>
          </select>
          <input type='submit' id='submit3' value='Cerca'>
        </form>
    
    </section>
    
    <section id="playlist-view">
    </section>
     -->
    
    
            <section>
                <div id="gioco">
                    <img src="img/chibi_sh.png">
                    <h1>Hey ragazzino... Che ne dici di metterti alla prova?</h1>
                    <button data-click="clicked">SFIDAMI!</button>
                </div>
            </section>
    
            
            <section id="exit">
                <div class="barra">
                    <span>
                        <a>USCITE</a>
                    </span>
                </div>
                <div id="flex">
                        <div id="uscite">
                            <h6>USCITA 1 </h6>
                            <h6>USCITA 2 </h6>
                            <h6>USCITA 3 </h6>
                        </div>
                        <div id="titoli">
                            <h7>IL MASTINO DEI BASKERVILLE</h7>
                        <h7>UNO STUDIO IN ROSSO</h7>
                        <h7>IL SEGNO DEI QUATTRO</h7>
                    </div>
                    <div id="immagini">
                        <img src="img/uscita1.png">             
                        <img src="img/uscita2.png">
                        <img src="img/uscita3.png">
                    </div>
                </div>
                
            </section>
    
            <section>
    
                    <div class="linkbar">
                        <span class="uscite">
                            <a>VEDI TUTTE LE USCITE</a>
                        </span>
                        <div id="nascosto" class="hidden">
                            <div id="all_uscite">
                                    <div class="uscita">
                                        <h1><em>1^ uscita</em>: Il mastino dei baskerville</h1>
                                    </div>
                                    <div class="uscita">
                                        <h1><em>2^ uscita</em>: Uno studio in rosso</h1>
                                    </div>
                                    <div class="uscita">
                                        <h1><em>3^ uscita</em>: Il segno dei quattro</h1>
                                    </div>
                                <div class="uscita">
                                    <h1><em>4^ uscita</em>: Uno scandalo in Boemia</h1>
                                </div>
                                <div class="uscita">
                                    <h1><em>5^ uscita</em>: Il carbonchio azzurro</h1>
                                </div>
                            </div>
                        </div>
                        <span id="faq" class="uscite">
                            <a>FAQ - CONDIZIONI PARTICOLARI</a>
                        </span>
                    </div>
                </section>
                <section id="offerta">
                <div class="barra">
                    <span>
                        <a>OFFERTA ABBONAMENTO</a>
                    </span>
                </div>
                <div class ="elenco">
                    <h3> <a>1</a> Scegli da quale numero abbonarti</h3>
                </div>
            </section>
    
            <section class="abbonamenti">
                <div id="container-up">
                    <div class="flex-img"><a><img src="img/libri1.png"></a></div>
                    <div class="flex-img"><a><img src="img/libri2.png"></a></div>
                </div>
                </section>
                <section>
                <div id="container-down">
                    <div class="flex-img"><img src="img/libri3.png"></div>
                    <div class="flex-img"><img src="img/libri4.png"></div>
                </div>
            </section>
            <section>
                <div class="elenco">
                    <h3> <a>2</a> REGALI ESCLUSIVI RISERVATI AGLI ABBONATI <br>
                        <h5>Regali non condizionati all’acquisto ed esenti dalla disciplina delle operazioni a premio. L’Editore si riserva di modificare eventualmente la forma ed il colore dell’oggetto. In caso di esaurimento scorte l’oggetto potrebbe essere sostituito con un regalo di pari valore.</h5>
                    </h3>
                </div>
                <div id="container">
                    <div class="flex-regalo"><img src="img/regalo1.jpg">
                        <h6>CON IL 3° INVIO <br> </h6>
                            <h7>LA PRATICA AGENDA DA VIAGGIO. PERFETTA PER SCRIVERE E ANNOTARE PENSIERI, CON COPERTINA RIGIDA IN TESSUTO NERO, CHIUSURA A ELASTICO E PRATICO SEGNALIBRO</h7>
                    </div>
                    <div class="flex-regalo"><img src="img/regalo2.jpg">
                        <h6>CON IL 6° INVIO <br> </h6>
                        <h7>CINQUE MAGNIFICHE STAMPE IN EDIZIONE LIMITATA DI GRANDE FORMATO CON UNA SELEZIONE DELLE MEMORABILI COPERTINE DELLO STRAND MAGAZINE. 
                            <br>SPLENDIDAMENTE STAMPATE IN CARTA ARENA NATURAL SMOOTH DI 200 GR E PRESENTATE IN UNA ELEGANTE CARTELLA. MISURE: 297X420MM</h7>
                    </div>
                    <div class="flex-regalo"><img src="img/regalo3.jpg">
                        <h6>A PARTIRE DAL 10° INVIO <br> </h6>
                        <h7>RICEVERAI 3 NUMERI DELLA RIVISTA STORICA NATIONAL GEOGRAPHIC</h7>
                    </div>
                </div>
            </section>
            <section>
                <div class="elenco">
                    <h3> <a>3</a> SPESE DI SPEDIZIONE GRATIS SOLO SE TI ABBONI
                        CON CARTA DI CREDITO O PAYPAL
                    </h3>
                </div>
                
                <div class="elenco">                
                    <h3> <a>4</a> Potrai interrompere il tuo abbonamento in qualsiasi momento / Diritto di recesso (D.Lgs. 206/2005)</h3>
                </div>
                <div class="elenco">
                    <h3> <a>5</a> Garanzia di non perdere alcun volume della collezione</h3>                
                </div>
                <div class="elenco">               
                    <h3> <a>6</a> Diritto alla sostituzione. In caso il prodotto ti pervenisse danneggiato, avrai diritto alla sostituzione</h3>
                </div>
            </section>
    
        </article>
        
        <footer id="footer">
            <strong>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="logo">
                                <a href="http://www.rbaitalia.it/">
                                    <img src="img/RBA.png">
                                </a>
                            </p>
                            <p class="link">
                                <a href="http://www.rbaitalia.it/">ITALIA</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex-tastini">
                    <div class="flex-item"> <a>PRIVACY POLICY & COOKIE</a> </div>
                    <div class="flex-item"> <a>LEGALE</a> </div>
                    <div class="flex-item"> <a>GESTISCI I COOKIE</a> </div>
                </div>
            </strong>
                <div class="back-to-the-top">
                    <a href="#"><img src="img/fake-button.png"></a>
                </div>
        </footer>
    

    </body>
</html>
