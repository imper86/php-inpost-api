<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class AddressBooks extends AbstractResource
{
    public function get(string $organizationId, ?string $addressId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/v1/organizations/%s/address_books%s', $organizationId, $addressId ? "/{$addressId}" : ''),
            $query
        );
    }

    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/address_books', $organizationId), $body);
    }
}
