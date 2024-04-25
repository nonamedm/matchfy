<?php

namespace App\Controllers;

use App\Models\MemberModel;
use League\OAuth2\Client\Provider\GenericProvider;
use CodeIgniter\HTTP\RedirectResponse;

class OAuth2 extends BaseController
{
    protected $kakaoProvider;
    protected $naverProvider;

    public function __construct()
    {
        $kakaoClientId = $_SERVER['KAKAO_CLIENT_ID'];
        $kakaoClientSecret = $_SERVER['KAKAO_CLIENT_SECRET'];
        $naverClientId = $_SERVER['NAVER_CLIENT_ID'];
        $naverClientSecret = $_SERVER['NAVER_CLIENT_SECRET'];

        $this->kakaoProvider = new GenericProvider([
            'clientId'                => $kakaoClientId,
            'clientSecret'            => $kakaoClientSecret,
            'redirectUri'             => 'https://nonamedm18.mycafe24.com/auth/kakao/callback',
            'urlAuthorize'            => 'https://kauth.kakao.com/oauth/authorize',
            'urlAccessToken'          => 'https://kauth.kakao.com/oauth/token',
            'urlResourceOwnerDetails' => null
        ]);

        $this->naverProvider = new GenericProvider([
            'clientId'                => $naverClientId,
            'clientSecret'            => $naverClientSecret,
            'redirectUri'             => 'https://nonamedm18.mycafe24.com/auth/naver/callback',
            'urlAuthorize'            => 'https://nid.naver.com/oauth2.0/authorize',
            'urlAccessToken'          => 'https://nid.naver.com/oauth2.0/token',
            'urlResourceOwnerDetails' => null
        ]);
    }

    public function loginKakao()
    {
        $authorizationUrl = $this->kakaoProvider->getAuthorizationUrl();
        session()->set('oauth2state', $this->kakaoProvider->getState());
        session()->set('provider', 'kakao');
        return redirect()->to($authorizationUrl);
    }

    public function loginNaver()
    {
        $authorizationUrl = $this->naverProvider->getAuthorizationUrl();
        session()->set('oauth2state', $this->naverProvider->getState());
        session()->set('provider', 'naver');
        return redirect()->to($authorizationUrl);
    }

    public function callback()
    {
        $state = $this->request->getVar('state');
        $code = $this->request->getVar('code');
        $providerName = session()->get('provider');
        print_r("Provider from request: " . $providerName . "\n");

        if (empty($state) || ($state !== session()->get('oauth2state'))) {
            session()->remove('oauth2state');
            session()->remove('provider');
            return redirect()->to('/error')->with('message', 'Invalid state');
        }

        try {
            $provider = $providerName === 'naver' ? $this->naverProvider : $this->kakaoProvider;
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $code
            ]);
            print_r("AccessToken : " . json_encode($accessToken) . "\n");  // 토큰 정보 출력

            $userDetails = $this->getUserDetails($accessToken, $provider);
            print_r("userDetails : " . $userDetails . "\n");

            $memberModel = new MemberModel();
            $user = $memberModel->findByOauthId($userDetails['id'], $providerName);

            if ($user) {
                $session = session();
                $session->set([
                    'ci' => $user['ci'],
                    'name' => $user['name'],
                    'isLoggedIn' => true //로그인 상태
                ]);
                $session->setTempdata('ci', $user['ci'], 2592000);
                return redirect()->to('https://nonamedm18.mycafe24.com');
            } else {
                if ($providerName === 'naver') {
                    $postData = [
                        'nickname' => $userDetails['nickname'],
                        'sns_type' => $providerName,
                        'oauth_id' => $userDetails['id'],
                        'email' => $userDetails['email']
                        //profile_image
                    ];
                } elseif ($providerName === 'kakao') {
                    $postData = [
                        'nickname' => $userDetails['properties']['nickname'],
                        'sns_type' => $providerName,
                        'oauth_id' => $userDetails['id']
                        //profile_image_url
                    ];
                }
                return view('mo_pass', $postData);
            }
        } catch (\Exception $e) {
            return redirect()->to('/error')->with('message', 'Error: ' . $e->getMessage());
        }
    }

    public function getUserDetails($accessToken, $provider)
    {
        $url = $provider === $this->naverProvider ? 'https://openapi.naver.com/v1/nid/me' : 'https://kapi.kakao.com/v2/user/me';
        $request = $provider->getAuthenticatedRequest(
            'GET',
            $url,
            $accessToken
        );
        $response = $provider->getParsedResponse($request);

        if ($provider === $this->naverProvider) {
            if (!isset($response['response']) || !array_key_exists('id', $response['response'])) {
                log_message('error', 'Failed to retrieve Naver user details: ' . json_encode($response));
                throw new \RuntimeException('Failed to retrieve Naver user details.');
            }
            return $response['response'];
        }

        if ($provider === $this->kakaoProvider) {
            if (!array_key_exists('id', $response)) {
                log_message('error', 'Failed to retrieve Kakao user details: ' . json_encode($response));
                throw new \RuntimeException('Failed to retrieve Kakao user details.');
            }
            return $response;
        }
    }
}
