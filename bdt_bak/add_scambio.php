
<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento scambio - Banca del Tempo</title>
</head>
<body>
  <?php
    $ore = (int)$_POST['Importo'];
    $min = (int)$_POST['ImportoMinuti'];
    $imp = $ore + ($min / 60.0);
    $data = $_POST['Data'];
    if ($ore <= 0 || $ore > 8 || $min < 0 || $min > 30)
      header('Location: add_scambio_form.php?e=1');
    else if ((strtotime($data) - strtotime("now")) > 0)
      header('Location: add_scambio_form.php?e=2');
    else {
      include('connect.php');
      $query = "SELECT Persona, Servizio FROM Annunci ".
               "WHERE idAnnuncio = ".$_POST['Domanda']." ".
               "OR idAnnuncio = ".$_POST['Offerta'].";";
      $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT);
      $annuncio1 = mysqli_fetch_object($result);
      $annuncio2 = mysqli_fetch_object($result);
      if ($annuncio1->Persona == $annuncio2->Persona ||
          $annuncio1->Servizio != $annuncio2->Servizio) {
        mysqli_close($conn);
        header('Location: add_scambio_form.php?e=3');
      }
      else {
        $dom = $_POST['Domanda'];
        $off = $_POST['Offerta'];
        $fb1 = $_POST['FB1']; 
        $fb2 = $_POST['FB2'];
        $com = $_POST['Commenti'];
        $query = "INSERT INTO Scambi (Domanda, Offerta, Importo, Data, FeedbackProfessionalita, FeedbackSimpatia, Commenti) VALUES ".
                 "(".$dom.", ".$off.", ".$imp." , '".$data."', ".$fb1.", ".$fb2.", '".$com."');";
        if(mysqli_query($conn, $query)) {
          echo "<p>Scambio aggiunto</p>";
          echo "<button onClick=\"location.href='index.php'\">Ritorna alla home</button>";
        }
        else {
          echo "<p>Error:<br>".mysqli_error($conn)."</p>"; 
          echo "<button onClick=\"location.href='add_scambio_form.php?e=0'\">Riprova</button>";
        }
        mysqli_close($conn);
      }
    }
  ?> 
</body>
</html>
