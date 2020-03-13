<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Categories;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ProductParameters extends AbstractResource
{
    public function get(string $categoryId): ResponseInterface
    {
        return $this->apiGet("/sale/categories/{$categoryId}/product-parameters");
    }
}