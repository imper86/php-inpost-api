<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:57
 */

namespace Imper86\AsanaApi\Oauth;

use Imper86\OauthClient\Factory\TokenFactoryInterface;
use Imper86\OauthClient\Model\Token;
use Imper86\OauthClient\Model\TokenInterface;
use Psr\Http\Message\ResponseInterface;

class TokenFactory implements TokenFactoryInterface
{
    public function createFromResponse(
        string $grantType,
        ResponseInterface $response,
        ?TokenInterface $oldToken = null
    ): TokenInterface
    {
        $data = json_decode($response->getBody()->__toString(), true);

        if (empty($data['refresh_token']) && $oldToken) {
            $data['refresh_token'] = $oldToken->getRefreshToken();
        }

        return new Token([
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'],
            'expiry_time' => time()+$data['expires_in'],
            'resource_owner_id' => $data['data']['gid'],
            'grant_type' => $grantType,
        ]);
    }
}
