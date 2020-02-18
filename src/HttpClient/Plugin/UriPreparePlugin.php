<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 17:29
 */

namespace Imper86\ImmiApi\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\OauthClient\Model\CredentialsInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class UriPreparePlugin implements Plugin
{
    /**
     * @var CredentialsInterface
     */
    private $credentials;
    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;
    /**
     * @var UriInterface|null
     */
    private $baseUri;

    public function __construct(CredentialsInterface $credentials, UriFactoryInterface $uriFactory)
    {
        $this->credentials = $credentials;
        $this->uriFactory = $uriFactory;
        $this->baseUri = $credentials->getBaseUri() ? $uriFactory->createUri($credentials->getBaseUri()) : null;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();

        if (empty($uri->getHost())) {
            $uri = $uri->withHost($this->baseUri ? $this->baseUri->getHost() : 'api.b2b.immi.shop');
        }

        if (empty($uri->getScheme())) {
            $uri = $uri->withScheme($this->baseUri ? $this->baseUri->getScheme() : 'https');
        }

        if ($this->baseUri && $this->baseUri->getPort()) {
            $uri = $uri->withPort($this->baseUri->getPort());
        }

        $basePath = '/api';

        if (substr($uri->getPath(), 0, strlen($basePath)) !== $basePath) {
            $uri = $uri->withPath("{$basePath}{$uri->getPath()}");
        }

        if ($uri !== $request->getUri()) {
            $request = $request->withUri($uri);
        }

        return $next($request);
    }
}
