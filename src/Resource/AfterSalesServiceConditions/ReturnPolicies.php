<?php


namespace Imper86\PhpAllegroApi\Resource\AfterSalesServiceConditions;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ReturnPolicies extends AbstractResource
{
    public function get(?array $query, ?string $id = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/after-sales-service-conditions/return-policies%s', $id ? "/{$id}" : ''),
            $query
        );
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/after-sales-service-conditions/return-policies', $body);
    }

    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/after-sales-service-conditions/return-policies/{$id}", $body);
    }
}
