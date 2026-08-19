<?php

namespace App\Enums;

enum TransactionType: string
{
    case ACTIVE = 'income';
    case INACTIVE = 'expense';
    case CORRECTION = 'correction';
}
