<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferVariants extends AbstractResource
{
    public function put(string $setId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-variants/{$setId}", $body);
    }

    public function get(?string $setId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offer-variants%s', $setId ? "/{$setId}" : ''), $query);
    }

    public function delete(string $setId): ResponseInterface
    {
        return $this->apiDelete("/sale/offer-variants/{$setId}");
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-variants', $body);
    }
}