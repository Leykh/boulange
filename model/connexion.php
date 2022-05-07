<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    
    function getPdo(){
        $pdo = new PDO("mysql:host=localhost;dbname=boulange;charset=utf8","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $pdo;
    }
?>
    </body>
</html>