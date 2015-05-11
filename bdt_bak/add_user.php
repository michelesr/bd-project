<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Registrazione - Banca del Tempo</title>

<body>
  <?php
    include('connect.php');
    $query = "CALL inserisciPersona('".$_POST['Mail']."', '".$_POST['Password']."', '".$_POST['Nome']."', '".$_POST['Cognome']."',".
             " '".$_POST['Telefono']."', '".$_POST['DataDiNascita']."', '".$_POST['NumeroCivico']."', '".$_POST['Presentazione']."',".
             "".$_POST['Zona'].", ".$_POST['Indirizzo'].", '".$_POST['Sesso']."');" ;
    if(mysqli_query($conn, $query)) {
        echo "<p>Utente aggiunto</p>";
        echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
    }
    else {
        echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
        echo "<button onClick=\"location.href='add_user_form.php'\">Riprova</button>";
    }
    mysqli_close($conn);
  ?>
</body>
</html>
