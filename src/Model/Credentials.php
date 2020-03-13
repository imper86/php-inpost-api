<?php


namespace Imper86\PhpAllegroApi\Model;


class Credentials implements CredentialsInterface
{
    /**
     * @var string
     */
    private $clientId;
    /**
     * @var string
     */
    private $clientSecret;
    /**
     * @var string
     */
    private $redirectUri;
    /**
     * @var bool
     */
    private $isSandbox;

    public function __construct(string $clientId, string $clientSecret, string $redirectUri, bool $isSandbox = false)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->isSandbox = $isSandbox;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->isSandbox;
    }
}