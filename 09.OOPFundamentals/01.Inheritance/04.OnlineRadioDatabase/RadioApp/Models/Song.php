<?php


namespace RadioApp\Models;


use RadioApp\Exceptions\InvalidArtistNameException;
use RadioApp\Exceptions\InvalidSongMinutesException;
use RadioApp\Exceptions\InvalidSongNameException;
use RadioApp\Exceptions\InvalidSongSecondsException;
use RadioApp\Helper\Validator;

class Song
{
    private $artist;
    private $title;

    /**
     * @var $duration int
     */
    private $duration;

    public function __construct(string $artist, string $title, int $minutes, int $seconds)
    {
        $this->setArtist($artist);
        $this->setTitle($title);
        $this->setDuration($minutes, $seconds);
    }

    protected function setArtist(string $artist)
    {
        if (!Validator::numberIsInRange(strlen($artist), 3, 20)) {
            throw new InvalidArtistNameException("Artist name should be between 3 and 20 symbols.");
        }

        $this->artist = $artist;
    }

    protected function setTitle(string $title)
    {
        if (!Validator::numberIsInRange(strlen($title), 3, 30)) {
            throw new InvalidSongNameException("Song name should be between 3 and 30 symbols.");
        }

        $this->title = $title;
    }

    protected function setDuration(int $minutes, int $seconds)
    {
        if (!Validator::numberIsInRange($minutes, 0, 14)) {
            throw new InvalidSongMinutesException("Song minutes should be between 0 and 14.");
        }

        if (!Validator::numberIsInRange($seconds, 0, 59)) {
            throw new InvalidSongSecondsException("Song seconds should be between 0 and 59.");
        }

        $this->duration = $seconds + ($minutes * 60);
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
}