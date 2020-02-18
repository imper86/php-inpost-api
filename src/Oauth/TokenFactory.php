<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:57
 */

namespace Imper86\ImmiApi\Oauth;

use Imper86\OauthClient\Factory\TokenFactoryInterface;
use Imper86\OauthClient\Model\Token;
use Imper86\OauthClient\Model\TokenInterface;
use Lcobucci\JWT\Parser;
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

        $idToken = !empty($data['id_token']) ? (new Parser())->parse($data['id_token']) : null;

        return new Token([
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'] ?? null,
            'expiry_time' => time()+$data['expires_in'],
            'resource_owner_id' => $idToken ? $idToken->getClaim('uid') : null,
            'grant_type' => $grantType,
        ]);
    }
}
