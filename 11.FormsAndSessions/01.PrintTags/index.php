<?php
if (isset($_GET["submit"])) {
    $tags = array_filter(explode(", ", trim($_GET["tags"])));
}

require_once "view.php";