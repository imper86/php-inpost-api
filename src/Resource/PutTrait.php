<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

trait PutTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiPut(string $uri, ?array $body = null): ResponseInterface;

    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut(sprintf('%s/%s', $this->getBaseUri(), $id), $body);
    }
}
