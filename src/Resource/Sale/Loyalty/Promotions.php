<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Loyalty;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Promotions extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/loyalty/promotions', $body);
    }

    public function get(?string $promotionId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/loyalty/promotions%s', $promotionId ? "/{$promotionId}" : ''),
            $query
        );
    }

    public function delete(string $promotionId): ResponseInterface
    {
        return $this->apiDelete("/sale/loyalty/promotions/{$promotionId}");
    }
}