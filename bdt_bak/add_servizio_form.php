<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Inserimento servizio - Banca del Tempo</title>
</head>
<body>
  <h1>Banca del Tempo<h1>
  <h2>Inserimento servizio</h2>
  <?php 
    include ('connect.php');
    $query = "SELECT idCategoria, Categoria FROM Categorie;";
    $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT);
    mysqli_close($conn);
  ?>
  <form method="post" action="add_servizio.php">
  <label for="Servizio">Nome servizio:</label>
  <input type="text" name="Servizio"></input><br>
  <label for="Categoria">Categoria:</input>
  <select name="Categoria">
    <?php
      while($obj = mysqli_fetch_object($result)) 
          echo "<option value=\"".$obj->idCategoria."\">".$obj->Categoria."</option>"; 
    ?>
  </select><br>
  <input type="submit"><br>
  </form>
  <p>La categoria non appare nell'elenco? <a href="add_categoria_form.php">Aggiungila ora</a></p>
</body>
</html>
