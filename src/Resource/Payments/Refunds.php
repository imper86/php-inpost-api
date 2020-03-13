<?php


namespace Imper86\PhpAllegroApi\Resource\Payments;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Refunds extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/payments/refunds', $body);
    }

    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/payments/refunds', $query);
    }
}