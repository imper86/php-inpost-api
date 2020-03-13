<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class OfferTags extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-tags', $body);
    }

    public function get(array $query): ResponseInterface
    {
        return $this->apiGet('/sale/offer-tags', $query);
    }

    public function delete(string $tagId): ResponseInterface
    {
        return $this->apiDelete("/sale/offer-tags/{$tagId}");
    }

    public function put(string $tagId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-tags/{$tagId}", $body);
    }
}