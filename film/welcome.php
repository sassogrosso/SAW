<?php
    $filename = $_GET['searchbox'];

    $filename = "../film/" . $filename . ".html";

    if (file_exists($filename)) {
        header("Location: $filename");
        exit;
    } else {
        echo "File does not exist";
    }
?>