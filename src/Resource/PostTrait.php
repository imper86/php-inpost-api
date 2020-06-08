<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

trait PostTrait
{
    abstract protected function getBaseUri(): string;
    abstract protected function apiPost(string $uri, ?array $body = null): ResponseInterface;

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost($this->getBaseUri(), $body);
    }
}
