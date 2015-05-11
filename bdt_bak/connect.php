<?php
       $host = 'localhost';
       $username = 'bdt';
       $password = 'bdt';
       $database = 'BancaDelTempo';
       $conn = mysqli_connect($host, $username, $password, $database);
       if (!$conn)
           die("<p>Errore di connessione al database</p>");
?>
