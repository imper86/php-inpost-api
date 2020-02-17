# Asana API PHP SDK

## Installation

Just use composer:
```sh
composer require imper86/php-asana-api
```

## Authentication
Library has a bunch of mechanisms that allows you to forget about
tokens, expirations etc. But in order to start using it you must
authorize user using Oauth flow.

Create Credentials object:
```php
$credentials = new Credentials(
    'your_client_id',
    'your_client_secret',
    'http://localhost:8000/asana' //redirect_uri
);
```

Create TokenRepository object:
```php
$tokenRepository = new FileTokenRepository(__DIR__ . '/asana_tokens');
```

You can invent your own TokenRepository, just implement
[TokenRepositoryInterface](src/Service/TokenRepositoryInterface.php).
You can use your DB, Redis, or anything you want.

Create client:
```php
$client = new Client($credentials, $tokenRepository);
```

Get the authorization URL, and redirect your user:
```php
$state = 'your-random-secret-state';
header(sprintf('Location: %s', $client->auth()->authUri($state)));
```

After successfull authorization, user will be redirected to your
**redirect_uri** with *state* and *code* parameters.

Verify the state and authenticate your Client:
```php
if ($state === $_GET['state'] ?? null) {
    throw new Exception('CSRF?!');
}

$client->authenticateWithCode($_GET['code']);
```

Library will use your TokenRepository to store the token, and from
now on you should only care about storing user's Asana gid.

You can get that id with:
```php
$client->getUserGid();
```

## Usage
Just like in Auth part, create client:
```php
$userGid = 'your-user-gid';
$client = new Client($credentials, $tokenRepository, $userGid);
```

From now you can use these methods on $client:
```php
$client->organizations()->(...)
$client->projects()->(...)
$client->sections()->(...)
$client->tags()->(...)
$client->tasks()->(...)
$client->teams()->(...)
$client->users()->(...)
$client->workspaces()->(...)
```

Fast example:
```php
$projects = $client->teams()->projects()->list('teamgid');
```

CRUD operations naming:
* list() - GET collection
* show() - GET item
* remove() - DELETE item
* update() - PUT item

If you use IDE with typehinting such as PHPStorm, you'll easily 
figure it out. If not, please 
[take a look in Resource directory](src/Resource)

## Contributing
Any help will be very appreciated.

This library is not finished, not all resources are covered.
