<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Enums;

enum TokenScope: string
{
    case Content = 'content';
    case ContentAnalytics = 'contentanalytics';
    case DiscountSandPrices = 'discountsandprices';
    case Marketplace = 'marketplace';
    case Statistics = 'statistics';
    case Advert = 'advert';
    case QuestionsAndFeedback = 'questionsandfeedback';
    case Recommendations = 'recommendations';
    case BuyerChat = 'buyerchat';
    case Supplies = 'supplies';
    case Returns = 'returns';
    case ReadOnly = 'read-only';
}
