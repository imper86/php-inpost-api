<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class UserAgentHeaderPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('X-User-Agent')) {
            $request = $request->withHeader('X-User-Agent', 'imper86/php-inpost-api')
                ->withHeader('X-User-Agent', file_get_contents(__DIR__ . '/../../version'));
        }

        return $next($request);
    }
}
