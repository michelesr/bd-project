<html>
<head>
  <title>Rimozione messaggio - Banca del tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Banca del Tempo</h1>
  <h2>Rimozione messaggio</h2>
  <?php 
    include ('connect.php');
    $query1 = "SELECT M.idMessaggio, MC.Nome, MC.Cognome, M.Contenuto, M.DataOra ".
              "FROM Messaggi M, MittentiConversazioni MC ".
              "WHERE MC.idConversazione = M.Conversazione;";
    $query2 = "SELECT D.Nome, D.Cognome ".
              "FROM Messaggi M, DestinatariConversazioni D ".
              "WHERE D.idConversazione = M.Conversazione;";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    echo mysqli_error($conn);      
    $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT);
    echo mysqli_error($conn);      
    mysqli_close($conn);
  ?>
  <form method="post" action="rm_messaggio.php">
    <label for="Messaggio">Messaggio:</label>
    <select name="Messaggio" >
      <?php
        while($obj1 = mysqli_fetch_object($result1)) { 
          $obj2 = mysqli_fetch_object($result2);
          echo "<option value=\"".$obj1->idMessaggio."\">".$obj1->Nome." ".$obj1->Cognome.": ".$obj1->Contenuto." --> ".$obj2->Nome." ".$obj2->Cognome." in data ".date("d-m-Y h:m", strtotime($obj1->DataOra))." </option>"; 
        }
      ?>
    </select><br>
    <input type="submit">
  </form>
</body>
</html>
