<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\Consumer;
use app\src\domain\entities\Provider;
use app\src\domain\entities\Apartment as Root;

/**
 * @property Consumer[] $consumers
 * @property Provider[] $providers
 */
final class Apartment
{
    public function __construct(
        public readonly Root $root,
        public array $consumers,
        public array $providers,
    )
    {}
}
