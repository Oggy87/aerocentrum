<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */



/**
 * Users authenticator.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class UsersModel extends BaseModel implements IAuthenticator
{

	/**
	 * Performs an authentication
	 * @param  array
	 * @return Identity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($email, $password) = $credentials;
                $user = self::$notORM->user[array('email' => $email)];

		if (!$user) {
			throw new AuthenticationException("Uživatel '$email' nebyl nalezen.", self::IDENTITY_NOT_FOUND);
		}

                $config = Environment::getConfig('security');
                $password =  hash_hmac('sha256', $credentials[self::PASSWORD] . $user['salt'] , $config->hmacKey);

		if ($user['password'] !== $password) {
			throw new AuthenticationException("Špatné heslo.", self::INVALID_CREDENTIAL);
		}

		unset($user['password']);
                unset($user['salt']);

		return new Identity($user['id'], NULL, $user);
	}

}
