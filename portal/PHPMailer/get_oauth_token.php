<?php
<<<<<<< HEAD
/**
 * Get an OAuth2 token from Google.
 * * Install this script on your server so that it's accessible
 * as [https/http]://<yourdomain>/<folder>/get_oauth_token.php
 * e.g.: http://localhost/phpmail/get_oauth_token.php
 * * Ensure dependencies are installed with 'composer install'
 * * Set up an app in your Google developer console
 * * Set the script address as the app's redirect URL
 * If no refresh token is obtained when running this file, revoke access to your app
 * using link: https://accounts.google.com/b/0/IssuedAuthSubTokens and run the script again.
 * This script requires PHP 5.4 or later
 * PHP Version 5.4
 */

namespace League\OAuth2\Client\Provider;

require 'vendor/autoload.php';

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

session_start();

//If this automatic URL doesn't work, set it yourself manually
$redirectUri = isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//$redirectUri = 'http://localhost/phpmailer/get_oauth_token.php';

//These details obtained are by setting up app in Google developer console.
$clientId = 'RANDOMCHARS-----duv1n2.apps.googleusercontent.com';
$clientSecret = 'RANDOMCHARS-----lGyjPcRtvP';

class Google extends AbstractProvider
{
    use BearerAuthorizationTrait;

    const ACCESS_TOKEN_RESOURCE_OWNER_ID = 'id';

    /**
     * @var string If set, this will be sent to google as the "access_type" parameter.
     * @link https://developers.google.com/accounts/docs/OAuth2WebServer#offline
     */
    protected $accessType;

    /**
     * @var string If set, this will be sent to google as the "hd" parameter.
     * @link https://developers.google.com/accounts/docs/OAuth2Login#hd-param
     */
    protected $hostedDomain;

    /**
     * @var string If set, this will be sent to google as the "scope" parameter.
     * @link https://developers.google.com/gmail/api/auth/scopes
     */
    protected $scope;

    public function getBaseAuthorizationUrl()
    {
        return 'https://accounts.google.com/o/oauth2/auth';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://accounts.google.com/o/oauth2/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
	return ' ';
    }

    protected function getAuthorizationParameters(array $options)
    {
	if (is_array($this->scope)) {
            $separator = $this->getScopeSeparator();
            $this->scope = implode($separator, $this->scope);
        }

        $params = array_merge(
            parent::getAuthorizationParameters($options),
            array_filter([
                'hd'          => $this->hostedDomain,
                'access_type' => $this->accessType,
		'scope'       => $this->scope,
                // if the user is logged in with more than one account ask which one to use for the login!
                'authuser'    => '-1'
            ])
        );
        return $params;
    }

    protected function getDefaultScopes()
    {
        return [
            'email',
            'openid',
            'profile',
        ];
    }

