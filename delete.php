<?php
if (isset($_GET["id"])) {
    $server = "localhost";
    $username ="root";
    $password = "";
    $database = "shop";

    // Create Connection
    $connection = new mysqli($server, $username, $password, $database);

    $id = $_GET["id"];

    $sql = "DELETE FROM product WHERE id=$id";

    $connection->query($sql);
}
header("Location: /learn/index.php");
exit();

?>