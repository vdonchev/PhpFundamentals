<?php


namespace MassEffectGame\IO;


class ConsoleIO implements IOInterface
{
    /**
     * @param $text mixed
     * @return void
     */
    public function write($text)
    {
        echo $text;
    }

    /**
     * @param $text mixed
     * @return void
     */
    public function writeLine($text)
    {
        echo $text . PHP_EOL;
    }

    /**
     * @return string
     */
    public function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}