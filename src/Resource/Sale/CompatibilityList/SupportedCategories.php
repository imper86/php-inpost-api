<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\CompatibilityList;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class SupportedCategories extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/compatibility-list/supported-categories');
    }
}