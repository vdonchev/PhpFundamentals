<?php

namespace MultiplyImplementations;

interface Identifiable
{
    public function getId(): string;

    public function setId(string $id);
}