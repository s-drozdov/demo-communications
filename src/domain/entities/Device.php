<?php

namespace app\src\domain\entities;

final readonly class Device
{
    public function __construct(
        public int $id,
        public int $device_model_id,
        public ?int $consumer_id,
        public bool $isOn,
    )
    {}
}
