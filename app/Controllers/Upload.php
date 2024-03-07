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
        $file = $this->request->getFiles();
        // 파일이 올바르게 업로드되었는지 확인
        if ($file && $file[0]->isValid() && !$file[0]->hasMoved())
        {
            
            // 파일명 가져오기 -> 확장자 분리
            $orgName = $file[0]->getClientName();
            $ext = $file[0]->getClientExtension();

            // 난수생성
            $newName = $file[0]->getRandomName();

            // 데이터 저장
            $postData['org_name'] = $orgName;
            $postData['ext'] = $ext;
            $postData['file_name'] = $newName . '.' . $ext;
            $uploadDir = 'uploads/file';
            $postData['file_path'] = $uploadDir;


            $file[0]->move(WRITEPATH . $uploadDir, $newName);
        } else {
            $postData['file_path'] = '나가리';
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'upload success', 'data' => $postData]);
    }
    public function uploadMulty()
    {
        // 파일 가져오기 -> input name 지정
        $files = $this->request->getFiles();
        // 파일이 올바르게 업로드되었는지 확인
        if ($files)
        {
            foreach ($files['input_name'] as $file) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads/file', $newName);
                }
            }


        }
    }
}


?>