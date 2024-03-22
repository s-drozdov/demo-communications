<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\Consumer as Root;

final class Consumer
{
    public function __construct(
        public readonly Root $root,
    )
    {}
}
