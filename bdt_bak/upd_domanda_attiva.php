<html>
<head>
  <title>Attivazione Domanda - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "CALL attivaAnnuncio(".$_POST['Domanda'].");";
    echo $query;
    if(mysqli_query($conn, $query)) {
        echo "<p>Domanda attivata</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='upd_Domanda_attiva_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
