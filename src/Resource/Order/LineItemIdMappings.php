<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class LineItemIdMappings extends AbstractResource
{
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/order/line-item-id-mappings', $query);
    }
}