<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Aggiungi messaggio - Banca del Tempo</title>
</head>
<body>
  <?php 
    include ('connect.php');
    $query1 = "SELECT * From MittentiConversazioni;";
    $query2 = "SELECT * From DestinatariConversazioni;";
    $result1 = mysqli_query($conn, $query1, MYSQLI_STORE_RESULT);
    $result2 = mysqli_query($conn, $query2, MYSQLI_STORE_RESULT);
    echo mysqli_error($conn);
    mysqli_close($conn);
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Inserimento messaggio</h2>
  <form method="post" action="add_messaggio.php">
    <label for="Conversazione">Conversazione:</label>
    <select name="Conversazione" >
        <?php
          while($obj1 = mysqli_fetch_object($result1)) {
            $obj2 = mysqli_fetch_object($result2);
            echo "<option value=\"".$obj1->idConversazione."\">".$obj1->Nome." ".$obj1->Cognome." --> ".$obj2->Nome." ".$obj2->Cognome."</option>"; 
          }
        ?>
    </select><br>
    <label for="Messaggio">Messaggio: </label>
    <input type="text" size="70" name="Messaggio"></input>
    <input type="submit">
  </form>
</body>
</html>