    protected function getScopeSeparator()
    {
        return ' ';
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (!empty($data['error'])) {
            $code  = 0;
            $error = $data['error'];

            if (is_array($error)) {
                $code  = $error['code'];
                $error = $error['message'];
            }

            throw new IdentityProviderException($error, $code, $data);
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new GoogleUser($response);
    }
}


//Set Redirect URI in Developer Console as [https/http]://<yourdomain>/<folder>/get_oauth_token.php
$provider = new Google(
    array(
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'redirectUri' => $redirectUri,
        'scope' => array('https://mail.google.com/'),
	'accessType' => 'offline'
    )
);

if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
} else {
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken(
        'authorization_code',
        array(
            'code' => $_GET['code']
        )
    );

    // Use this to get a new access token if the old one expires
    echo 'Refresh Token: ' . $token->getRefreshToken();
=======

/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5
 * @package PHPMailer
 * @see https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2020 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Get an OAuth2 token from an OAuth2 provider.
 * * Install this script on your server so that it's accessible
 * as [https/http]://<yourdomain>/<folder>/get_oauth_token.php
 * e.g.: http://localhost/phpmailer/get_oauth_token.php
 * * Ensure dependencies are installed with 'composer install'
 * * Set up an app in your Google/Yahoo/Microsoft account
 * * Set the script address as the app's redirect URL
 * If no refresh token is obtained when running this file,
 * revoke access to your app and run the script again.
 */

namespace PHPMailer\PHPMailer;

/**
 * Aliases for League Provider Classes
 * Make sure you have added these to your composer.json and run `composer install`
 * Plenty to choose from here:
 * @see http://oauth2-client.thephpleague.com/providers/thirdparty/
 */
//@see https://github.com/thephpleague/oauth2-google
use League\OAuth2\Client\Provider\Google;
//@see https://packagist.org/packages/hayageek/oauth2-yahoo
use Hayageek\OAuth2\Client\Provider\Yahoo;
//@see https://github.com/stevenmaguire/oauth2-microsoft
use Stevenmaguire\OAuth2\Client\Provider\Microsoft;
//@see https://github.com/greew/oauth2-azure-provider
use Greew\OAuth2\Client\Provider\Azure;

if (!isset($_GET['code']) && !isset($_POST['provider'])) {
    ?>
<html>
<body>
<form method="post">
    <h1>Select Provider</h1>
    <input type="radio" name="provider" value="Google" id="providerGoogle">
    <label for="providerGoogle">Google</label><br>
    <input type="radio" name="provider" value="Yahoo" id="providerYahoo">
    <label for="providerYahoo">Yahoo</label><br>
    <input type="radio" name="provider" value="Microsoft" id="providerMicrosoft">
    <label for="providerMicrosoft">Microsoft</label><br>
    <input type="radio" name="provider" value="Azure" id="providerAzure">
    <label for="providerAzure">Azure</label><br>
    <h1>Enter id and secret</h1>
    <p>These details are obtained by setting up an app in your provider's developer console.
    </p>
    <p>ClientId: <input type="text" name="clientId"><p>
    <p>ClientSecret: <input type="text" name="clientSecret"></p>
    <p>TenantID (only relevant for Azure): <input type="text" name="tenantId"></p>
    <input type="submit" value="Continue">
</form>
</body>
</html>
    <?php
    exit;
}

require 'vendor/autoload.php';

session_start();

$providerName = '';
$clientId = '';
$clientSecret = '';
$tenantId = '';

if (array_key_exists('provider', $_POST)) {
    $providerName = $_POST['provider'];
    $clientId = $_POST['clientId'];
    $clientSecret = $_POST['clientSecret'];
    $tenantId = $_POST['tenantId'];
    $_SESSION['provider'] = $providerName;
    $_SESSION['clientId'] = $clientId;
    $_SESSION['clientSecret'] = $clientSecret;
    $_SESSION['tenantId'] = $tenantId;
} elseif (array_key_exists('provider', $_SESSION)) {
    $providerName = $_SESSION['provider'];
    $clientId = $_SESSION['clientId'];
    $clientSecret = $_SESSION['clientSecret'];
    $tenantId = $_SESSION['tenantId'];
}

//If you don't want to use the built-in form, set your client id and secret here
//$clientId = 'RANDOMCHARS-----duv1n2.apps.googleusercontent.com';
//$clientSecret = 'RANDOMCHARS-----lGyjPcRtvP';

//If this automatic URL doesn't work, set it yourself manually to the URL of this script
$redirectUri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//$redirectUri = 'http://localhost/PHPMailer/redirect';

$params = [
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri' => $redirectUri,
    'accessType' => 'offline'
];

$options = [];
$provider = null;

switch ($providerName) {
    case 'Google':
        $provider = new Google($params);
        $options = [
            'scope' => [
                'https://mail.google.com/'
            ]
        ];
        break;
    case 'Yahoo':
        $provider = new Yahoo($params);
        break;
    case 'Microsoft':
        $provider = new Microsoft($params);
        $options = [
            'scope' => [
                'wl.imap',
                'wl.offline_access'
            ]
        ];
        break;
    case 'Azure':
        $params['tenantId'] = $tenantId;

        $provider = new Azure($params);
        $options = [
            'scope' => [
                'https://outlook.office.com/SMTP.Send',
                'offline_access'
            ]
        ];
        break;
}

if (null === $provider) {
    exit('Provider missing');
}

if (!isset($_GET['code'])) {
    //If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl($options);
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
    //Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    unset($_SESSION['provider']);
    exit('Invalid state');
} else {
    unset($_SESSION['provider']);
    //Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken(
        'authorization_code',
        [
            'code' => $_GET['code']
        ]
    );
    //Use this to interact with an API on the users behalf
    //Use this to get a new access token if the old one expires
    echo 'Refresh Token: ', $token->getRefreshToken();
>>>>>>> 5baa88f (final commit)
}
