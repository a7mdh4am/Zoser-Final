<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';



       ///ERROR HANDLER
       $errors = [];

       if(is_input_empty($username,$password)){
           $errors["empty_field"] = "Please fill in all fields";

       }
       
       $result = get_user($pdo,$username);


       if(is_username_wrong($result)){
        $errors["wrong_username"] = "Username is wrong";
       }

       
       if(!is_username_wrong($result) && is_password_wrong($password,$result["password"])){
        $errors["wrong_password"] = "Password is wrong";
       }


       require_once 'config_session.inc.php';

       if($errors){
           $_SESSION["error_signin"] = $errors;

           header("Location: ../signin.php");
           die();
       }

       $newSessionId = session_create_id();
       $sessionId = $newSessionId . "_" .$result["id"];
       session_id($sessionId);

       $_SESSION["user_id"] = $result["id"];
       $_SESSION["user_username"] = htmlspecialchars ($result["username"]);

       $_SESSION["last_regenration"] = time();

       header("Location: ../profile.php?id=". $result["id"] );
       $pdo = null;
       $stmt = null;
       
       die(); 

    } catch (PDOException $e) {
        die("Query Failed: " .$e->getMessage());
    }


}    else{
    header("Location: ../signin.php");
    die();
}