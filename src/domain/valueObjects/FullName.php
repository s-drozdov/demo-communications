<?php

namespace app\src\domain\valueObjects;

final readonly class FullName
{
    public function __construct(
        public string $value
    ) {}
}