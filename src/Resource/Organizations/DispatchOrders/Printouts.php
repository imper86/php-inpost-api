<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Printouts extends AbstractResource
{
    public function get(string $organizationId, array $query): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/dispatch_orders/printouts', $organizationId), $query);
    }
}
