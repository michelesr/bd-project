<html>
<head>
  <title>Rimozione messaggio - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "DELETE FROM Messaggi WHERE idMessaggio = ".$_POST['Messaggio'].";";
    if(mysqli_query($conn, $query)) {
        echo "<p>Messaggio rimosso</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='rm_messaggio_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
