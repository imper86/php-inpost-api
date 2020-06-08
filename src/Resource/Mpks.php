<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

class Mpks extends AbstractResource
{
    use PutTrait;

    public function get(string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('%s/%s', $this->getBaseUri(), $id), $query);
    }

    protected function getBaseUri(): string
    {
        return '/v1/mpks';
    }
}
