<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

class AddressBooks extends AbstractResource
{
    use PutTrait, DeleteTrait;

    public function get(string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('%s/%s', $this->getBaseUri(), $id), $query);
    }

    protected function getBaseUri(): string
    {
        return '/v1/address_books';
    }
}
