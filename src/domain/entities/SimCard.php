<?php

namespace app\src\domain\entities;

final readonly class SimCard
{
    public function __construct(
        public int $id,
        public string $mobile_number,
        public int $provider_id,
        public ?int $consumer_id,
    )
    {}
}
