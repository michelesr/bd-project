<html>
<head>
  <title>Query predefinite - BancaDelTempo</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
  <?php 
    include 'query_set.php';
  ?>
  <h1>Banca del Tempo</h1>
  <h2>Query predefinite</h2>
  <form method="post" action="query_execute.php">
    <label for="Query">Query: </label>
    <select name="Query" >
      <?php
        foreach($query_set as $query)
            echo "<option value=\"$query[1]\">$query[0]</option>\n"; 
      ?>
    <input type="submit">
  </form>
</body>
<html>
