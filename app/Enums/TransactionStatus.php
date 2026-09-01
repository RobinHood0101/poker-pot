<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case PAID = 'paid';
    case PENDING = 'pending';
    case CANCELED = 'canceled';
}
