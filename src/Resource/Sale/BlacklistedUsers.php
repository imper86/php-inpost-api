<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BlacklistedUsers extends AbstractResource
{
    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/blacklisted-users', $query);
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/blacklisted-users', $body);
    }

    public function delete(string $excludedUserId): ResponseInterface
    {
        return $this->apiDelete("/sale/blacklisted-users/{$excludedUserId}");
    }
}