<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento indirizzo - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Indirizzi (Indirizzo) VALUES ('".$_POST['Indirizzo']."');";
    if(mysqli_query($conn, $query)) {
        echo "<p>Indirizzo aggiunto</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_address_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
