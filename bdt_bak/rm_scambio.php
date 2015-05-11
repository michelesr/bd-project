<html>
<head>
  <title>Rimozione scambio - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "DELETE FROM Scambi WHERE idScambio = ".$_POST['Scambio'].";";
    if(mysqli_query($conn, $query)) {
        echo "<p>Scambio rimosso</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='rm_scambio_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
