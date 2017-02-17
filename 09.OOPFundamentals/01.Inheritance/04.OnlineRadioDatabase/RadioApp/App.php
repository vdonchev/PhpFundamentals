<?php


namespace RadioApp;


use RadioApp\Models\Playlist;
use RadioApp\Models\Song;

class App
{
    const DELIMITER = ";";
    const TIME_DELIMITER = ":";
    const SUCCESS_MESSAGE = "Song added.";

    /**
     * @var $playlist Playlist
     */
    private $playlist = null;

    public function start()
    {
        $this->playlist = new Playlist();

        $this->processInput();
        $this->writeLine($this->playlist);
    }

    private function processInput()
    {
        $numOfSongs = intval($this->readLine());
        for ($i = 0; $i < $numOfSongs; $i++) {
            try {
                $songData = explode(self::DELIMITER, $this->readLine());

                $artist = $songData[0];
                $title = $songData[1];
                $duration = explode(self::TIME_DELIMITER, $songData[2]);
                $minutes = intval($duration[0]);
                $seconds = intval($duration[1]);

                $song = new Song($artist, $title, $minutes, $seconds);

                $this->playlist->AddMedia($song);
                $this->writeLine(self::SUCCESS_MESSAGE);
            } catch (\Exception $ex) {
                $this->writeLine($ex->getMessage());
            }
        }
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     * @return void
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}