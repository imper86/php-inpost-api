<?php


namespace Imper86\PhpInpostApi\Resource\DispatchOrders;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Printout extends AbstractResource
{
    public function get(string $dispatchOrderId, array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/dispatch_orders/%s/printout', $dispatchOrderId), $query);
    }
}
