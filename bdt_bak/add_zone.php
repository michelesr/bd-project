<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento zona - Banca del tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Zone (Zona) VALUES ('".$_POST['Zona']."');";
    if(mysqli_query($conn, $query)) {
        echo "<p>Zona aggiunta</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_zone_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>

