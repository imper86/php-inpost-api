<?php


namespace Imper86\ImmiApi\Resource;


trait DeleteTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiDelete(string $uri): ?array;

    public function delete(string $id): ?array
    {
        return $this->apiDelete(sprintf('%s/%s', $this->getBaseUri(), $id));
    }
}