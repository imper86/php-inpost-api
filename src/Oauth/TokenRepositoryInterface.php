<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\TokenInterface;

interface TokenRepositoryInterface
{
    public function load(): ?TokenInterface;

    public function save(TokenInterface $token): void;
}