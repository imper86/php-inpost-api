<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

trait GetTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiGet(string $uri, ?array $query = null): ResponseInterface;

    public function get(?string $id = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('%s%s', $this->getBaseUri(), $id ? "/{$id}" : null), $query);
    }
}
