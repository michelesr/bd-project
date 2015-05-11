<html>
<head>
  <title>Aggiornamento tesseramenti - Banca del tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Banca del Tempo</h1>
  <h2>Aggiornamento tesseramenti</h2>
  <?php 
    include ('connect.php');
    $query = "SELECT * FROM Tessere";
    $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <form method="post" action="upd_tesseramento_form.php">
    <label for="Tesseramento">Tessera:</label>
    <select name="Tesseramento" >
      <?php
        while($obj = mysqli_fetch_object($result)) 
          echo "<option value=\"".$obj->idTesseramento."\">".$obj->Nome." ".
               $obj->Cognome." --- ".date("d-m-Y", strtotime($obj->Data))." --- ".$obj->Importo." Euro</option>"; 
      ?>
    </select><br>
    <input type="submit">
  </form>
</body>
</html>
