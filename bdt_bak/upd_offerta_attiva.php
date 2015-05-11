<html>
<head>
  <title>Attivazione offerta - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "CALL attivaAnnuncio(".$_POST['Offerta'].");";
    echo $query;
    if(mysqli_query($conn, $query)) {
        echo "<p>Offerta attivata</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='upd_offerta_attiva_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
