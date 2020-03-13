<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\TokenInterface;
use Psr\Http\Message\ResponseInterface;

interface TokenFactoryInterface
{
    public function createFromResponse(ResponseInterface $response, string $grantType): TokenInterface;
}