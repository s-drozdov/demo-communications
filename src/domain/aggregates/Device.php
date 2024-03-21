<?php

namespace app\src\domain\aggregates;

use app\src\domain\entities\SimCard;
use app\src\domain\entities\DeviceModel;
use app\src\domain\entities\Device as Root;

/**
 * @property SimCard[] $simCards
 */
final class Device
{
    public function __construct(
        public readonly Root $root,
        public readonly DeviceModel $model,
        public array $simCards,
    )
    {}
}
