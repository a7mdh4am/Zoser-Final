<?php

declare(strict_types=1);


function output_username(){
    if(isset($_SESSION["username"])){
        echo"You Are Sign in As " . $_SESSION["username"];
    }else{
        echo "You Are Not logged in";
    }
}
function check_signin_errors(){
    if(isset($_SESSION['error_signin'])){
        $errors = $_SESSION['error_signin'];
        
        echo "<br>";
        foreach($errors as $errors){
            echo '<p class="form-error">'.$errors.'</p>';
        }
        
        unset($_SESSION['error_signin']);
        
    }else if(isset($_GET["signin"]) && $_GET["signin"] === "success"){
        echo '<br>';
        echo '<p class="form-success"> Sign In Success! </p>';

        
    }
}