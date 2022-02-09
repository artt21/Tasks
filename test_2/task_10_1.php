<?php

session_start();

function addText(string $text): void
{

    $pdo = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8", "root", "");

    $sql = "SELECT * FROM text WHERE text=:text";
    $statement = $pdo->prepare($sql);
    $statement->bindParam("text", $text);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if (!empty($result)){
       $message = "Such record already exists";
       $_SESSION['danger'] = $message;

       header("Location: task_10.php");
       exit;
    }

    $sql = "INSERT INTO text (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam("text", $text);
    $statement->execute();

    $message = "Success";
    $_SESSION['success'] = $message;

}

addText($_POST['text']);

header("Location: task_10.php");