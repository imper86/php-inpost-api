<?php


namespace Imper86\PhpInpostApi\Resource;


use Imper86\PhpInpostApi\Resource\DispatchOrders\Printout;
use Psr\Http\Message\ResponseInterface;

/**
 * Class DispatchOrders
 * @package Imper86\PhpInpostApi\Resource
 *
 * @method Printout printout()
 */
class DispatchOrders extends AbstractResource
{
    use DeleteTrait;

    public function get(string $orderId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/dispatch_orders/%s', $orderId), $query);
    }

    protected function getBaseUri(): string
    {
        return '/v1/dispatch_orders';
    }
}
