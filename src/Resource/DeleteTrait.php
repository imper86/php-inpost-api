<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

trait DeleteTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiDelete(string $uri, ?array $query = null): ResponseInterface;

    public function delete(string $id): ResponseInterface
    {
        return $this->apiDelete(sprintf('%s/%s', $this->getBaseUri(), $id));
    }
}
