<?php


namespace Imper86\ImmiApi\Resource\Product;


use Imper86\ImmiApi\Resource\AbstractResource;
use Imper86\ImmiApi\Resource\GetTrait;

class Attributes extends AbstractResource
{
    use GetTrait;

    protected function getBaseUri(): string
    {
        return '/product_attributes';
    }
}