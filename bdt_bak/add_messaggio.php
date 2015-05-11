<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento messaggio - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Messaggi (Conversazione, Contenuto, DataOra) VALUES (".$_POST['Conversazione'].", '".$_POST['Messaggio']."', '".
             date("Y-m-d h:m:s")."');";
    if(mysqli_query($conn, $query)) {
        echo "<p>Messaggio aggiunto </p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_messaggio_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
