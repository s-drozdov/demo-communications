<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\SimCard as Root;

final class SimCard
{
    public function __construct(
        public readonly Root $root,
    )
    {}
}
