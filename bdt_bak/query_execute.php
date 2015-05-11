<html>
<head>
  <link type="text/css" rel="stylesheet" href="style.css">
  <title>Esecuzione query - Banca del Tempo</title>
</head>
<body>
  <h1>Banca del tempo</h1>
  <h2>Esecuzione query</h2>
  <?php 
    include 'connect.php';
    $query = $_POST['Query']; 
    echo "<p>$query</p>";
    $result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT); 
    if (!$result)
      echo mysqli_error($conn);
    mysqli_close($conn);
  ?>
  <table>
    <thead>
      <tr>
        <?php
            while ($x = mysqli_fetch_field($result)) {
              echo "<th>$x->name</th>";
            }
        ?>
      </tr>
    </thead>
    <tbody>
      <?php
        while($row = mysqli_fetch_row($result)) {
          echo "<tr>\n";
          foreach ($row as $x)
            echo "<td>$x</td>";
          echo "</tr>\n";
        }
      ?>
    </tbody>
  </table>
</body>
</html>

