    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
        try {
            require_once "dbh.inc.php";

            $query = "INSERT INTO contact (name,email,message) VALUES (?,?,?);";

            $stmt = $pdo->prepare($query);
            
            $stmt->execute([$name,$email,$message]);

            $pdo = null;
            $stmt = null;
            header("Location: ../contact.php");

            die();

        } catch (PDOException $th) {
            die("Failed: " .$e->getMessage());
        }


    }
    else{
        header("Location: ./contact.php");
        die();
    }