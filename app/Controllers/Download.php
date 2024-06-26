<?php
namespace App\Controllers;

use App\Models\AllianceFileModel;
use CodeIgniter\Files\File;
use App\Models\BoardModel;
use App\Models\BoardFileModel;

class Download extends BaseController
{
    /*파일 다운로드 */
    public function downloadFile($id){
        // 파일 정보 가져오기
        $fileModel = new BoardFileModel();
        $file = $fileModel->where('id', $id)->first();

        if (!$file) {
            echo "파일을 찾을 수 없습니다." . $id;
            echo ROOTPATH . $file['file_path'] . '/' . $file['file_name'];
            return;
        }

        // 파일 경로 설정
        $filePath = ROOTPATH . $file['file_path'] . '/' . $file['file_name'];

        // 파일이 존재하는지 확인
        if (!file_exists($filePath)) {
            echo "파일을 찾을 수 없습니다.";
            return;
        }

        // 파일 다운로드 설정
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file['org_name'] . '"');
        header('Content-Length: ' . filesize($filePath));

        readfile($filePath);
    }

    /*파일 다운로드 */
    public function downloadCeonumFile($id){
        // 파일 정보 가져오기
        $id = intval($id);
        $fileModel = new AllianceFileModel();
        $file = $fileModel->where('idx', $id)->first();

        if (!$file) {
            echo "파일을 찾을 수 없습니다." . $id;
            echo ROOTPATH . $file['file_path'] . '/' . $file['file_name'];
            return;
        }

        // 파일 경로 설정
        $filePath = ROOTPATH . $file['file_path'] . '/' . $file['file_name'];

        // 파일이 존재하는지 확인
        if (!file_exists($filePath)) {
            echo "파일을 찾을 수 없습니다.";
            return;
        }

        // 파일 다운로드 설정
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file['org_name'] . '"');
        header('Content-Length: ' . filesize($filePath));
        var_dump($filePath);
        readfile($filePath);
    }
}



?>