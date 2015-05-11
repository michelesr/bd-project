<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Aggiornamento utente - Banca del tempo</title>
</head>
<body>
  <h1>Banca del Tempo</h1>
  <h2>Aggiornamento utente</h2>
  <?php 
    include ('connect.php');
    $query = "SELECT idPersona, Nome, Cognome FROM Persone;";
    $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <form method="post" action="upd_user_form.php">
    <label for="Persona">Utente:</label>
    <select name="Persona" >
      <?php
        while($obj = mysqli_fetch_object($result)) 
          echo "<option value=\"".$obj->idPersona."\">".$obj->Nome." ".$obj->Cognome."</option>"; 
      ?>
    </select><br>
    <input type="submit">
  </form>
</body>
</html>
