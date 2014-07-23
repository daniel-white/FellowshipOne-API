<?php


/**
 * F1 API
 * @author Daniel Boorn - daniel.boorn@gmail.com
 * @copyright Daniel Boorn
 * @license Creative Commons Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)
 * @namespace F1
 */

namespace F1\OAuth;

const HTTP_METHOD_GET = 'GET';
const HTTP_METHOD_POST = 'POST';
const HTTP_METHOD_PUT = 'PUT';

const SIG_METHOD_HMACSHA1 = 'SIG_METHOD_HMACSHA1';

const AUTH_TYPE_AUTHORIZATION = 0;


class Exception extends \Exception
{
	private $response;

	public function __construct($message, $code = 0, $response = null, $previous = null)
	{
		parent::__construct($message, $code, $previous);
		$this->response = $response;
	}

	public function getResponse()
    {
        return $this->response;
    }

}

abstract class AbstractClient {
	public function __construct($consumer_key, $consumer_secret, $signature_method = SIG_METHOD_HMACSHA1, $auth_type = AUTH_TYPE_AUTHORIZATION) {

	}

	public abstract function disableSSLChecks();

	public abstract function fetch($protected_resource_url, $extra_parameters = null, $http_method = null, $http_headers = null);

	public abstract function setToken($token, $token_secret);

	public abstract function getAccessToken($access_token_url, $auth_session_handle = null, $verifier_token = null)

	public abstract function getLastResponse();

	public abstract function getLastResponseHeaders();
}

