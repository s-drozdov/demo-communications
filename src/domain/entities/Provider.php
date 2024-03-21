<?php

namespace app\src\domain\entities;

use app\src\domain\enums\ProviderCode;

final readonly class Provider
{
    public function __construct(
        public int $id,
        public ProviderCode $code,
        public string $title,
    )
    {}
}
