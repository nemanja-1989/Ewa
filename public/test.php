<?php
header('Content-Type: text/javascript');

$method = $_SERVER['REQUEST_METHOD'];

$mysqli = new mysqli('host', 'user', 'password', 'database');
if ($method === 'GET' && isset($_GET['book_id'])) {
 $res = $mysqli->query("SELECT * FROM books WHERE id = {$_GET[“book_id”]} LIMIT 1");
 $row = $res->fetch_assoc();
 print( $row);
}
else if ($method === 'POST') {
 if(isset($_REQUEST['book_id'])) {
 $updated = date('Y-m-d');
 $mysqli->query("UPDATE books SET name = "{$_POST['name']}", author = {$_POST['author']},
updated = '$updated' WHERE id = {$_REQUEST['book_id']}");
 echo ‘Book has been updated!’;

 } else {
 $created = date(‘Y-m-d’);
 $mysqli->query(“INSERT INTO books (name, author, created) VALUES ({$_POST[‘name’]}, {$_
POST[‘author’]}, ‘$created’)”);
 $id = $mysqli->insert_id;
 echo “Book with id ‘$id’ has been created.”;
 }
}