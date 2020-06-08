<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class RequestIdPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('X-Request-ID')) {
            $request = $request->withHeader('X-Request-ID', uniqid('', true));
        }

        return $next($request);
    }
}
