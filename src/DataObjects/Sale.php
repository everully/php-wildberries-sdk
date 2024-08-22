<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Carbon\Carbon;
use Everully\PhpWildberriesSdk\Concerns\Data;
use Everully\PhpWildberriesSdk\Enums\OrderType;

class Sale extends Data
{
    public function __construct(
        public Carbon $date,
        public Carbon $last_change_date,
        public string $warehouse_name,
        public string $country_name,
        public string $oblast_okrug_name,
        public string $region_name,
        public string $supplier_article,
        public int $nm_id,
        public string $barcode,
        public string $category,
        public string $subject,
        public string $brand,
        public string $tech_size,
        public int $income_id,
        public bool $is_supply,
        public bool $is_realization,
        public float $total_price,
        public int $discount_percent,
        public float $spp,
        public int $payment_sale_amount,
        public float $for_pay,
        public float $finished_price,
        public float $price_with_disc,
        public string $sale_id,
        public OrderType $order_type,
        public string $sticker,
        public string $g_number,
        public string $srid,
    ) {}

    public static function fromSaloon(array $response): self
    {
        return new self(
            date: Carbon::parse($response['date']),
            last_change_date: Carbon::parse($response['lastChangeDate']),
            warehouse_name: strval($response['warehouseName']),
            country_name: strval($response['countryName']),
            oblast_okrug_name: strval($response['oblastOkrugName']),
            region_name: strval($response['regionName']),
            supplier_article: strval($response['supplierArticle']),
            nm_id: intval($response['nmId']),
            barcode: strval($response['barcode']),
            category: strval($response['category']),
            subject: strval($response['subject']),
            brand: strval($response['brand']),
            tech_size: strval($response['techSize']),
            income_id: intval($response['incomeID']),
            is_supply: boolval($response['isSupply']),
            is_realization: boolval($response['isRealization']),
            total_price: floatval($response['totalPrice']),
            discount_percent: intval($response['discountPercent']),
            spp: floatval($response['spp']),
            payment_sale_amount: intval($response['paymentSaleAmount']),
            for_pay: floatval($response['forPay']),
            finished_price: floatval($response['finishedPrice']),
            price_with_disc: floatval($response['priceWithDisc']),
            sale_id: strval($response['saleID']),
            order_type: OrderType::from($response['orderType']),
            sticker: strval($response['sticker']),
            g_number: strval($response['gNumber']),
            srid: strval($response['srid']),
        );
    }
}
