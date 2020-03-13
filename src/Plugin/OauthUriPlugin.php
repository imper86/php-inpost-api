<?php


namespace Imper86\PhpAllegroApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Psr\Http\Message\RequestInterface;

class OauthUriPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();
        $uri = $uri->withScheme('https')->withHost(EndpointHost::OAUTH);

        return $next($request->withUri($uri));
    }
}