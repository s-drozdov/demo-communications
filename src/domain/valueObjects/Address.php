<?php

namespace app\src\domain\valueObjects;

final readonly class Address
{
    public function __construct(
        public string $value
    ) {}
}