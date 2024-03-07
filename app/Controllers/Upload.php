<?php
namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Helpers\MoHelper;

class Upload extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('upload_form', ['errors' => []]);
    }

    public function upload()
    {
        // 파일 가져오기 -> input name 지정
        $file = $this->request->getFile('file');
        // 파일이 올바르게 업로드되었는지 확인
        if ($file && $file->isValid() && !$file->hasMoved())
        {

            // 파일명 가져오기 -> 확장자 분리
            $orgName = $file->getClientName();
            $ext = $file->getClientExtension();

            // 난수생성
            $newName = $file->getRandomName();

            // 데이터 저장
            $postData['org_name'] = $orgName;
            $postData['ext'] = $ext;
            $postData['file_name'] = $newName;
            $uploadDir = 'uploads/file';
            $postData['file_path'] = $uploadDir;


            $file->move(WRITEPATH . $uploadDir, $newName);
        } else
        {
            $postData['fail'] = '파일전송 실패';
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'upload success', 'data' => $postData]);
    }
}


?>