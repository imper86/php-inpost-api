<?php


namespace Imper86\ImmiApi\Resource;


trait PostTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiPost(string $uri, ?array $body = null): ?array;

    public function post(array $body): ?array
    {
        return $this->apiPost($this->getBaseUri(), $body);
    }
}