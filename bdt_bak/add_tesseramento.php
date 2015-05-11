<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Tesseramento utente - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "CALL inserisciTesseramento(".$_POST['Persona'].", ".$_POST['Importo'].", '".
             $_POST['Data']."');";
    if(mysqli_query($conn, $query)) {
        echo "<p>Tesseramento aggiunto </p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_tesseramento_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
