<?php
declare(strict_types = 1);
session_start();

if (count($_GET) > 0) {
    $tags = array_filter(explode(", ", trim($_GET["tags"])));

    if (isset($_GET["stats"])) {
        $allTags = json_decode(urldecode($_GET["stats"]), true);
    } else {
        $allTags = [];
    }

    foreach ($tags as $tag) {
        if (!array_key_exists($tag, $allTags)) {
            $allTags[$tag] = 0;
        }

        $allTags[$tag]++;
    }

    if (count($allTags) > 0) {
        arsort($allTags);
        $mostFrequentTag = array_keys($allTags)[0];

        $urlStats = urlencode(json_encode($allTags));
    }
}

if (isset($_GET["clear"])) {
    header("Location: ./");
    exit;
}

require_once "view.php";