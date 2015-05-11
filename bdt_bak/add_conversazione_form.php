<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Aggiungi conversazione - Banca del Tempo</title>
</head>
<body>
  <?php 
    include ('connect.php');
    $query = "SELECT idPersona, Nome, Cognome FROM Persone"; 
    $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
    $string = "";
    while($obj = mysqli_fetch_object($result))
        $string = $string."<option value=\"".$obj->idPersona."\">".$obj->Nome." ".$obj->Cognome."</option>"; 
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Inserimento conversazione</h2>
  <form method="post" action="add_conversazione.php">
    <label for="Mittente">Mittente:</label>
    <select name="Mittente" >
        <?php
          echo $string;
        ?>
    </select><br>
    <label for="Destinatario">Destinatario:</label>
    <select name="Destinatario" >
        <?php
          echo $string;
        ?>
    </select><br>
    <input type="submit">
  </form>
  <?php if ($_GET['e'] == 1) echo "<p>Mittente e Destinatario devono essere diversi tra loro.</p>"; ?>
</body>
</html>

