<?php
namespace App\Helpers;

class MoHelper
{
    public function generateRandomString(int $length = 16): string
    {
        // random_bytes 난수 생성
        $randomBytes = random_bytes($length);

        // 16진수 문자열
        $randomString = bin2hex($randomBytes);

        // 반환
        return substr($randomString, 0, $length);
    }
}

?>