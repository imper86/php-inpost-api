<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders\Calculate;
use Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders\Comment;
use Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders\Printouts;
use Psr\Http\Message\ResponseInterface;

/**
 * Class DispatchOrders
 * @package Imper86\PhpInpostApi\Resource\Organizations
 *
 * @method Calculate calculate()
 * @method Comment comment()
 * @method Printouts printouts()
 */
class DispatchOrders extends AbstractResource
{
    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/dispatch_orders', $organizationId), $body);
    }

    public function get(string $organizationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/dispatch_orders', $organizationId), $query);
    }
}
