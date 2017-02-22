<?php
declare(strict_types = 1);

use Collections\AddCollection;
use Collections\AddInterface;
use Collections\AddRemoveCollection;
use Collections\MyList;
use Collections\RemoveInterface;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$addCollection = new AddCollection();
$addRemoveCollection = new AddRemoveCollection();
$myList = new MyList();

/**
 * @var $addCollections AddInterface[]
 */
$addCollections = [$addCollection, $addRemoveCollection, $myList];

/**
 * @var $removeCollections RemoveInterface[]
 */
$removeCollections = [$addRemoveCollection, $myList];

$input = explode(" ", readLine());
foreach ($addCollections as $collection) {
    $output = [];
    foreach ($input as $item) {
       $output[] = $collection->Add($item);
    }

    writeLine(implode(" ", $output));
}

$numOfRemovals = intval(readLine());
foreach ($removeCollections as $collection) {
    $output = [];
    for ($i = 0; $i < $numOfRemovals; $i++) {
        $output[] = $collection->remove();
    }

    writeLine(implode(" ", $output));
}

function readLine(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param $content mixed
 * @return void
 */
function writeLine($content)
{
    echo $content . PHP_EOL;
}