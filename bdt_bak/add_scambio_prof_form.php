<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento scambio - Banca del Tempo</title>
</head>
<body>
  <?php
    include ('connect.php');
    $query1 = "SELECT * From OfferteAttive WHERE Professionale = true ";
    $query2 = "SELECT * From DomandeAttive WHERE Professionale = true ";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Inserimento scambio</h2>
  <p>Cerchi un livello di competenza amatoriale? Passa agli <a href="add_scambio_form.php">scambi amatoriali</a>
  <form method="post" action="add_scambio.php">
    <label for="Offerta">Offerta:</label>
    <select name="Offerta" >
        <?php
          while($obj = mysqli_fetch_object($result1)) 
              echo "<option value=\"".$obj->idAnnuncio."\">".$obj->Cognome." ".$obj->Nome." --> ".$obj->Servizio."</option>"; 
        ?>
    </select><br>
    <label for="Domanda">Domanda:</label>
    <select name="Domanda" >
        <?php
          while($obj = mysqli_fetch_object($result2)) 
              echo "<option value=\"".$obj->idAnnuncio."\">".$obj->Cognome." ".$obj->Nome." --> ".$obj->Servizio."</option>"; 
        ?>
    </select><br>
    <label for="Importo">Importo in ore:</label>
    <input required type="number" min="0" max="8" value="1" name="Importo"></input><br>
    <label for="Importo">Minuti:</label>
    <input required type="number" min="0" max="30" step="30" name="ImportoMinuti" value="0"></input><br>
    <label for="Data">Data:</label>
    <input required type="date" name="Data"></input><br>
    <label for="FB1">Feedback Professionalita:</label>
    <input type="range" min="1" max="5" step="1" name="FB1"></input><br>
    <label type="range" for="FB2">Feedback Simpatia:</label>
    <input type="range" min="1" max="5" step="1" name="FB2"></input><br>
    <label for="Commenti">Commenti allo scambio:</label>
    <input type="text" size="50" name="Commenti"></input><br> 
    <input type="submit">
  </form>
  <p><?php 
    $e = $_GET['e'];
    if ($e == 1)
      echo "Controllare le ore e i minuti";
    else if($e == 2) 
      echo "Controllare che la data sia relativa al passato."; 
    else if($e == 3)
      echo "Controllare che il servizio sia lo stesso e le persone siano diverse."; 
  ?></p>
</body>
</html>
