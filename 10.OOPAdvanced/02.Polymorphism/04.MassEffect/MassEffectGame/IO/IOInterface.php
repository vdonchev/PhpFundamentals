<?php


namespace MassEffectGame\IO;


interface IOInterface
{
    /**
     * @param $text mixed
     * @return void
     */
    public function write($text);

    /**
     * @param $text mixed
     * @return void
     */
    public function writeLine($text);

    /**
     * @return string
     */
    public function readLine(): string;
}