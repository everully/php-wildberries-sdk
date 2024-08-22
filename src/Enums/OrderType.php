<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Enums;

enum OrderType: string
{
    case Sale = 'Клиентский';
    case ReturnOfDefect = 'Возврат Брака';
    case ReturnOfForced = 'Принудительный возврат';
    case Return = 'Возврат обезлички';
    case ReturnWrongItems = 'Возврат Неверного Вложения';
    case ReturnFromSeller = 'Возврат Продавца';
    case ReturnFromReview = 'Возврат из Отзыва';
    case ReturnAutoMP = 'АвтоВозврат МП';
    case ReturnNotFull = 'Недокомплект (Вина продавца)';
    case ReturnKGT = 'Возврат КГТ';
}
