<?php

namespace app\src\domain\enums;

enum ProviderCode: string
{
    case Tele2 = 'tele2';
    case DreamSim = 'dream_sim';
    case GlobalSim = 'global_sim';
    case Orange = 'orange';
    case Vodafone = 'vodafone';
    case O2 = 'o2';
}
