<?php

namespace app\src\domain\entities;

use app\src\domain\enums\DeviceCategoryCode;

final readonly class DeviceModel
{
    public function __construct(
        public int $id,
        public string $title,
        public DeviceCategoryCode $deviceCategoryCode,
        public int $simSlotsNumber,
        public bool $hasWifiAdapter,
        public bool $hasEthernetAdapter,
    )
    {}
}
