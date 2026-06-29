<?php

require_once('../database/conn.php');

$id = filter_input(INPUT_POST, 'id');
$completed = filter_input(INPUT_POST, 'completed');

if ($id !== null && $completed !== null) {

    $completed = ($completed === 'true') ? 1 : 0;

    $sql = $pdo->prepare("UPDATE task SET completed = :completed WHERE id = :id");
    $sql->bindValue(':completed', $completed, PDO::PARAM_INT);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}