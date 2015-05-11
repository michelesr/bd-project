<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento indirizzo - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Categorie (Categoria) VALUES ('".$_POST['Categoria']."');";
    if(mysqli_query($conn, $query)) {
        echo "<p>Categoria aggiunta</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_categoria_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?> 
</body>
</html>
