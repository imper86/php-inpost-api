<?php


namespace Imper86\ImmiApi\Resource;


use Imper86\ImmiApi\Resource\Product\Attributes as ProductAttributes;
use Imper86\ImmiApi\Resource\Product\Images;
use Imper86\ImmiApi\Resource\Product\Prices;
use Imper86\ImmiApi\Resource\Product\Translations;

class Products extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/products';
    }

    public function attributes(): ProductAttributes
    {
        return new ProductAttributes($this->immi);
    }

    public function images(): Images
    {
        return new Images($this->immi);
    }

    public function prices(): Prices
    {
        return new Prices($this->immi);
    }

    public function translations(): Translations
    {
        return new Translations($this->immi);
    }
}