<html>
<head>
  <title>Disattivazione offerta - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "CALL disattivaAnnuncio(".$_POST['Offerta'].");";
    echo $query;
    if(mysqli_query($conn, $query)) {
        echo "<p>Offerta disattivata</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='upd_offerta_disattiva_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
