<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\SimCard;
use app\src\domain\entities\Consumer as Root;

/**
 * @property SimCard[] $simCards
 * @property Device[] $devices
 */
final class Consumer
{
    public function __construct(
        public readonly Root $root,
        public array $devices,
        public array $simCards,
    )
    {}
}
