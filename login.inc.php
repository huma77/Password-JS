<?php  
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        $error = [];

        if (is_input_empty($username, $pwd, $email)) {
            $error["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $error["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($username, $pwd)) {
            $error["invalid_email"] = "Invalid email used!";
        }
    }
} else {
    header("Location: ../index.php")
    die();
}

?>