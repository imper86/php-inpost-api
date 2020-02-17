<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 14:42
 */

namespace Imper86\AsanaApi\Resource;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Imper86\AsanaApi\Constants\BaseHost;
use Imper86\AsanaApi\Constants\GrantType;
use Imper86\AsanaApi\Constants\Scope;
use Imper86\AsanaApi\Helper\TokenBundleFactory;
use Imper86\AsanaApi\Model\TokenBundleInterface;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use function GuzzleHttp\Psr7\build_query;

class Authorization extends AbstractResource
{
    public function authUri(?string $state = null, array $scopes = [Scope::DEFAULT]): UriInterface
    {
        if (null === $state) {
            $state = bin2hex(random_bytes(8));
        }

        $credentials = $this->client->getCredentials();

        $query = [
            'client_id' => $credentials->getClientId(),
            'redirect_uri' => $credentials->getRedirectUri(),
            'response_type' => 'code',
            'state' => $state,
            'scope' => implode(' ', $scopes),
        ];

        return new Uri(sprintf('https://%s/-/oauth_authorize?', BaseHost::HOST) . build_query($query));
    }

    public function fetchToken(string $code): TokenBundleInterface
    {
        $httpClient = $this->client->getHttpClient();

        $request = $this->generateTokenRequest(GrantType::AUTHORIZATION_CODE, $code);
        $response = $httpClient->sendRequest($request);

        if (!in_array($response->getStatusCode(), [200, 201], true)) {
            throw new BadResponseException("Failed to fetch token", $request, $response);
        }

        return TokenBundleFactory::createFromResponse($response, GrantType::AUTHORIZATION_CODE);
    }

    public function refreshToken(string $refreshToken): TokenBundleInterface
    {
        $httpClient = $this->client->getHttpClient();

        $request = $this->generateTokenRequest(GrantType::REFRESH_TOKEN, $refreshToken);
        $response = $httpClient->sendRequest($request);

        if (!in_array($response->getStatusCode(), [200, 201], true)) {
            throw new BadResponseException("Failed to fetch token", $request, $response);
        }

        return TokenBundleFactory::createFromResponse($response, GrantType::REFRESH_TOKEN);
    }

    private function generateTokenRequest(string $grantType, string $grant): RequestInterface
    {
        $credentials = $this->client->getCredentials();

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ];

        $query = [
            'grant_type' => $grantType,
            'client_id' => $credentials->getClientId(),
            'client_secret' => $credentials->getClientSecret(),
            'redirect_uri' => $credentials->getRedirectUri(),
        ];

        switch ($grantType) {
            case GrantType::AUTHORIZATION_CODE:
                $query['code'] = $grant;
                break;
            case GrantType::REFRESH_TOKEN:
                $query['refresh_token'] = $grant;
                break;
            default:
                throw new InvalidArgumentException(sprintf("Invalid grant type: %s", $grantType));
        }

        $uri = new Uri(sprintf('https://%s/-/oauth_token', BaseHost::HOST));

        return new Request('POST', $uri, $headers, http_build_query($query));
    }
}
