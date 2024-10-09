<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';


        ///ERROR HANDLER
        $errors = [];

        if(is_input_empty($username,$password)){
            $errors["empty_field"] = "Please fill in all fields";

        }
        if(is_username_taken($pdo,$username)){
            $errors["username_taken"] = "Username already taken";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["error_signup"] = $errors;

            header("Location: ../signup.php");
            die();
        }

        create_user($pdo,$username,$password);
        header("Location: ../signup.php?signup=success");
        
        $pdo = null;
        $stmt = null;


        die();



    } catch (PDOException $e) {
        die("Query Failed: " .$e->getMessage());
    }


}else{
    header("Location: ../signup.php");
    die();
}