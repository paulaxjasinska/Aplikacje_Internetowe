<?php
print_r($_REQUEST);
print('<br>');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Zebrać wartości z pól formularza

  $email = $_POST['email'];
  $offer_type = $_POST['offers'];
  $budget = $_POST['budget'];
  $comment = $_POST['comment'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ai1_lab4";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. <br>";

    // Przygotować polecenie insert i wstawić rekord do tabeli
    $sql = "INSERT INTO questions (email, offers, budget, comment) VALUES (?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$email, $offer_type, $budget, $comment]);

    echo "New record created successfully. <br>";
    $conn = null;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
    $conn = null;
  }
}
