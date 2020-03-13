<?php


namespace Imper86\PhpAllegroApi\Resource\Payments;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PaymentIdMappings extends AbstractResource
{
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/payments/payment-id-mappings', $query);
    }
}