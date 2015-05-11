<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento offerta - Banca del Tempo</title>
</head>
<body>
  <?php
    include('connect.php');
    $query = "INSERT INTO Annunci (Tipo, Persona, Servizio, Professionale) VALUES ('O', ".$_POST['Persona'].", ".$_POST['Servizio'].", ".$_POST['Professionale'].");";
    if(mysqli_query($conn, $query)) {
        echo "<p>Offerta aggiunta</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_domanda_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
