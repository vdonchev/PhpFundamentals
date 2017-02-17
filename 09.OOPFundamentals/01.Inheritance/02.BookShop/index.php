<?php
declare(strict_types = 1);

use BookApp\Book;
use BookApp\GoldenEditionBook;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$author = readLine();
$bookName = readLine();
$price = floatval(readLine());
$bookType = readLine();

try {
    $book = null;
    if ($bookType == "STANDARD") {
        $book = new Book($bookName, $author, $price);
    } else if ($bookType == "GOLD") {
        $book = new GoldenEditionBook($bookName, $author, $price);
    } else {
        throw new Exception("Type is not valid!");
    }

    echo "OK\n";
    echo $book->getPrice();
} catch (Exception $e) {
    echo $e->getMessage();
}

function readLine(): string
{
    return trim(fgets(STDIN));
}
