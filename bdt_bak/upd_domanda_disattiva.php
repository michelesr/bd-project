<html>
<head>
  <title>Disattivazione Domanda - Banca del Tempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    include('connect.php');
    $query = "CALL disattivaAnnuncio(".$_POST['Domanda'].");";
    echo $query;
    if(mysqli_query($conn, $query)) {
        echo "<p>Domanda disattivata</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='upd_Domanda_disattiva_form.php'\">Riprova</button>";
    } 
    mysqli_close($conn);
  ?> 
</body>
</html>
