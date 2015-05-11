<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Registrazione utente - Banca del Tempo</title>
</head>
<body>
    <h1>Banca del Tempo</h1>
    <p>Compilare il modulo per la registrazione dell'utente:</p>
    <?php 
      include ('connect.php');
      $query1 = "SELECT idIndirizzo, Indirizzo FROM Indirizzi;"; 
      $query2 = "SELECT idZona, Zona FROM Zone;";
      $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
      $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT); 
      mysqli_close($conn);
    ?>
    <form method="post" action="add_user.php">
        <label for="Mail">Mail:</label>
        <input required type="email" title="Indirizzo e-mail" name="Mail"><br>
        <label for="Password" >Password:</label>
        <input required type="text" title="Password dell'utente" name="Password"><br>
        <label for="Nome">Nome:</label>
        <input required type="text" title="Nome dell'utente" name="Nome"><br>
        <label for="Cognome">Cognome:</label>
        <input required type="text" title="Cognome dell'utente" name="Cognome"><br>
        <label for="Telefono">Telefono:</label>
        <input required size="12" pattern="(\+?\d[- .]*){7,13}" title="Numero di telefono dell'utente" type="tel" name="Telefono"><br>
        <label for="DataDiNascita">Data di nascita:</label>
        <input required type="date" title="Data di nascita" name="DataDiNascita"><br>
        <label for="NumeroCivico">Numero civico:</label>
        <input type="text" size="5" title="Numero civico dell'abitazione" name="NumeroCivico"><br>
        <label for="Presentazione">Presentazione:</label>
        <input type="text" title="Messaggio di presentazione dell'utente" name="Presentazione"><br>
        <label>Zona: </label>
        <select name="Zona" >
            <?php
              while($obj = mysqli_fetch_object($result2)) 
                  echo "<option value=\"".$obj->idZona."\">".$obj->Zona."</option>"; 

            ?>
        </select><br>
        <label>Indirizzo: </label>
        <select name="Indirizzo" >
            <?php
              while($obj = mysqli_fetch_object($result1)) 
                  echo "<option value=\"".$obj->idIndirizzo."\">".$obj->Indirizzo."</option>"; 
            ?>
        </select><br>
        <label>Sesso: </label>
        <input type="radio" name="Sesso" checked="checked" value="M">Maschio
        <input type="radio" name="Sesso" value="F">Femmina<br><br>
        <input type="submit">
    </form>
    </p>Il tuo indrizzo non appare nell'elenco? <a href="add_address_form.php">Inseriscilo</a></p>
    </p>La tua zona non appare nell'elenco? <a href="add_zone_form.php">Inseriscila</a></p>
    <p>Si prega di non registrare zone o indirizzi che non fanno parte dell'ambito di competenza di questa banca del tempo.</p>
</body>
</body>
</html>
