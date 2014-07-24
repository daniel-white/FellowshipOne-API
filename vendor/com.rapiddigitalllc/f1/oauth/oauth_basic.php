<?php

/**
 * F1 API
 * @author Daniel Boorn - daniel.boorn@gmail.com
 * @copyright Daniel Boorn
 * @license Creative Commons Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)
 * @namespace F1
 */

namespace F1\OAuth;

require_once(__DIR__.'/oauth_interfaces.php');



class Client extends AbstractClient {
	private $native_client;

	public function __construct($consumer_key, $consumer_secret, $signature_method = SIG_METHOD_HMACSHA1, $auth_type = AUTH_TYPE_AUTHORIZATION) {
		try {
			$native_client = \OAuth(
				$consumer_key,
				$consumer_secret,
				$sig_methods[$signature_method],
				$auth_types[$auth_type]
			)
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), null, $e);
		}
	}

	public function disableSSLChecks() {
		try {
			return $native_client->disableSSLChecks();
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), null, $e);
		}
	}

	public function fetch($protected_resource_url, $extra_parameters = null, $http_method = null, $http_headers = null) {
		try {
			return $native_client->fetch(
				$protected_resource_url,
				$extra_parameters,
				$http_methods[$http_method],
				$http_headers
			);
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), $native_client->getLastResponse(), $e);
		}
	}

	public function setToken($token, $token_secret) {
		try {
			return $native_client->setToken($token, $token_secret);
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), null, $e);
		}
	}

	public function getAccessToken($access_token_url, $auth_session_handle = null, $verifier_token = null) {
		try {
			return $native_client->getAccessToken($access_token_url, $auth_session_handle, $verifier_token);
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), $native_client->getlastResponse(), $e);
		}
	}

	public function getLastResponse() {
		try {
			return $native_client->getLastResponse();
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), null, $e);
		}
	}

	public function getLastResponseHeaders() {
		try {
			return $native_client->getLastResponseHeaders();
		}
		catch (\Exception $e) {
			throw new Exception($e->getMessage(), $e->getCode(), null, $e);
		}
	}
}