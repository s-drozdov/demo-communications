<?php

namespace app\src\domain\entities;

use app\src\domain\valueObjects\Address;

final readonly class Apartment
{
    public function __construct(
        public int $id,
        public Address $address,
    )
    {}
}
