<?php
declare(strict_types = 1);
session_start();

if (isset($_GET["submit"])) {
    $tags = array_filter(explode(", ", trim($_GET["tags"])));
    if (!isset($_SESSION["tags"])) {
        $_SESSION["tags"] = [];
    }

    $allTags = &$_SESSION["tags"];
    foreach ($tags as $tag) {
        if (!array_key_exists($tag, $allTags)) {
            $allTags[$tag] = 0;
        }

        $allTags[$tag]++;
    }

    if (count($allTags) > 0) {
        arsort($allTags);
        $mostFrequentTag = array_keys($allTags)[0];
    }
}

if (isset($_GET["clear"])) {
    session_destroy();
}

require_once "view.php";