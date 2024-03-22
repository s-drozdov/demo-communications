<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\Provider as Root;

final class Provider
{
    public function __construct(
        public readonly Root $root,
    )
    {}
}
