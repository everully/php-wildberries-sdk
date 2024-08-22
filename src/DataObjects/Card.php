<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Carbon\Carbon;
use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\Concerns\Data;

class Card extends Data
{
    public function __construct(
        public readonly int $nm_id,
        public readonly int $imt_id,
        public readonly int $subject_id,
        public readonly string $subject_name,
        public readonly string $vendor_code,
        public readonly string $brand,
        public readonly string $title,
        public readonly string $description,
        public readonly Dimensions $dimensions,
        //        public readonly Collection $characteristics, //todo
        //        public readonly Collection $sizes, //todo
        public readonly Carbon $created_at,
        public readonly Carbon $updated_at,
    ) {}

    public static function fromSaloon(array $response): self
    {
        return new self(
            nm_id: intval($response['nmID']),
            imt_id: intval($response['imtID']),
            subject_id: intval($response['subjectID']),
            subject_name: strval($response['subjectName']),
            vendor_code: strval($response['vendorCode']),
            brand: strval($response['brand']),
            title: strval($response['title']),
            description: strval($response['description']),
            dimensions: Dimensions::fromSaloon($response['dimensions']),
            //            characteristics: Collection::fromArray($response['characteristics']), //todo
            //            sizes: Collection::fromArray($response['sizes']), //todo
            created_at: Carbon::parse($response['createdAt']),
            updated_at: Carbon::parse($response['updatedAt']),
        );
    }
}
