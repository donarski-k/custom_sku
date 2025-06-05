<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Api\Data;

interface CustomSkuChangeInterface
{
    public const CHANGE_ID = 'change_id';
    public const PRODUCT_ID = 'product_id';
    public const VALUE = 'value';
    public const UPDATE_TIME = 'update_time';

    public function getChangeId(): int;

    public function getProductId(): int;

    public function setProductId(int $productId): self;

    public function getValue(): string;

    public function setValue(string $value): self;
}
