<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento servizio - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Servizi (Servizio, Categoria) VALUES ('".$_POST['Servizio']."', ".$_POST['Categoria'].");";
    if(mysqli_query($conn, $query)) {
        echo "<p>Servizio aggiunto</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_servizio_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
