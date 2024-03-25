<?php
namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Helpers\MoHelper;
use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\MeetingFileModel;

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
        // 파일명 가져오기 -> 확장자 분리
        $orgName = $file->getClientName();
        $ext = $file->getClientExtension();
        
        // 난수생성
        $newName = $file->getRandomName();
        
        // 데이터 저장
        $postData['org_name'] = $orgName;
        $postData['ext'] = $ext;
        $postData['file_name'] = $newName;
        $uploadDir = 'static/files/uploads/';
        $postData['file_path'] = $uploadDir;

        // 파일이 올바르게 업로드되었는지 확인
        if ($file && $file->isValid() && !$file->hasMoved())
        {
            $file->move(ROOTPATH.$uploadDir, $newName);
            // $file->move(WRITEPATH . $uploadDir, $newName);
        } else
        {
            $postData['fail'] = '파일전송 실패';
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'upload success', 'data' => $postData]);
    }

    public function Boardupload($file,$boardTable,$boardType,$title,$content)
    {                      
        // 파일 가져오기 -> input name 지정
        // $file = $this->request->getFile('file');
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
            $uploadDir = 'static/files/uploads/';
            $postData['file_path'] = $uploadDir;


            $file->move(ROOTPATH.$uploadDir, $newName);
            // $file->move(WRITEPATH . $uploadDir, $newName);

            //테이블 데이터 삽입
            $BoardModel = new BoardModel();
            $BoardModel->setTableName($boardTable);

            $data = [
                'title' => $title,
                'content' => $content,
                'author' => 'admin', //일단 admin 으로 추가해둠
                'board_type' => $boardType,
                'used' => 1
            ];
            $boardId = $BoardModel->insert($data);

            //삽입된 데이터가 있을 경우 파일 데이터 추가
            if ($boardId) {
                
                $data = [
                    'file_name' => $newName,
                    'file_path' => $uploadDir,
                    'org_name'  => $orgName,
                    'ext' => $ext,
                    'upload_date' => date('Y-m-d H:i:s'),
                    'board_idx' => $boardId,
                    'board_type' => $boardType
                ];
                
                $fileModel = new BoardFileModel();
                $fileModel->saveFileUpload($data);
                   
        } else{
            $postData['fail'] = '파일전송 실패';
        }
        return $postData;
        }
    }

    public function BoardUpdate($newfile, $boardTable,$boardType, $title, $content, $boardId,$fileId,$fileType)
    {
        // 파일 가져오기 -> input name 지정
        // $file = $this->request->getFile('file');
        // 파일이 올바르게 업로드되었는지 확인
      
        if ($newfile && $newfile->isValid() && !$newfile->hasMoved()) {
            // 파일명 가져오기 -> 확장자 분리
            $orgName = $newfile->getClientName();
            $ext = $newfile->getClientExtension();

            // 난수생성
            $newName = $newfile->getRandomName();

            // 데이터 저장
            $postData['org_name'] = $orgName;
            $postData['ext'] = $ext;
            $postData['file_name'] = $newName;
            $uploadDir = 'static/files/uploads/';
            $postData['file_path'] = $uploadDir;

            $newfile->move(ROOTPATH.$uploadDir, $newName);
            // $newfile->move(WRITEPATH . $uploadDir, $newName);

            //테이블 데이터 갱신
            $BoardModel = new BoardModel();
            $BoardModel->setTableName($boardTable);

            $data = [
                'title' => $title,
                'content' => $content,
                'author' => 'admin',
                'used' => 1
            ];
           
            $BoardModel->update($boardId, $data);
            $fileModel = new BoardFileModel();
            
            if($fileType=='newFile'){
                $data = [
                    'file_name' => $newName,
                    'file_path' => $uploadDir,
                    'org_name'  => $orgName,
                    'ext' => $ext,
                    'upload_date' => date('Y-m-d H:i:s'),
                    'board_idx' => $boardId,
                    'board_type' => $boardType
                ];
                
                $fileModel = new BoardFileModel();
                $fileModel->saveFileUpload($data);
            }else{
                $fileData = [
                    'file_name' => $newName,
                    'file_path' => $uploadDir,
                    'org_name'  => $orgName,
                    'ext' => $ext,
                    'upload_date' => date('Y-m-d H:i:s')
                ];
    
                $fileModel->update(['id' => $fileId], $fileData);
            }
            
            return $postData;

        } else {
            $postData['fail'] = '파일전송 실패';
            return $postData;
        }
    }

    public function meetingUpload($file, $meeting_idx, $member_ci)
    {                      
        if ($file && $file->isValid() && !$file->hasMoved())
        {
            // 파일명 가져오기 및 확장자 분리
            $orgName = $file->getClientName();
            $ext = $file->getClientExtension();
            
            // 난수생성 (새 파일명 할당)
            $newName = $file->getRandomName();

            //파일이동
            $file->move(ROOTPATH.$uploadDir, $newName);

            // 데이터 저장
            $postData['org_name'] = $orgName;
            $postData['ext'] = $ext;
            $postData['file_name'] = $newName;
            $uploadDir = 'static/files/uploads/';
            $postData['file_path'] = $uploadDir;

            //삽입된 데이터가 있을 경우 파일 데이터 추가
            if ($meeting_idx) {
                
                $data = [
                    'member_ci' => $member_ci,
                    'meeting_idx' => $meeting_idx,
                    'file_path' => $uploadDir,
                    'file_name' => $newName,
                    'org_name'  => $orgName,
                    'ext' => $ext,
                    //'upload_date' => date('Y-m-d H:i:s'),
                ];
                
                $MeetingFileModel = new MeetingFileModel();
                $meetingFileIdx = $MeetingFileModel->insert($data);
                   
            } else{
                $postData['fail'] = '파일전송 실패';
            }
            return $postData;
        }
    }

}



?>