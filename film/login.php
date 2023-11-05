<?php
session_start();

$filename = "user.txt";

if (isset($_POST['Email']) && isset($_POST['password'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    if (file_exists($filename)) {
        $fileContents = file_get_contents($filename);
        $lines = explode("\n", $fileContents);

        foreach ($lines as $line) {
            $parts = explode(" ", $line);
            $storedEmail = $parts[0];
            $storedHash = $parts[2];

            if ($email == $storedEmail && password_verify($password, $storedHash)) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("Location: welcome.html");
                exit();
            }
        }
    }

    header("Location: login.html");
}
?>