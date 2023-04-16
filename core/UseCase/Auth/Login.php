<?php


namespace Core\UseCase\Auth;

use Core\Exception\BusinessModel\NotFoundException;
use Core\Port\Helper\AuthenticatorInterface;
use Core\Port\Helper\PasswordInterface;
use Core\Port\Helper\TokenInterface;
use Core\Port\Service\User\RepositoryInterface;
use Core\UseCase\Auth\Login\OutputDTO;

class Login
{
    private AuthenticatorInterface $authenticator;
    private TokenInterface $tokenInterface;
    private PasswordInterface $passwordInterface;

    /**
     * Login constructor.
     * @param AuthenticatorInterface $authenticator
     * @param TokenInterface $tokenInterface
     * @param PasswordInterface $passwordInterface
     */
    public function __construct(AuthenticatorInterface $authenticator, TokenInterface $tokenInterface, PasswordInterface $passwordInterface)
    {
        $this->authenticator = $authenticator;
        $this->tokenInterface = $tokenInterface;
        $this->passwordInterface = $passwordInterface;
    }

    /**
     * @param string $email
     * @param string $password
     * @return OutputDTO
     * @throws NotFoundException
     */
    public function execute(string $email, string $password): OutputDTO
    {
        $token = null;
        $message = null;
        try {
            if ($this->authenticator->attempt($email, $password)) {
                $token = $this->tokenInterface->createToken($this->authenticator->getUser());
            } else {
                $message = "Password mismatch";
            }
        } catch (\Throwable $e) {
            $message = "User does not exist";
        } catch (\Exception $exception) {
            throw new NotFoundException($exception->getMessage(), $exception->getCode(), $exception);
        }
        return new OutputDTO($token !== null, $token, $message);
    }
}
