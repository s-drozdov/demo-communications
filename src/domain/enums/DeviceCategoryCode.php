<?php

namespace app\src\domain\enums;

enum DeviceCategoryCode: string
{
    case Smartphone = 'smartphone';
    case Laptop = 'laptop';
    case Tablet = 'tablet';
    case Desktop = 'desktop';
    case Tv = 'tv';
    case Router = 'router';
}
