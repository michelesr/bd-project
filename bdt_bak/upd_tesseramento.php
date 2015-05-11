<html>
<head>
  <title>Tesseramento utente - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "UPDATE Tesseramenti SET Importo = ".$_POST['Importo'].", Data = '".$_POST['Data']."' WHERE idTesseramento = ".$_GET['id'].";";
    if(mysqli_query($conn, $query)) {
        echo "<p>Tesseramento modificato </p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='update_tesseramento_start.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
