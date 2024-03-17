<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\MemberFileModel;
use App\Models\MemberFeedModel;
use App\Models\MemberFeedFileModel;
use App\Models\UniversityModel;
use App\Config\Encryption;

class MoAjax extends BaseController
{
    public function delCmt()
    {

        $postData = $this->request->getPost();

        // 특정 키의 POST 값만 받아오기
        $cmt_idx = $this->request->getPost('cmt_idx');
        $trgt_id = $this->request->getPost('trgt_id');
        $trgt_idx = $this->request->getPost('trgt_idx');

        if ($cmt_idx && $trgt_id && $trgt_idx)
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data processed successfully', 'result' => $postData]);
        }
    }

    public function login()
    {
        $mobile_no = $this->request->getPost('mobile_no');
        $auto_login = $this->request->getPost('auto_login', FILTER_VALIDATE_BOOLEAN);

        $MemberModel = new MemberModel();

        $user = $MemberModel->where('mobile_no', $mobile_no)->first();

        if ($user)
        {
            $session = session();
            $session->set([
                'ci' => $user['ci'],
                'name' => $user['name'],
                'isLoggedIn' => true //로그인 상태
            ]);

            if ($auto_login)
            {
                $session->setTempdata('ci', $user['ci'], 2592000);
            }

            return $this->response->setJSON(['status' => 'success', 'message' => "로그인 성공"]);
        } else
        {
            return $this->response->setJSON(['status' => 'error', 'message' => '일치하는 회원 정보가 없습니다.']);
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('ci');
        $session->remove('name');
        $session->remove('isLoggedIn');
        return $this->response->setJSON(['status' => 'success', 'message' => "로그아웃 성공"]);
    }

    public function signUp()
    {
        // 준회원 validation
        $rules = [
            'name' => [
                'label' => 'name',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => '이름을 입력해 주세요.',
                    'min_length' => '이름은 2글자 이상 입력해 주세요.'
                ]
            ],
            'birthday' => [
                'label' => 'birthday',
                'rules' => 'required|regex_match[/^(19|20)\d\d(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])$/]',
                'errors' => [
                    'required' => '생년월일을 입력해 주세요.',
                    'regex_match' => '생년월일은 YYYYMMDD 형식으로 입력해 주세요. 예) 20240101'
                ]
            ],
            'gender' => [
                'label' => 'gender',
                'rules' => 'required|in_list[M,F]', //'M'(남성) / 'F'(여성)
                'errors' => [
                    'required' => '성별을 선택해 주세요.',
                    'in_list' => '성별을 올바르게 선택해 주세요. M / F'
                ]
            ],
            'city' => [
                'label' => 'city',
                'rules' => 'required',
                'errors' => [
                    'required' => '지역을 입력해 주세요.',
                ]
            ],
            'town' => [
                'label' => 'town',
                'rules' => 'required',
                'errors' => [
                    'required' => '도시를 입력해 주세요.',
                ]
            ],
        ];

        if (!$this->validate($rules))
        {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        } else
        {
            // $postData = $this->request->getPost();

            $mobile_no = $this->request->getPost('mobile_no');
            $encrypter = \Config\Services::encrypter();
            $ci = base64_encode($encrypter->encrypt($mobile_no, ['key' => 'nonamedm', 'blockSize' => 32]));

            // $ci = $this->request->getPost('ci');
            $agree1 = $this->request->getPost('agree1');
            $agree2 = $this->request->getPost('agree2');
            $agree3 = $this->request->getPost('agree3');
            $name = $this->request->getPost('name');
            $birthday = $this->request->getPost('birthday');
            $gender = $this->request->getPost('gender');
            $city = $this->request->getPost('city');
            $town = $this->request->getPost('town');
            // $town = $encrypter->decrypt(base64_decode($ci), ['key' => 'nonamedm', 'blockSize' => 32]);

            $MemberModel = new MemberModel();

            $data = [
                'mobile_no' => $mobile_no,
                'ci' => $ci,
                'agree1' => $agree1,
                'agree2' => $agree2,
                'agree3' => $agree3,
                'name' => $name,
                'birthday' => $birthday,
                'gender' => $gender,
                'city' => $city,
                'town' => $town,
            ];

            // 데이터 저장
            $inserted = $MemberModel->insert($data);

            // 회원가입 완료 되었을 떄
            if ($inserted)
            {
                // 프로필 사진 DB 업로드
                $MemberFileModel = new MemberFileModel();
                $org_name = $this->request->getPost('org_name');
                $file_name = $this->request->getPost('file_name');
                $file_path = $this->request->getPost('file_path');
                $ext = $this->request->getPost('ext');
                if ($org_name)
                {
                    // 프로필 첨부 있을때만 file db 저장
                    $data2 = [
                        'member_ci' => $ci,
                        'org_name' => $org_name,
                        'file_name' => $file_name,
                        'file_path' => $file_path,
                        'ext' => $ext,
                        'board_type' => 'main_photo',
                    ];
                    $data = array_merge($data, $data2);
                    $MemberFileModel->insert($data2);
                }
                if ($inserted)
                {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
                } else
                {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
                }

            } else
            {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy']);
            }
        }
    }

    public function signUpdate()
    {

        // 정회원 validation
        $rules = [
            'marital' => [
                'label' => 'marital',
                'rules' => 'required',
                'errors' => [
                    'required' => '결혼 유무를 선택해주세요.',
                ]
            ],
            'smoking' => [
                'label' => 'smoking',
                'rules' => 'required',
                'errors' => [
                    'required' => '흡연 유무를 선택해주세요.',
                ]
            ],
            'drinking' => [
                'label' => 'drinking',
                'rules' => 'required',
                'errors' => [
                    'required' => '음주 횟수를 선택해주세요.',
                ]
            ],
            'religion' => [
                'label' => 'religion',
                'rules' => 'required|',
                'errors' => [
                    'required' => '종교를 선택해주세요.',
                ]
            ],
            'mbti' => [
                'label' => 'mbti',
                'rules' => 'required',
                'errors' => [
                    'required' => 'mbti를 선택해주세요.',
                ]
            ],
            'height' => [
                'label' => 'height',
                'rules' => 'required|numeric|exact_length[3]',
                'errors' => [
                    'required' => '키를 입력해주세요.',
                    'numeric' => '키는 숫자만 입력 가능합니다.',
                    'exact_length' => '키는 3자리 숫자여야 합니다.'
                ]
            ],
            'personal_style' => [
                'label' => 'personal_style',
                'rules' => 'required',
                'errors' => [
                    'required' => '스타일을 입력해주세요.',
                ]
            ],
            'education' => [
                'label' => 'education',
                'rules' => 'required',
                'errors' => [
                    'required' => '학력을 선택해주세요.',
                ]
            ],
            'school' => [
                'label' => 'school',
                'rules' => 'required',
                'errors' => [
                    'required' => '학교명을 입력해주세요.',
                ]
            ],
            'major' => [
                'label' => 'major',
                'rules' => 'required',
                'errors' => [
                    'required' => '전공을 입력해주세요.',
                ]
            ],
            'job' => [
                'label' => 'job',
                'rules' => 'required',
                'errors' => [
                    'required' => '직업을 선택해주세요.',
                ]
            ],
            'asset_range' => [
                'label' => 'asset_range',
                'rules' => 'required',
                'errors' => [
                    'required' => '자산구간을 선택해주세요.',
                ]
            ],
            'income_range' => [
                'label' => 'income_range',
                'rules' => 'required',
                'errors' => [
                    'required' => '소득구간을 선택해주세요.',
                ]
            ],
        ];

        // 프리미엄 회원
        if ($this->request->getPost('grade') === 'grade03')
        {
            $rules['father_birth_year'] = [
                'label' => 'father_birth_year',
                'rules' => 'required',
                'errors' => [
                    'required' => '(부) 출생년도를 선택해주세요.',
                ]
            ];
            $rules['father_job'] = [
                'label' => 'father_job',
                'rules' => 'required',
                'errors' => [
                    'required' => '(부) 직업을 선택해주세요.',
                ]
            ];
            $rules['mother_birth_year'] = [
                'label' => 'mother_birth_year',
                'rules' => 'required',
                'errors' => [
                    'required' => '(모) 출생년도를 선택해주세요.',
                ]
            ];
            $rules['mother_job'] = [
                'label' => 'mother_job',
                'rules' => 'required',
                'errors' => [
                    'required' => '(모) 직업을 선택해주세요.',
                ]
            ];
            $rules['siblings'] = [
                'label' => 'siblings',
                'rules' => 'required',
                'errors' => [
                    'required' => '형제관계를 선택해주세요.',
                ]
            ];
            $rules['residence1'] = [
                'label' => 'residence1',
                'rules' => 'required',
                'errors' => [
                    'required' => '거주형태1을 선택해주세요.',
                ]
            ];
            $rules['residence2'] = [
                'label' => 'residence2',
                'rules' => 'required',
                'errors' => [
                    'required' => '거주형태2를 선택해주세요.',
                ]
            ];
            $rules['residence3'] = [
                'label' => 'residence3',
                'rules' => 'required',
                'errors' => [
                    'required' => '거주형태3을 선택해주세요.',
                ]
            ];
        }


        // $postData = $this->request->getPost();

        $ci = $this->request->getPost('ci');
        $grade = $this->request->getPost('grade');
        $married = $this->request->getPost('marital');
        $smoker = $this->request->getPost('smoking');
        $drinking = $this->request->getPost('drinking');
        $religion = $this->request->getPost('religion');
        $mbti = $this->request->getPost('mbti');
        $height = $this->request->getPost('height');
        $stylish = $this->request->getPost('personal_style');
        $education = $this->request->getPost('education');
        $major = $this->request->getPost('major');
        $school = $this->request->getPost('school');
        $job = $this->request->getPost('job');
        $asset_range = $this->request->getPost('asset_range');
        $income_range = $this->request->getPost('income_range');

        if (!$this->validate($rules))
        {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        } else
        {

            $MemberModel = new MemberModel();

            $data = [
                'grade' => $grade,
                'married' => $married,
                'smoker' => $smoker,
                'drinking' => $drinking,
                'religion' => $religion,
                'mbti' => $mbti,
                'height' => $height,
                'stylish' => $stylish,
                'education' => $education,
                'major' => $major,
                'school' => $school,
                'job' => $job,
                'asset_range' => $asset_range,
                'income_range' => $income_range
            ];

            if ($grade === 'grade03')
            {
                // 프리미엄 회원에만 해당하는 추가 정보
                $premiumData = [
                    'father_birth_year' => $this->request->getPost('father_birth_year'),
                    'father_job' => $this->request->getPost('father_job'),
                    'mother_birth_year' => $this->request->getPost('mother_birth_year'),
                    'mother_job' => $this->request->getPost('mother_job'),
                    'siblings' => $this->request->getPost('siblings'),
                    'residence1' => $this->request->getPost('residence1'),
                    'residence2' => $this->request->getPost('residence2'),
                    'residence3' => $this->request->getPost('residence3'),
                ];

                // 배열 병합
                $data = array_merge($data, $premiumData);
            }

            // CI조회
            $existingData = $MemberModel->where('ci', $ci)->first();

            // 데이터 존재 시
            if ($existingData)
            {
                $inserted = $MemberModel->update($ci, $data);

                if ($inserted)
                {
                    return $this->response->setJSON(['status' => 'success', 'message' => '데이터가 업데이트되었습니다', 'data' => $data]);
                } else
                {
                    return $this->response->setJSON(['status' => 'error', 'message' => '데이터를 업데이트하는 중 오류가 발생했습니다']);
                }
            } else
            {
                return $this->response->setJSON(['status' => 'error', 'message' => '업데이트할 데이터가 존재하지 않습니다']);
            }
        }

    }

    /* 사용자 파일 저장 */
    public function mbrFileRegUp()
    {
        $member_ci = $this->request->getPost('ci');
        $file_path = $this->request->getPost('file_path');
        $file_name = $this->request->getPost('file_name');
        $org_name = $this->request->getPost('org_name');
        $ext = $this->request->getPost('ext');
        $board_type = $this->request->getPost('board_type');

        $MemberFileModel = new MemberFileModel();

        // 기존에 첨부된 파일은 delete_yn 처리하기
        $data = [
            'delete_yn' => 'y',
        ];
        $condition = ['board_type' => $board_type, 'member_ci' => $member_ci];
        $updated = $MemberFileModel->where($condition)->update($member_ci, $data);
        if ($updated)
        {
            $data = [
                'member_ci' => $member_ci,
                'file_path' => $file_path,
                'file_name' => $file_name,
                'org_name' => $org_name,
                'ext' => $ext,
                'board_type' => $board_type
            ];

            $inserted = $MemberFileModel->insert($data);
            if ($inserted)
            {
                return $this->response->setJSON(['status' => 'success', 'message' => "파일이 성공적으로 저장되었습니다.", 'data' => $data]);
            } else
            {
                $error = $MemberFileModel->getError();
                return $this->response->setJSON(['status' => 'fail', 'message' => "파일 저장에 실패했습니다. $error"]);
            }
        }



    }


    /* 회원 등급 업데이트 */
    public function gradeUpdate($ci, $grade)
    {
        $MemberModel = new MemberModel();

        $data = [
            'grade' => $grade,
        ];

        // CI조회
        $existingData = $MemberModel->where('ci', $ci)->first();
        // 데이터 존재 시
        if ($existingData)
        {
            $inserted = $MemberModel->update($ci, $data);

            if ($inserted)
            {
                // return $this->response->setJSON(['status' => 'success', 'message' => '데이터가 업데이트되었습니다', 'data' => $data]);
                return '0';
            } else
            {
                // return $this->response->setJSON(['status' => 'error', 'message' => '데이터를 업데이트하는 중 오류가 발생했습니다']);
                return '1';
            }
        } else
        {
            // return $this->response->setJSON(['status' => 'error', 'message' => '업데이트할 데이터가 존재하지 않습니다']);
            return '2';
        }

    }

    public function searchUniversity()
    {
        $term = $this->request->getVar('term');

        $UniversityModel = new UniversityModel();

        $res = $UniversityModel->like('name', $term)->where('delete_yn', 'Y')->findAll();

        $results = array_map(function ($row) {
            return [
                'label' => $row['name'],
                'value' => $row['name']
            ];
        }, $res);

        return $this->response->setJSON($results);
    }

    /* 회원 추가사진/동영상 프로필 업데이트 */
    public function updtUserData()
    {
        $MemberFileModel = new MemberFileModel();

        $postData = $this->request->getPost('uploadedFiles');
        $postData2 = $this->request->getPost('uploadedMovs');
        $ci = $this->request->getPost('ci');

        $insertedData = [];

        if (!empty($postData))
        {
            // $postData 배열을 반복하여 데이터베이스에 삽입
            foreach ($postData as $fileInfo)
            {
                // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                $org_name = $fileInfo['org_name'];
                $file_name = $fileInfo['file_name'];
                $file_path = $fileInfo['file_path'];
                $ext = $fileInfo['ext'];
                $data = [
                    'member_ci' => $ci,
                    'org_name' => $org_name,
                    'file_name' => $file_name,
                    'file_path' => $file_path,
                    'ext' => $ext,
                    'board_type' => 'photos',
                ];
                $inserted = $MemberFileModel->insert($data);
                if ($inserted)
                {
                    $insertedData[] = $data;
                }
            }
        }
        if (!empty($postData2))
        {
            // $postData 배열을 반복하여 데이터베이스에 삽입
            foreach ($postData2 as $fileInfo)
            {
                // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                $org_name = $fileInfo['org_name'];
                $file_name = $fileInfo['file_name'];
                $file_path = $fileInfo['file_path'];
                $ext = $fileInfo['ext'];
                $data = [
                    'member_ci' => $ci,
                    'org_name' => $org_name,
                    'file_name' => $file_name,
                    'file_path' => $file_path,
                    'ext' => $ext,
                    'board_type' => 'movs',
                ];
                $inserted = $MemberFileModel->insert($data);
                if ($inserted)
                {
                    $insertedData[] = $data;
                }
            }
        }
        $return = [
            'ci' => $ci,
            'file_path' => $file_path,
            'file_name' => $file_name,
            'insertedData' => $insertedData
        ];
        if (!empty($insertedData))
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
        } else
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
        }

    }
    public function updtFeedData()
    {
        $MemberFeedModel = new MemberFeedModel();
        $MemberFeedFileModel = new MemberFeedFileModel();
        $feed_cont = $this->request->getPost('feed_cont');
        $public_yn = $this->request->getPost('public_yn');
        $edit_type = $this->request->getPost('edit_type');
        
        $session = session();
        $member_ci = $session->get('ci');
        $postData = $this->request->getPost('uploadedFeeds');
        $insertedData = [];

        $data = [
            'member_ci' => $member_ci,
            'feed_cont' => $feed_cont,
            'public_yn' => $public_yn,
            'thumb_filename' => $postData[0]['file_name'],
            'thumb_filepath' => $postData[0]['file_path'],
        ];
        $inserted = $MemberFeedModel->insert($data);
        if ($inserted)
        {
            $feed_idx = $MemberFeedModel->insertID();
            if (!empty($postData))
            {
                // $postData 배열을 반복하여 데이터베이스에 삽입
                foreach ($postData as $fileInfo)
                {
                    // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                    $org_name = $fileInfo['org_name'];
                    $file_name = $fileInfo['file_name'];
                    $file_path = $fileInfo['file_path'];
                    $ext = $fileInfo['ext'];
                    $data = [
                        'feed_idx' => $feed_idx,
                        'member_ci' => $member_ci,
                        'org_name' => $org_name,
                        'file_name' => $file_name,
                        'file_path' => $file_path,
                        'ext' => $ext,
                        'board_type' => 'feeds',
                    ];
                    $inserted = $MemberFeedFileModel->insert($data);
                    if ($inserted)
                    {
                        $insertedData[] = $data;
                    }
                }
            }
            $return = [
                'member_ci' => $member_ci,
                'file_path' => $file_path,
                'file_name' => $file_name,
                'insertedData' => $insertedData
            ];
            if (!empty($insertedData))
            {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
            } else
            {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
            }

        }


    }
    public function showFeedDetail()
    {
        $MemberFeedModel = new MemberFeedModel();
        $feed_idx = $this->request->getPost('feed_idx');
        $session = session();
        $member_ci = $session->get('ci');
        $condition = [
            'member_ci' => $member_ci,
            'idx' => $feed_idx,
        ];
        $result = $MemberFeedModel->where($condition)->first();
        if ($result)
        {
            
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
                
        } else
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        }


    }
    public function myFeedDelete()
    {
        $MemberFeedModel = new MemberFeedModel();
        $feed_idx = $this->request->getPost('feed_idx');
        $session = session();
        $member_ci = $session->get('ci');
        $condition = [
            'idx' => $feed_idx,
            'member_ci' => $member_ci,
        ];
        $result = $MemberFeedModel->where($condition)->delete();
        if ($result)
        {            
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
                
        } else
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        }


    }
    public function myFeedUpdate()
    {
        $MemberFeedModel = new MemberFeedModel();
        $feed_idx = $this->request->getPost('feed_idx');
        $session = session();
        $member_ci = $session->get('ci');
        $condition = [
            'idx' => $feed_idx,
            'member_ci' => $member_ci,
        ];
        $result = $MemberFeedModel->where($condition)->first();
        if ($result)
        {            
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
                
        } else
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        }


    }

}
