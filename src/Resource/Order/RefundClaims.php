<?php


namespace Imper86\PhpAllegroApi\Resource\Order;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class RefundClaims extends AbstractResource
{
    public function get(?string $claimId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/order/refund-claims%s', $claimId ? "/{$claimId}" : ''), $query);
    }

    public function delete(string $claimId): ResponseInterface
    {
        return $this->apiDelete("/order/refund-claims/{$claimId}");
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/order/refund-claims', $body);
    }
}