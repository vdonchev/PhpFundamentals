<?php

namespace Telephony;

interface BrowseInterface
{
    public function browse(string $url): string;
}