<?php


namespace Imper86\PhpAllegroApi\Resource\AfterSalesServiceConditions;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Warranties extends AbstractResource
{
    public function get(?array $query, ?string $id = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/after-sales-service-conditions/warranties%s', $id ? "/{$id}" : ''), $query);
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/after-sales-service-conditions/warranties', $body);
    }

    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/after-sales-service-conditions/warranties/{$id}", $body);
    }
}
