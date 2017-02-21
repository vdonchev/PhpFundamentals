<?php

namespace Telephony;

interface CallInterface
{
    public function call(string $number): string;
}