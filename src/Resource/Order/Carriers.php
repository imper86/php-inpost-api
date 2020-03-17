<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Carriers extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/order/carriers');
    }
}