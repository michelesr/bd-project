<html>
<head>
  <title>Disattivazione Domanda - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include ('connect.php');
    $query1 = "SELECT * From DomandeAttive";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Disattivazione Domanda</h2>
  <form method="post" action="upd_domanda_disattiva.php">
    <label for="Domanda">Domanda:</label>
    <select name="Domanda" >
        <?php
          while($obj = mysqli_fetch_object($result1)) 
              echo "<option value=\"".$obj->idAnnuncio."\">".$obj->Cognome." ".$obj->Nome." --> ".$obj->Servizio."</option>"; 
        ?>
    </select><br>
    <input type="submit">
  </form>
</body>
</html>
