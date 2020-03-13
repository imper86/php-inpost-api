<?php


namespace Imper86\PhpAllegroApi\Resource\AfterSalesServiceConditions;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ReturnPolicies extends AbstractResource
{
    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/after-sales-service-conditions/return-policies', $query);
    }
}