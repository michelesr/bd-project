<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento domanda - Banca del Tempo</title>
</head>
<body>
  <?php
    include ('connect.php');
    $query1 = "SELECT idPersona, Nome, Cognome FROM Persone";
    $query2 = "SELECT idServizio, Servizio FROM Servizi";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Inserimento domanda</h2>
  <form method="post" action="add_domanda.php">
    <label for="Persona">Utente che richiede il servizio:</label>
    <select name="Persona" >
        <?php
          while($obj = mysqli_fetch_object($result1)) 
              echo "<option value=\"".$obj->idPersona."\">".$obj->Nome." ".$obj->Cognome."</option>"; 
        ?>
    </select><br>
    <label for="Servizio">Servizio richiesto:</label>
    <select name="Servizio" >
        <?php
          while($obj = mysqli_fetch_object($result2)) 
              echo "<option value=\"".$obj->idServizio."\">".$obj->Servizio."</option>"; 
        ?>
    </select><br>
    <label for="Professionale">Livello:</label>
    <input type="radio" name="Professionale" checked="checked" value="false">Amatoriale
    <input type="radio" name="Professionale" value="true">Professionale<br><br>
    <input type="submit">
  </form>
</body>
</html>
