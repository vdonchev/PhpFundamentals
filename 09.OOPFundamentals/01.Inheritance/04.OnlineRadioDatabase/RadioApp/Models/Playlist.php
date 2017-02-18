<?php


namespace RadioApp\Models;


class Playlist
{
    /**
     * @var $songs Song[]
     */
    private $songs = [];
    private $totalMediaLength = 0;

    public function AddMedia(Song $song)
    {
        $this->songs[] = $song;
        $this->totalMediaLength += $song->getDuration();
    }

    public function __toString(): string
    {
        $duration = $this->getMediaDuration();
        $output = "Songs added: {$this->getMediaCount()}" . PHP_EOL;
        $output .= "Playlist length: {$duration["hours"]}h {$duration["minutes"]}m {$duration["seconds"]}s";

        return $output;
    }

    private function getMediaCount(): int
    {
        return count($this->songs);
    }

    private function getMediaDuration(): array
    {
        return [
            "hours" => floor(floor($this->totalMediaLength / 60) / 60),
            "minutes" => str_pad(floor($this->totalMediaLength / 60) % 60, 2, "0", STR_PAD_LEFT),
            "seconds" => str_pad($this->totalMediaLength % 60, 2, "0", STR_PAD_LEFT)
        ];
    }
}