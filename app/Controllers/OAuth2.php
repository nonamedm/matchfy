<?php

namespace App\Controllers;

use App\Models\MemberModel;
use League\OAuth2\Client\Provider\GenericProvider;
use CodeIgniter\HTTP\RedirectResponse;

class OAuth2 extends BaseController
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new GenericProvider([
            'clientId'                => 'dfeedb645765a4f5e27cfb8dda43a2c8',    // 카카오에서 제공한 클라이언트 ID
            'clientSecret'            => '1LPjzMoxVrJjMqQ8AyW4UcqccZidHm5f', // 클라이언트 시크릿, 필요 없으면 생략 가능
            'redirectUri'             => 'http://localhost:8081/auth/kakao/callback',
            'urlAuthorize'            => 'https://kauth.kakao.com/oauth/authorize',
            'urlAccessToken'          => 'https://kauth.kakao.com/oauth/token',
            'urlResourceOwnerDetails' => null
        ]);
    }

    public function login()
    {
        $authorizationUrl = $this->provider->getAuthorizationUrl();
        session()->set('oauth2state', $this->provider->getState());
        return redirect()->to($authorizationUrl);
    }

    public function callback()
    {
        $state = $this->request->getVar('state');
        $code = $this->request->getVar('code');

        if (empty($state) || ($state !== session()->get('oauth2state'))) {
            session()->remove('oauth2state');
            return redirect()->to('/error')->with('message', 'Invalid state');
        }

        try {
            $accessToken = $this->provider->getAccessToken('authorization_code', [
                'code' => $code
            ]);
            $userDetails = $this->getUserDetails($accessToken);

            $memberModel = new MemberModel();
            $user = $memberModel->findByKakaoId($userDetails['id']);
            
            if ($user) {
                //session()->set('user', $user);
                return redirect()->to('/mo');
            } else {
                print_r($userDetails);
                print_r($userDetails['id']);
                print_r($userDetails['properties']['nickname']);
                return redirect()->to("/mo/pass")->with('data', [
                     'nickname' => $userDetails['properties']['nickname'], 
                     'sns_type' => 'kakao'
                 ]);
            }
            //moveToUrl('/mo/mypage');
        } catch (\Exception $e) {
            //return redirect()->to('/error')->with('message', 'Error: ' . $e->getMessage());
        }
    }

    public function getUserDetails($accessToken)
    {
        $request = $this->provider->getAuthenticatedRequest(
            'GET',
            'https://kapi.kakao.com/v2/user/me',  // 카카오 사용자 정보 API
            $accessToken
        );
        $response = $this->provider->getParsedResponse($request);
        if (!array_key_exists('id', $response)) {
            log_message('error', 'Failed to retrieve user details.');
            throw new \RuntimeException('Failed to retrieve user details.');
        }
        return $response;
    }
}
