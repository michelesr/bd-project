<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Aggiornamento utente - Banca del Tempo</title>
</head>
<body>
    <h1>Banca del Tempo</h1>
    <p>Compilare il modulo per l'aggiornamento informazioni dell'utente:</p>
    <?php 
      include ('connect.php');
      $query1 = "SELECT idIndirizzo, Indirizzo FROM Indirizzi;"; 
      $query2 = "SELECT idZona, Zona FROM Zone;";
      $query3 = "SELECT * FROM Persone WHERE idPersona = ".$_POST['Persona'].";";
      $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
      $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT); 
      $result3 = mysqli_query($conn, $query3, MYSQLI_STORE_RESULT); 
      mysqli_close($conn);
      $obj = mysqli_fetch_object($result3);
    ?>
    <form method="post" action="upd_user.php?id=<?php echo $_POST['Persona']; ?>">
        <label for="Mail">Mail:</label>
        <input required type="email" title="Indirizzo e-mail" name="Mail" value="<?php echo $obj->Mail; ?>"><br>
        <label for="Password" value="<?php echo $obj->Mail; ?>">Password:</label>
        <input required type="text" title="Password dell'utente" name="Password"><br>
        <label for="Nome">Nome:</label>
        <input required type="text" value="<?php echo $obj->Nome; ?>" title="Nome dell'utente" name="Nome"><br>
        <label for="Cognome">Cognome:</label>
        <input required type="text" value="<?php echo $obj->Cognome; ?>" title="Cognome dell'utente" name="Cognome"><br>
        <label for="Telefono">Telefono:</label>
        <input required size="12" pattern="(\+?\d[- .]*){7,13}" value="<?php echo $obj->Telefono; ?>" title="Numero di telefono dell'utente" type="tel" name="Telefono"><br>
        <label for="DataDiNascita">Data di nascita:</label>
        <input required type="date" value="<?php echo $obj->DataDiNascita; ?>" title="Data di nascita" name="DataDiNascita"><br>
        <label for="NumeroCivico">Numero civico:</label>
        <input type="text" size="5" value="<?php echo $obj->NumeroCivico; ?>" title="Numero civico dell'abitazione" name="NumeroCivico"><br>
        <label for="Presentazione">Presentazione:</label>
        <input type="text" value="<?php echo $obj->Presentazione; ?>" title="Messaggio di presentazione dell'utente" name="Presentazione"><br>
        <label>Zona: </label>
        <select name="Zona">
            <?php
              while($obj2 = mysqli_fetch_object($result2)) {
                  $x = ""; 
                  if ($obj->Zona == $obj2->idZona)
                    $x = "selected=\"selected\" ";
                  echo "<option ".$x."value=\"".$obj2->idZona."\">".$obj2->Zona."</option>"; 
              }

            ?>
        </select><br>
        <label>Indirizzo: </label>
        <select name="Indirizzo">
            <?php
              while($obj2 = mysqli_fetch_object($result1)) { 
                  $x = ""; 
                  if ($obj->Indirizzo == $obj2->idIndirizzo)
                    $x = "selected=\"selected\" ";
                  echo "<option ".$x."value=\"".$obj2->idIndirizzo."\">".$obj2->Indirizzo."</option>"; 
              }
            ?>
        </select><br>
        <label>Sesso: </label>
        <input type="radio" name="Sesso" <?php if(!strcmp($obj->Sesso, "M")) echo "checked=\"checked\""; ?> value="M">Maschio
        <input type="radio" name="Sesso" <?php if(!strcmp($obj->Sesso, "F")) echo "checked=\"checked\""; ?> value="F">Femmina<br><br>
        <input type="submit">
    </form>
    </p>Il tuo indrizzo non appare nell'elenco? <a href="add_address_form.php">Inseriscilo</a></p>
    </p>La tua zona non appare nell'elenco? <a href="add_zone_form.php">Inseriscila</a></p>
    <p>Si prega di non registrare zone o indirizzi che non fanno parte dell'ambito di competenza di questa banca del tempo.</p>
</body>
</body>
</html>
