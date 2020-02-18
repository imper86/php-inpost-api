# Immi.shop API PHP SDK

## Installation

Just use composer:
```sh
composer require imper86/php-immi-api
```

## Authentication
Library has a bunch of mechanisms that allows you to forget about
tokens, expirations etc. But in order to start using it you must
authorize user using Oauth flow.

Create Credentials object:
```php
use Imper86\OauthClient\Model\Credentials;

$credentials = new Credentials([
    'client_id' => 'your_client_id',
    'client_secret' => 'your_client_secret',
    'redirect_uri' => 'http://localhost:8000/immi',
]);
```

Create TokenRepository object:
```php
use Imper86\OauthClient\Repository\FileTokenRepository;

$tokenRepository = new FileTokenRepository(__DIR__ . '/immi_tokens');
```

You can invent your own TokenRepository, just implement
[TokenRepositoryInterface](https://github.com/imper86/php-oauth2-client/blob/master/src/Repository/TokenRepositoryInterface.php).
You can use your DB, Redis, or anything you want.

Create client:
```php
use Imper86\ImmiApi\Immi;

$client = new Immi($credentials, $tokenRepository);
```

Get the authorization URL, and redirect your user:
```php
$state = 'your-random-secret-state';
header(sprintf('Location: %s', $client->oauth2()->getAuthorizationUrl($state)));
```

After successfull authorization, user will be redirected to your
**redirect_uri** with *state* and *code* parameters.

Verify the state and fetch token:
```php
if ($state === $_GET['state'] ?? null) {
    throw new Exception('CSRF?!');
}

$token = $client->oauth2()->fetchToken($_GET['code']);
```

Library will use your TokenRepository to store the token, and from
now on you should only care about storing user's Asana gid.

You can get that id with:
```php
$token->getResourceOwnerId();
```

## Usage
You can use client instantiated in auth part. To authorize requests you got many options.
Easiest option is to use [imper86/autotoken-plugin](https://github.com/imper86/autotoken-plugin)

```php
use Imper86\AutoTokenPlugin\AutoTokenPlugin;

$client->addPlugin(new AutoTokenPlugin($token->getResourceOwnerId(), $tokenRepository, $client->oauth2()));
```

You can also use HTTPlug built-in BearerPlugin, just like that:
```php
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Message\Authentication\Bearer;

$client->addPlugin(new AuthenticationPlugin(new Bearer($token->getAccessToken())));
```

From now you can use these methods on $client:
```php
$client->attributes()->(...)
$client->carts()->(...)
$client->commands()->(...)
$client->contactRequests()->(...)
$client->countries()->(...)
$client->orders()->(...)
$client->products()->(...)
$client->users()->(...)
```

Fast example:
```php
use Imper86\OauthClient\Model\Credentials;
use Imper86\OauthClient\Repository\FileTokenRepository;
use Imper86\ImmiApi\Immi;
use Imper86\AutoTokenPlugin\AutoTokenPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;

$credentials = new Credentials([
    'client_id' => 'verysecretclientid',
    'client_secret' => 'yourverysecretsecret',
    'redirect_uri' => 'http://localhost:8000/immiapi',
]);
$tokenRepository = new FileTokenRepository('/tmp');
$client = new Immi($credentials, $tokenRepository);
$client->addPlugin(new AutoTokenPlugin('userid', $tokenRepository, $client->oauth2()));
$client->addPlugin(new ErrorPlugin());

var_dump($client->attributes()->options()->translations()->get('xfg-asdf'));
```

If you use IDE with typehinting such as PHPStorm, you'll easily 
figure it out. If not, please 
[take a look in Resource directory](src/Resource)

## Contributing
Any help will be very appreciated.
