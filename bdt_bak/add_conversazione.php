<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento conversazione - Banca del Tempo</title>
</head>
<body>
  <?php
    $mit = $_POST['Mittente'];
    $des = $_POST['Destinatario'];
    if ($mit == $des)
      header('Location: add_conversazione_form.php?e=1');
    else {
      include('connect.php');
      $query = "INSERT INTO Conversazioni (Mittente, Destinatario) VALUES (".$mit.", ".$des.");";
      if(mysqli_query($conn, $query)) {
        echo "<p>Conversazione aggiunta</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
      }
      else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_conversazione_form.php?e=0'\">Riprova</button>";
      }
      mysqli_close($conn);
    }
  ?> 
</body>
</html>
