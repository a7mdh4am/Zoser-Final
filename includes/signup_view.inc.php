<?php

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION['error_signup'])){
        $errors = $_SESSION['error_signup'];
        
        echo "<br>";
        foreach($errors as $errors){
            echo '<p class="form-error">'.$errors.'</p>';
        }
        
        unset($_SESSION['error_signup']);
        
    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="form-success"> Sign Up Success! </p>';

    }
}