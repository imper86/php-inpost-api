<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ShippingRates extends AbstractResource
{
    public function get(?string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/shipping-rates%s', $id ? "/{$id}" : ''), $query);
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/shipping-rates', $body);
    }

    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/shipping-rates/{$id}", $body);
    }


}