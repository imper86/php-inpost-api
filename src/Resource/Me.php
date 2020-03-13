<?php


namespace Imper86\PhpAllegroApi\Resource;


use Psr\Http\Message\ResponseInterface;

class Me extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/me');
    }
}