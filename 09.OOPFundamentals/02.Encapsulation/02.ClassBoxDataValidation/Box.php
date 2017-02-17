<?php


namespace ClassBoxValidation;


class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function getSurfaceArea(): float
    {
        return 2 * $this->length * $this->width
            + 2 * $this->length * $this->height
            + 2 * $this->width * $this->height;
    }

    public function getLateralSurfaceArea(): float
    {
        return 2 * $this->length * $this->height
            + 2 * $this->width * $this->height;
    }

    public function getVolume(): float
    {
        return $this->length * $this->height * $this->width;
    }

    private function setLength(float $length)
    {
        Helper::validatePositiveNumber($length, "Length");
        $this->length = $length;
    }

    private function setWidth(float $width)
    {
        Helper::validatePositiveNumber($width, "Width");
        $this->width = $width;
    }

    private function setHeight(float $height)
    {
        Helper::validatePositiveNumber($height, "Height");
        $this->height = $height;
    }
}