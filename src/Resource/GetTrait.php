<?php


namespace Imper86\ImmiApi\Resource;


trait GetTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiGet(string $uri, ?array $query = null): ?array;

    public function get(?string $id = null, ?array $query = null): ?array
    {
        return $this->apiGet(sprintf('%s%s', $this->getBaseUri(), $id ? "/{$id}" : null), $query);
    }
}