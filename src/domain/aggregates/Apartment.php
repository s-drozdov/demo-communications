<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\Apartment as Root;

final class Apartment
{
    public function __construct(
        public readonly Root $root,
    )
    {}
}
