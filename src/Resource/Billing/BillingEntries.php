<?php


namespace Imper86\PhpAllegroApi\Resource\Billing;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BillingEntries extends AbstractResource
{
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/billing/billing-entries', $query);
    }
}