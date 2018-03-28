<?php
require_once "../Views/header.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "You've submitted the form.";
}
require_once "../Views/student_form.php";
require_once "../Views/footer.php";





