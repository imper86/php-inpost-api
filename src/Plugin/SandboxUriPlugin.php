<?php


namespace Imper86\PhpAllegroApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpAllegroApi\Enum\EndpointHost;
use Psr\Http\Message\RequestInterface;

class SandboxUriPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();
        $uri = $uri->withHost($uri->getHost() . EndpointHost::SANDBOX_SUFFIX);

        return $next($request->withUri($uri));
    }
}