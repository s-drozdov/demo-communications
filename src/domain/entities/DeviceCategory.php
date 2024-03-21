<?php

namespace app\src\domain\entities;

use app\src\domain\enums\DeviceCategoryCode;

final readonly class DeviceCategory
{
    public function __construct(
        public int $id,
        public DeviceCategoryCode $code,
        public string $title,
    )
    {}
}
