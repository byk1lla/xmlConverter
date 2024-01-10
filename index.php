<?php 
require "src/inc/header.php";


$page = $_GET['page'] ?? "home";

if ($page) {
    $filePath = "src/inc/pages/{$page}.page.php";

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        http_response_code(404);
        require "src/inc/error/404.error.php";
    }
} else {

   header("Location: /home");
}



require "src/inc/footer.php";
?>