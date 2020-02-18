<?php


namespace Imper86\ImmiApi\Resource;


trait PutTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiPut(string $uri, ?array $body = null): ?array;

    public function put(string $id, array $body): ?array
    {
        return $this->apiPut(sprintf('%s/%s', $this->getBaseUri(), $id), $body);
    }
}