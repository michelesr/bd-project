<html>
<head>
  <title>Rimozione scambio - Banca del tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Banca del Tempo</h1>
  <h2>Rimozione Scambio</h2>
  <?php 
    include ('connect.php');
    $query1 = "SELECT SC.idScambio, SC.Data, P.Nome, P.Cognome, SV.Servizio ".
              "FROM Scambi SC, Persone P, Servizi SV, Annunci A WHERE ".
              "P.idPersona = A.Persona AND A.Servizio = SV.idServizio AND ".
              "SC.Offerta = A.idAnnuncio ORDER BY SC.idScambio;";
              "ORDER BY SC.idScambio;";
    $query2 = "SELECT P.Nome, P.Cognome ".
              "FROM Scambi SC, Persone P, Servizi SV, Annunci A WHERE ".
              "P.idPersona = A.Persona AND A.Servizio = SV.idServizio AND ".
              "SC.Domanda = A.idAnnuncio ORDER BY SC.idScambio;";
              "ORDER BY SC.idScambio;";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <form method="post" action="rm_scambio.php">
    <label for="Scambio">Scambio:</label>
    <select name="Scambio" >
      <?php
        while($obj1 = mysqli_fetch_object($result1)) { 
          $obj2 = mysqli_fetch_object($result2);
          echo "<option value=\"".$obj1->idScambio."\">".$obj1->Nome." ".$obj1->Cognome." --> ".$obj2->Nome." ".$obj2->Cognome.": ".$obj1->Servizio." in data ".date("d-m-Y", strtotime($obj1->Data))." </option>"; 
        }
      ?>
    </select><br>
    <input type="submit">
  </form>
</body>
</html>
