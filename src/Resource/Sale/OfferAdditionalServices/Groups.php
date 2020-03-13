<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\OfferAdditionalServices;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Groups extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offer-additional-services/groups', $body);
    }

    public function get(?string $groupId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/sale/offer-additional-services/groups%s', $groupId ? "/{$groupId}" : ''),
            $query
        );
    }

    public function put(string $groupId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offer-additional-services/groups/{$groupId}", $body);
    }
}