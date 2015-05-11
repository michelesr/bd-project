<html>
<head>
  <title>Tesseramento utente - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include ('connect.php');
    $query1 = "SELECT Importo, Data FROM Tesseramenti WHERE idTesseramento = ".$_POST['Tesseramento'].";";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
    $obj = mysqli_fetch_object($result1);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Tesseramento</h2>
  <form method="post" action="upd_tesseramento.php?id=<?php echo $_POST['Tesseramento']; ?>">
    <label for="Importo">Contribuzione:</label>
    <input required type="number" min="10" value="<?php echo $obj->Importo ;?>" name="Importo"></input>Euro<br>
    <label for="Data">Data tesseramento:</label>
    <input required type="date" name="Data" value="<?php echo $obj->Data; ?>"></input><br>
    <input type="submit">
  </form>
</body>
</html>
