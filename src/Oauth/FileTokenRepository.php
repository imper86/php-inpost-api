<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\Token;
use Imper86\PhpAllegroApi\Model\TokenInterface;

class FileTokenRepository implements TokenRepositoryInterface
{
    /**
     * @var string
     */
    private $identifier;
    /**
     * @var string
     */
    private $workDir;

    public function __construct(string $identifier, string $workDir)
    {
        $this->identifier = $identifier;
        $this->workDir = $workDir;
    }

    public function load(): ?TokenInterface
    {
        if (!file_exists($this->getPath())) {
            return null;
        }

        $raw = json_decode(file_get_contents($this->getPath()), true);

        return new Token($raw);
    }

    public function save(TokenInterface $token): void
    {
        file_put_contents($this->getPath(), json_encode($token->serialize()));
    }

    private function getPath(): string
    {
        return sprintf('%s/%s.json', $this->workDir, $this->identifier);
    }
}