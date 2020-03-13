<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Products extends AbstractResource
{
    public function get(?string $productId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/products%s', $productId ? "/{$productId}" : ''), $query);
    }
}