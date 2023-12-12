<?php
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12668816';
$user = 'sql12668816';
$password = '72i56CfqUB';

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
