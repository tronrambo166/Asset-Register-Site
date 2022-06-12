<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AVWUTV3qTny3ery6ATXwxJrBu6ywx8fPeSkZEiWHST5XBclsvTyJVi6oaKzk5rzzANP4lUtzv4-AAtCh',
    'client_secret' => 'ECdroBh4WGqrLVex_TtaVWLHeCSeQO6gWEf0Br3gqkteNrUOoi0gaIlnWX0BINA6l3VaoSCxhDA5Gs8u',
    'return_url' => 'http://localhost/Php_Projects/paypal_test/response.php',
    'cancel_url' => 'http://localhost/Php_Projects/paypal_test/response.php'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'paypal_test'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}