<?php

namespace app\src\domain\entities;

use app\src\domain\valueObjects\FullName;

final readonly class Consumer
{
    public function __construct(
        public int $id,
        public FullName $fullName,
    )
    {}
}
