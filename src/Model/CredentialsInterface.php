<?php


namespace Imper86\PhpAllegroApi\Model;


interface CredentialsInterface
{
    public function getClientId(): string;

    public function getClientSecret(): string;

    public function getRedirectUri(): string;

    public function isSandbox(): bool;
}