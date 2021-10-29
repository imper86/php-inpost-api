<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class AuthenticationPlugin implements Plugin
{
    /**
     * @var string
     */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if ($request->hasHeader('Authorization')) {
            return $next($request);
        }

        return $next($request->withHeader('Authorization', sprintf('Bearer %s', $this->token)));
    }
}
