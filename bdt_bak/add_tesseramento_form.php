<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Tesseramento utente - Banca del Tempo</title>
</head>
<body>
  <?php
    include ('connect.php');
    $query1 = "SELECT idPersona, Nome, Cognome FROM Persone";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Tesseramento</h2>
  <form method="post" action="add_tesseramento.php">
    <label for="Persona">Utente:</label>
    <select name="Persona" >
        <?php
          while($obj = mysqli_fetch_object($result1)) 
              echo "<option value=\"".$obj->idPersona."\">".$obj->Nome." ".$obj->Cognome."</option>"; 
        ?>
    </select><br>
    <label for="Importo">Contribuzione:</label>
    <input required type="number" min="10" value="10" name="Importo"></input>Euro<br>
    <label for="Data">Data tesseramento:</label>
    <input required type="date" name="Data" value="<?php echo date("Y-m-d"); ?>"></input><br>
    <input type="submit">
  </form>
  <p>L'utente non appare nell'elenco? <a href="add_user_form.php">Inseriscilo</a></p>
</body>
</html>
