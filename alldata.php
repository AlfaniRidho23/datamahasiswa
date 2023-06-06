<?php
    include 'connection.php';

    $conn = getConnection();

    try {
        $statement = $conn->query("SELECT * FROM mahasiswa2");

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $result = $statement->fetchAll();

        echo json_encode ($result, JSON_PRETTY_PRINT);
    } catch (PDOException $e) {
        echo $e;
    }

?>