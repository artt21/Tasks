<?php

function addText(string $text): void
{

    $pdo = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8", "root", "");

    $sql = "INSERT INTO text (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam("text", $text);
    $statement->execute();
}

addText($_POST['text']);

header("Location: task_9.php");