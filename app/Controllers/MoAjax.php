<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\MemberFileModel;
use App\Models\MemberFeedModel;
use App\Models\MemberFeedFileModel;
use App\Models\UniversityModel;
use App\Models\MeetingModel;
use App\Models\MeetingPersonModel;
use App\Models\MeetingFileModel;
use App\Models\MatchPartnerModel;
use App\Models\MatchFactorModel;
use App\Models\MatchRateModel;
use App\Models\MeetingMembersModel;
use App\Models\AllianceMemberModel;
use App\Models\AllianceModel;
use App\Models\AllianceFileModel;
use App\Config\Encryption;
use App\Models\AllianceReservationModel;
use App\Models\ChatRoomModel;
use App\Models\ChatRoomMsgModel;
use App\Models\ChatRoomMemberModel;
use App\Models\PointModel;
use App\Models\EmailRegisterModel;
use App\Config\Email;


class MoAjax extends BaseController
{
    public function AImatch()
    {
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);

        $session = session();
        $member_ci = $session->get('ci');
        $filter = $this->request->getPost('value');

        $query = "SELECT mr.match_rate, mf.file_path, mf.file_name, mb.city, mb.mbti, mb.nickname, SUBSTRING(mb.birthday, 1, 4) as birthyear FROM wh_match_rate mr
        LEFT JOIN members mb on mr.your_nickname = mb.nickname
        LEFT JOIN member_files mf on mb.ci = mf.member_ci";
        $query .= " WHERE mr.member_ci = '" . $member_ci . "'";
        if ($filter !== "9") {
            $query .= " AND mb.gender = '" . $filter . "'";
        }
        $query .= " AND mr.match_score > '0'";
        $query .= " AND mf.board_type = 'main_photo'";
        $query .= " ORDER BY CONVERT(mr.match_rate, SIGNED) DESC LIMIT 20;";

        $MemberModel = new MemberModel();
        $result = $MemberModel
            ->query($query)->getResultArray();

        if ($result) {
            foreach ($result as &$row) {
                // 각 행의 birthyear 값에 문자열 1을 추가합니다.
                foreach ($sidoCode as $item) {
                    if ($item['id'] === $row['city']) $row['city'] = $item['name'];
                }
                foreach ($mbtiCode as $item) {
                    if ($item['id'] === $row['mbti']) $row['mbti'] = $item['name'];
                }
                $row['match_rate'] = number_format($row['match_rate'], 0);
            }
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => $result]);
        } else {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'query' => $query]);
        }
    }

    public function AImatch2()
    {
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);

        $session = session();
        $member_ci = $session->get('ci');
        $filter = $this->request->getPost('value');

        $query = "SELECT mr.ideal_rate, mf.file_path, mf.file_name, mb.city, mb.mbti, mb.nickname, SUBSTRING(mb.birthday, 1, 4) as birthyear FROM wh_match_rate mr
        LEFT JOIN members mb on mr.your_nickname = mb.nickname
        LEFT JOIN member_files mf on mb.ci = mf.member_ci";
        $query .= " WHERE mr.member_ci = '" . $member_ci . "'";
        if ($filter !== "9") {
            $query .= " AND mb.gender = '" . $filter . "'";
        }
        $query .= " AND mr.ideal_rate > '0'";
        $query .= " AND mf.board_type = 'main_photo'";
        $query .= " ORDER BY CONVERT(mr.ideal_rate, SIGNED) DESC LIMIT 20;";

        $MemberModel = new MemberModel();
        $result = $MemberModel
            ->query($query)->getResultArray();

        if ($result) {
            foreach ($result as &$row) {
                // 각 행의 birthyear 값에 문자열 1을 추가합니다.
                foreach ($sidoCode as $item) {
                    if ($item['id'] === $row['city']) $row['city'] = $item['name'];
                }
                foreach ($mbtiCode as $item) {
                    if ($item['id'] === $row['mbti']) $row['mbti'] = $item['name'];
                }
                $row['match_rate'] = number_format($row['match_rate'], 0);
            }
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => $result]);
        } else {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'query' => $query]);
        }
    }

    public function mainMeetingList()
    {
        $MeetingModel = new MeetingModel();
        //$MeetingFileModel = new MeetingFileModel();
        // $data['meetings'] = $MeetingModel->orderBy('create_at', 'DESC')->findAll();

        $MeetingModel->orderBy('create_at', 'DESC');

        $currentTime = date('Y-m-d H:i:s');

        $meetings = $MeetingModel
            ->join('wh_meetings_files', 'wh_meetings_files.meeting_idx = wh_meetings.idx', 'left')
            ->where('wh_meetings.meeting_start_date >=', $currentTime)
            ->where('wh_meetings.delete_yn', 'N')
            ->findAll();

        $days = ['일', '월', '화', '수', '목', '금', '토'];

        // 참여 인원 모델
        $MeetingMembersModel = new MeetingMembersModel();

        // 각 모임에 대한 참여 인원 수 계산
        foreach ($meetings as &$meeting) { //&로 참조 필요
            // 모임 시작 시간 포맷팅
            $meetingDateTimestamp = strtotime($meeting['meeting_start_date']);
            $meetingDay = date("w", $meetingDateTimestamp); //0~6
            $dayName = $days[$meetingDay]; //요일
            $meetingDateTime = date("Y.m.d ", $meetingDateTimestamp) . ' (' . $dayName . ') ' . date(" H:i", $meetingDateTimestamp);
            $meeting['meetingDateTime'] = $meetingDateTime;

            $memCount = $MeetingMembersModel
                ->where('meeting_idx', $meeting['idx'])
                ->where('delete_yn', 'N')
                ->countAllResults();
            $meeting['count'] = $memCount;
        }
        unset($meeting); //참조 해제

        if ($meetings) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => $meetings]);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => 'failed']);
        }
    }

    public function delCmt()
    {

        $postData = $this->request->getPost();

        // 특정 키의 POST 값만 받아오기
        $cmt_idx = $this->request->getPost('cmt_idx');
        $trgt_id = $this->request->getPost('trgt_id');
        $trgt_idx = $this->request->getPost('trgt_idx');

        if ($cmt_idx && $trgt_id && $trgt_idx) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data processed successfully', 'result' => $postData]);
        }
    }

    public function login()
    {
        // $mobile_no = $this->request->getPost('mobile_no');
        $email = $this->request->getPost('email');
        $pswd = "" . $this->request->getPost('passwd');
        $auto_login = $this->request->getPost('auto_login', FILTER_VALIDATE_BOOLEAN);

        $MemberModel = new MemberModel();

        $query = "SELECT * FROM members WHERE email = '" . $email . "' AND delete_yn='n';";
        $userChk = $MemberModel->query($query)->getResultArray();

        if ($userChk) { // email 이 존재하면 password 체크 시작
            $pswdEncode = password_hash($pswd, PASSWORD_DEFAULT);
            $pswdChk = password_verify($pswd, $userChk[0]['password']);

            if ($pswdChk) { // 패스워드 일치하면
                $user = $userChk[0];
                $session = session();
                $session->set([
                    'ci' => $user['ci'],
                    'name' => $user['name'],
                    'isLoggedIn' => true //로그인 상태
                ]);

                if ($auto_login) {
                    $session->setTempdata('ci', $user['ci'], 2592000);
                }

                return $this->response->setJSON(['status' => 'success', 'message' => "로그인 성공"]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => '패스워드가 일치하지 않습니다']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => '일치하는 회원 정보가 없습니다']);
        }
    }
    public function loginParam($param)
    {
        $mobile_no = $param;
        $MemberModel = new MemberModel();

        $user = $MemberModel->where('mobile_no', $mobile_no)->first();

        if ($user) {
            $session = session();
            $session->set([
                'ci' => $user['ci'],
                'name' => $user['name'],
                'isLoggedIn' => true //로그인 상태
            ]);
            return '0';
        } else {
            return '1';
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

    public function upgradeGrade()
    {
        $selectedGrade = $this->request->getPost('grade');

        if (empty($selectedGrade)) {
            return $this->response->setJSON(['status' => 'error', 'message' => '선택된 등급이 유효하지 않습니다.']);
        }

        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $currentMember  = $MemberModel
            ->where('ci', $ci)
            ->first();

        $MemberFileModel = new MemberFileModel();
        $currentMemberFile = $MemberFileModel
            ->where('member_ci', $ci)
            ->where('board_type', 'main_photo')
            ->where('delete_yn', 'n')
            ->first();

        $grade = $currentMember['grade'];
        $mobileNo = $currentMember['mobile_no'];
        $currentGrade = $currentMember['grade'];
        $filePath = $currentMemberFile['file_path'];
        $fileName = $currentMemberFile['file_name'];

        if ($selectedGrade === $currentGrade) {
            return $this->response->setJSON(['status' => 'error', 'message' => '선택된 등급과 현재 등급이 동일합니다.']);
        }

        if ($selectedGrade !== $currentGrade) {
            $updateStatus = $MemberModel->update(
                $ci,
                ['temp_grade' => $selectedGrade]
            );

            $data = [
                'grade' => $grade,
                'temp_grade' => $selectedGrade,
                'mobile_no' => $mobileNo,
                'ci' => $ci,
                'file_path' => $filePath,
                'file_name' => $fileName
            ];

            if ($updateStatus > 0) {
                return $this->response->setJSON(['status' => 'success', 'message' => '등급 업데이트 성공', 'data' => $data]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => '등급 업데이트 실패', 'data' => $currentGrade]);
            }
        }
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
                'rules' => 'required|in_list[0,1]', //'1'(남성) / '0'(여성)
                'errors' => [
                    'required' => '성별을 선택해 주세요.',
                    'in_list' => '성별을 올바르게 선택해 주세요.'
                ]
            ],
            'city' => [
                'label' => 'city',
                'rules' => 'required',
                'errors' => [
                    'required' => '지역을 선택해 주세요.',
                ]
            ],
            'town' => [
                'label' => 'town',
                'rules' => 'required',
                'errors' => [
                    'required' => '도시를 입력해 주세요.',
                ]
            ],
            // 'passwd' => [
            //     'label' => 'passwd',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '비밀번호를 입력해 주세요.',
            //     ]
            // ],
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        } else {
            $MemberModel = new MemberModel();

            $unique_code = $this->generateUniqueCode($MemberModel);
            $random_word = $this->request->getPost('nickname');

            if (empty($random_word)) {
                $is_duplicate = true;
                $random_word = '';
                // 닉네임 중복확인
                while ($is_duplicate) {
                    // 닉네임 랜덤 생성
                    $word_file_path = APPPATH . 'Data/RandomWord.php';
                    require($word_file_path);
                    $random_word = $randomadj[array_rand($randomadj)] . $randomword[array_rand($randomword)] . '@' . mt_rand(100000, 999999);
                    $is_duplicate = $MemberModel->where(['nickname' => $random_word])->first();
                }
            }

            $mobile_no = $this->request->getPost('mobile_no');
            $email = $this->request->getPost('email');

            // 이메일 가입 중복 로직 확인
            $emailDupChkQuery = "SELECT email FROM members WHERE email='" . $email . "'";
            $emailDupChk = $MemberModel->query($emailDupChkQuery)->getResultArray();
            if ($emailDupChk) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Email Duplication', 'result' => '2']);
            }

            // 패스워드 단방향 암호화 필요
            $pswd = "" . $this->request->getPost('pswd');

            $encrypter = \Config\Services::encrypter();
            $ci = base64_encode($encrypter->encrypt($mobile_no, ['key' => 'nonamedm', 'blockSize' => 32]));
            $pswdEncode = password_hash($pswd, PASSWORD_DEFAULT);

            // $ci = $this->request->getPost('ci');
            $agree1 = $this->request->getPost('agree1');
            $agree2 = $this->request->getPost('agree2');
            $agree3 = $this->request->getPost('agree3');
            $name = $this->request->getPost('name');
            $birthday = $this->request->getPost('birthday');
            $gender = $this->request->getPost('gender');
            $city = $this->request->getPost('city');
            $town = $this->request->getPost('town');
            $snsType = $this->request->getPost('sns_type');
            $oauthId = $this->request->getPost('oauth_id');
            // $town = $encrypter->decrypt(base64_decode($ci), ['key' => 'nonamedm', 'blockSize' => 32]);


            $data = [
                'mobile_no' => $mobile_no,
                'email' => $email,
                'password' => $pswdEncode,
                'ci' => $ci,
                'agree1' => $agree1,
                'agree2' => $agree2,
                'agree3' => $agree3,
                'name' => $name,
                'birthday' => $birthday,
                'gender' => $gender,
                'city' => $city,
                'town' => $town,
                'nickname' => $random_word,
                'unique_code' => $unique_code,
                'sns_type' => $snsType,
                'oauth_id' => $oauthId
            ];

            // 이메일과 전화번호로 verify_yn = y 인 항목을 한번 조회한다
            $query = "SELECT * FROM wh_email_register WHERE mobile_no='" . $mobile_no . "' AND member_email='" . $email . "' AND verify_yn='y' AND delete_yn='n'";
            $chkMailPhoneYn = $MemberModel->query($query)->getResultArray();
            if ($chkMailPhoneYn) {
                // 데이터 저장
                $inserted = $MemberModel->insert($data);

                // 회원가입 완료 되었을 떄
                if ($inserted) {
                    // 프로필 사진 DB 업로드
                    $MemberFileModel = new MemberFileModel();
                    $org_name = $this->request->getPost('org_name');
                    $file_name = $this->request->getPost('file_name');
                    $file_path = $this->request->getPost('file_path');
                    $ext = $this->request->getPost('ext');
                    if ($org_name) {
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
                    } else {
                        // 프로필 첨부 없을때는 기본이미지로 저장
                        $data2 = [
                            'member_ci' => $ci,
                            'org_name' => 'profile_noimg.png',
                            'file_name' => 'profile_noimg.png',
                            'file_path' => 'static/images/',
                            'ext' => 'png',
                            'board_type' => 'main_photo',
                        ];
                        $data = array_merge($data, $data2);
                        $MemberFileModel->insert($data2);
                    }
                    if ($inserted) {
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
                    } else {
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy fail', 'data' => $data]);
                    }
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy', 'result' => '4']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy', 'result' => '5']);
            }
        }
    }
    protected function generateUniqueCode($MemberModel)
    {
        $length = 6;
        $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        $is_duplicate = true;

        while ($is_duplicate) {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $charset[rand(0, strlen($charset) - 1)];
            }
            $is_duplicate = $MemberModel
                ->where(['unique_code' => $code])
                ->first() ? true : false;
        }

        return $code;
    }

    public function isValidRecommendCode()
    {
        $inviteCode = $this->request->getPost('inviteCode');

        $MemberModel = new MemberModel();

        $result = $MemberModel
            ->select('unique_code')
            ->where('unique_code', $inviteCode)
            ->where('delete_yn', 'N')
            ->first();

        $isValid = $result !== null;

        return $this->response->setJSON([
            'isValid' => $isValid
        ]);
    }

    public function mobileDupChk()
    {
        $mobile_no = $this->request->getPost('mobile_no');

        $MemberModel = new MemberModel();
        $selected = $MemberModel->where('mobile_no', $mobile_no)->first();

        if ($selected) {
            return $this->response->setJSON(['status' => 'failed', 'message' => '휴대폰 번호 중복', 'result' => '1']);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => '중복체크 성공', 'result' => '0']);
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
            'bodyshape' => [
                'label' => 'bodyshape',
                'rules' => 'required',
                'errors' => [
                    'required' => '체형을 선택해 주세요.',
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
        if ($this->request->getPost('temp_grade') === 'grade03') {
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
        $temp_grade = $this->request->getPost('temp_grade');
        $married = $this->request->getPost('marital');
        $smoker = $this->request->getPost('smoking');
        $drinking = $this->request->getPost('drinking');
        $religion = $this->request->getPost('religion');
        $mbti = $this->request->getPost('mbti');
        $height = $this->request->getPost('height');
        $bodyshape = $this->request->getPost('bodyshape');
        $stylish = $this->request->getPost('personal_style');
        $education = $this->request->getPost('education');
        $major = $this->request->getPost('major');
        $school = $this->request->getPost('school');
        $job = $this->request->getPost('job');
        $asset_range = $this->request->getPost('asset_range');
        $income_range = $this->request->getPost('income_range');
        $nickname = $this->request->getPost('nickname');

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        } else {

            $MemberModel = new MemberModel();

            $data = [
                //'grade' => $grade,
                'temp_grade' => $temp_grade,
                'married' => $married,
                'smoker' => $smoker,
                'drinking' => $drinking,
                'religion' => $religion,
                'mbti' => $mbti,
                'height' => $height,
                'bodyshape' => $bodyshape,
                'stylish' => $stylish,
                'education' => $education,
                'major' => $major,
                'school' => $school,
                'job' => $job,
                'asset_range' => $asset_range,
                'income_range' => $income_range
            ];

            // nickname 필드가 있다면 $data 배열에 추가
            if (!empty($nickname)) {
                $data['nickname'] = $nickname;
            }

            if ($temp_grade === 'grade03') {
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
            if ($existingData) {
                $inserted = $MemberModel->update($ci, $data);

                // 프로필 사진 DB 업로드
                $MemberFileModel = new MemberFileModel();
                $org_name = $this->request->getPost('org_name');
                $file_name = $this->request->getPost('file_name');
                $file_path = $this->request->getPost('file_path');
                $ext = $this->request->getPost('ext');
                if ($org_name) {
                    // 프로필 첨부 있을때만 file db 저장

                    // 기존 정보 delete_yn=y 업데이트
                    $MemberFileModel->query("UPDATE member_files SET delete_yn='y' where member_ci='" . $ci . "' AND board_type='main_photo'");

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
                } else {
                    // 프로필 첨부 없을때는 업데이트 안함
                }
                if ($inserted) {
                    return $this->response->setJSON(['status' => 'success', 'message' => '데이터가 업데이트되었습니다', 'data' => $data]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => '데이터를 업데이트하는 중 오류가 발생했습니다']);
                }
            } else {
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
        if ($updated) {
            $data = [
                'member_ci' => $member_ci,
                'file_path' => $file_path,
                'file_name' => $file_name,
                'org_name' => $org_name,
                'ext' => $ext,
                'board_type' => $board_type
            ];

            $inserted = $MemberFileModel->insert($data);
            if ($inserted) {
                return $this->response->setJSON(['status' => 'success', 'message' => "파일이 성공적으로 저장되었습니다.", 'data' => $data]);
            } else {
                $error = $MemberFileModel->getError();
                return $this->response->setJSON(['status' => 'fail', 'message' => "파일 저장에 실패했습니다. $error"]);
            }
        }
    }

    /* 회원 등급 업데이트 */
    public function gradeUpdate($grade, $type = 'permanent')
    {
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();

        if ($type == 'temp') {
            $data = ['temp_grade' => $grade];
        } else {
            $data = ['grade' => $grade];
        }

        // CI조회
        $existingData = $MemberModel
            ->where('ci', $ci)
            ->first();

        print_r($data);

        //데이터 존재 시
        if ($existingData) {
            $inserted = $MemberModel->update($ci, $data);

            if ($inserted) {
                // return $this->response->setJSON(['status' => 'success', 'message' => '데이터가 업데이트되었습니다', 'data' => $data]);
                return '0';
            } else {
                // return $this->response->setJSON(['status' => 'error', 'message' => '데이터를 업데이트하는 중 오류가 발생했습니다']);
                return '1';
            }
        } else {
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
        $MemberFeedModel = new MemberFeedModel();
        $MemberFeedFileModel = new MemberFeedFileModel();

        $postData = $this->request->getPost('uploadedFiles');
        $postData2 = $this->request->getPost('uploadedMovs');
        $ci = $this->request->getPost('ci');
        $mobile_no = $this->request->getPost('mobile_no');

        $insertedData = [];

        if (!empty($postData)) {
            // $postData 배열을 반복하여 데이터베이스에 삽입
            foreach ($postData as $fileInfo) {
                // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                $org_name = $fileInfo['org_name'];
                $file_name = $fileInfo['file_name'];
                $file_path = $fileInfo['file_path'];
                $ext = $fileInfo['ext'];
                $data = [
                    'member_ci' => $ci,
                    'feed_cont' => '신규 회원가입을 축하합니다',
                    'public_yn' => '0',
                    'thumb_filename' => $file_name,
                    'thumb_filepath' => $file_path,
                ];
                $inserted = $MemberFeedModel->insert($data);
                if ($inserted) {
                    $feed_idx = $MemberFeedModel->insertID();
                    $data = [
                        'feed_idx' => $feed_idx,
                        'member_ci' => $ci,
                        'org_name' => $org_name,
                        'file_name' => $file_name,
                        'file_path' => $file_path,
                        'ext' => $ext,
                        'board_type' => 'feeds',
                    ];
                    $inserted = $MemberFeedFileModel->insert($data);
                    $insertedData[] = $data;
                }
            }
        }
        if (!empty($postData2)) {
            // $postData 배열을 반복하여 데이터베이스에 삽입
            foreach ($postData2 as $fileInfo) {
                // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                $org_name = $fileInfo['org_name'];
                $file_name = $fileInfo['file_name'];
                $file_path = $fileInfo['file_path'];
                $ext = $fileInfo['ext'];
                $data = [
                    'member_ci' => $ci,
                    'feed_cont' => '신규 회원가입을 축하합니다',
                    'public_yn' => '0',
                    'thumb_filename' => $file_name,
                    'thumb_filepath' => $file_path,
                ];
                $inserted = $MemberFeedModel->insert($data);
                if ($inserted) {
                    $feed_idx = $MemberFeedModel->insertID();
                    $data = [
                        'feed_idx' => $feed_idx,
                        'member_ci' => $ci,
                        'org_name' => $org_name,
                        'file_name' => $file_name,
                        'file_path' => $file_path,
                        'ext' => $ext,
                        'board_type' => 'feeds',
                    ];
                    $inserted = $MemberFeedFileModel->insert($data);
                    $insertedData[] = $data;
                }
            }
        }
        $return = [
            'ci' => $ci,
            'mobile_no' => $mobile_no,
            'file_path' => $file_path,
            'file_name' => $file_name,
            'insertedData' => $insertedData
        ];
        if (!empty($insertedData)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy fail', 'data' => $return]);
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

        // edit_type 따라 신규/업데이트 분기
        if ($edit_type == 'addMyFeed') {
            // 신규 등록일 때
            $data = [
                'member_ci' => $member_ci,
                'feed_cont' => $feed_cont,
                'public_yn' => $public_yn,
                'thumb_filename' => $postData[0]['file_name'],
                'thumb_filepath' => $postData[0]['file_path'],
            ];
            $inserted = $MemberFeedModel->insert($data);
            if ($inserted) {
                $feed_idx = $MemberFeedModel->insertID();
                if (!empty($postData)) {
                    // $postData 배열을 반복하여 데이터베이스에 삽입
                    foreach ($postData as $fileInfo) {
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
                        if ($inserted) {
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
                if (!empty($insertedData)) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $return]);
                } else {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy fail', 'data' => $return]);
                }
            }
        } else {
            // 수정일 때
            $feed_idx = $this->request->getPost('feed_idx');
            $condition = [
                'idx' => $feed_idx,
                'member_ci' => $member_ci,
                'delete_yn' => 'n'
            ];

            if (!empty($postData)) {
                // 첨부파일이 있는 경우(수정한 경우)
                $data = [
                    'feed_cont' => $feed_cont,
                    'public_yn' => $public_yn,
                    'thumb_filename' => $postData[0]['file_name'],
                    'thumb_filepath' => $postData[0]['file_path'],
                ];
                $updated = $MemberFeedModel->update($condition, $data);
            } else {
                // 첨부파일이 없는 경우(수정 안한 경우)
                $data = [
                    'feed_cont' => $feed_cont,
                    'public_yn' => $public_yn,
                ];
                $updated = $MemberFeedModel->update($condition, $data);
            }
            if ($updated) {
                if (!empty($postData)) {
                    // 기존 첨부파일은 삭제하고
                    $condition2 = [
                        'feed_idx' => $feed_idx,
                        'member_ci' => $member_ci,
                    ];
                    $update = [
                        'delete_yn' => 'y'
                    ];
                    $deleted = $MemberFeedFileModel->where($condition2)->update($condition2, $update);

                    if ($deleted) {
                        // $postData 배열을 반복하여 데이터베이스에 삽입
                        foreach ($postData as $fileInfo) {
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
                            if ($inserted) {
                                $insertedData[] = $data;
                            }
                        }
                        $return = [
                            'member_ci' => $member_ci,
                            'file_path' => $file_path,
                            'file_name' => $file_name,
                            'insertedData' => $insertedData,
                        ];
                    } else {
                        $return = [
                            'fileinputfalse' => 'false'
                        ];
                    }
                } else {
                    $return = [
                        'member_ci' => $member_ci,
                    ];
                }
                if (!empty($insertedData)) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Feed modify with photo success', 'data' => $return]);
                } else {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Feed modify success', 'data' => $data]);
                }
            }
        }
    }
    public function showFeedDetail()
    {
        $MemberFeedModel = new MemberFeedModel();
        $feed_idx = $this->request->getPost('feed_idx');
        $session = session();
        $member_ci = $session->get('ci'); // 현재 로그인한 사람의 ci값
        $condition = [
            'wh_member_feed.idx' => $feed_idx,
            'wh_member_feed.delete_yn' => 'n',
        ];
        $result = $MemberFeedModel->where($condition)->join('wh_member_feed_files', 'wh_member_feed_files.feed_idx = wh_member_feed.idx')->first();
        if ($result) {

            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        }
    }
    public function myFeedDelete()
    {
        $MemberFeedModel = new MemberFeedModel();
        $MemberFeedFileModel = new MemberFeedFileModel();
        $feed_idx = $this->request->getPost('feed_idx');
        $session = session();
        $member_ci = $session->get('ci');
        $condition = [
            'idx' => $feed_idx,
            'member_ci' => $member_ci,
        ];
        $update = [
            'delete_yn' => 'y'
        ];
        $result = $MemberFeedModel->update($condition, $update);
        if ($result) {
            $query = "UPDATE wh_member_feed_files SET delete_yn='y' WHERE feed_idx='" . $feed_idx . "'";
            $updateFeedFileYn = $MemberFeedFileModel
                ->query($query);
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        } else {
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
            'wh_member_feed.idx' => $feed_idx,
            'wh_member_feed.member_ci' => $member_ci,
        ];

        $result = $MemberFeedModel->where($condition)->join('wh_member_feed_files', 'wh_member_feed_files.feed_idx = wh_member_feed.idx')->first();
        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => 'feed detail read', 'data' => $result]);
        }
    }

    public function savePartner()
    {
        $MatchPartnerModel = new MatchPartnerModel();

        $session = session();
        $member_ci = $session->get('ci');
        $partner_gender = $this->request->getPost('partner_mf');
        $animal_type1 = $this->request->getPost('animal_type1');
        $region = $this->request->getPost('region');
        $fromyear = $this->request->getPost('fromyear');
        $toyear = $this->request->getPost('toyear');
        $height = $this->request->getPost('height');
        $stylish = $this->request->getPost('personal_style');
        $bodyshape = $this->request->getPost('bodyshape');
        $married = $this->request->getPost('marital');
        $smoker = $this->request->getPost('smoking');
        $drinking = $this->request->getPost('drinking');
        $religion = $this->request->getPost('religion');
        $mbti = $this->request->getPost('mbti');
        $education = $this->request->getPost('education');
        $job = $this->request->getPost('job');
        $asset_range = $this->request->getPost('asset_range');
        $income_range = $this->request->getPost('income_range');
        $father_job = $this->request->getPost('father_job');
        $mother_job = $this->request->getPost('mother_job');
        $siblings = $this->request->getPost('siblings');
        $residence1 = $this->request->getPost('residence1');
        $residence2 = $this->request->getPost('residence2');


        $data = [
            'member_ci' => $member_ci,
            'partner_gender' => $partner_gender,
            'region' => $region,
            'animal_type1' => $animal_type1,
            'fromyear' => $fromyear,
            'toyear' => $toyear,
            'height' => $height,
            'stylish' => $stylish,
            'bodyshape' => $bodyshape,
            'married' => $married,
            'smoker' => $smoker,
            'drinking' => $drinking,
            'religion' => $religion,
            'mbti' => $mbti,
            'education' => $education,
            'job' => $job,
            'asset_range' => $asset_range,
            'income_range' => $income_range,
            'father_job' => $father_job,
            'mother_job' => $mother_job,
            'siblings' => $siblings,
            'residence1' => $residence1,
            'residence2' => $residence2,
        ];

        // 데이터 저장
        $selected = $MatchPartnerModel->where('member_ci', $member_ci)->first();
        if ($selected) {
            $inserted = $MatchPartnerModel->update($member_ci, $data);
        } else {
            $inserted = $MatchPartnerModel->insert($data);
        }

        // 저장완료 되었을 떄
        if ($inserted) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Partner info saved successfully', 'data' => $data]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Partner info saved successfully', 'data' => $data]);
        }
    }
    public function saveFactorBasic()
    {
        $MatchFactorModel = new MatchFactorModel();

        $session = session();
        $member_ci = $session->get('ci');
        $group1 = $this->request->getPost('group1');
        $group2 = $this->request->getPost('group2');
        $group3 = $this->request->getPost('group3');
        $group4 = $this->request->getPost('group4');
        $group5 = $this->request->getPost('group5');

        $data = [
            'member_ci' => $member_ci,
            'group1' => $group1,
            'group2' => $group2,
            'group3' => $group3,
            'group4' => $group4,
            'group5' => $group5,
        ];

        // 데이터 저장
        $selected = $MatchFactorModel->where('member_ci', $member_ci)->first();
        if ($selected) {
            $inserted = $MatchFactorModel->update($member_ci, $data);
        } else {
            $inserted = $MatchFactorModel->insert($data);
        }

        // 저장완료 되었을 떄
        if ($inserted) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Partner info saved successfully', 'data' => $data]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Partner info saved successfully', 'data' => $data]);
        }
    }
    public function saveFactorInfo()
    {
        $MatchFactorModel = new MatchFactorModel();

        $session = session();
        $member_ci = $session->get('ci');
        $first_factor = $this->request->getPost('first_factor');
        $second_factor = $this->request->getPost('second_factor');
        $third_factor = $this->request->getPost('third_factor');
        $fourth_factor = $this->request->getPost('fourth_factor');
        $fifth_factor = $this->request->getPost('fifth_factor');
        $except1 = $this->request->getPost('except1');
        $except2 = $this->request->getPost('except2');
        $except3 = $this->request->getPost('except3');
        $except4 = $this->request->getPost('except4');
        $except5 = $this->request->getPost('except5');
        $except1_detail = $this->request->getPost('except1_detail');
        $except2_detail = $this->request->getPost('except2_detail');

        if (!$third_factor && !$fourth_factor) {
            $first_factor_point = 60;
            $second_factor_point = 40;
        } else if (!$fourth_factor) {
            $first_factor_point = 50;
            $second_factor_point = 30;
            $third_factor_point = 20;
        } else {
            $first_factor_point = 40;
            $second_factor_point = 30;
            $third_factor_point = 20;
            $fourth_factor_point = 10;
        }
        $data = [
            'member_ci' => $member_ci,
            'first_factor' => $first_factor,
            'first_factor_point' => $first_factor_point,
            'second_factor' => $second_factor,
            'second_factor_point' => $second_factor_point,
            'third_factor' => $third_factor,
            'third_factor_point' => $third_factor_point,
            'fourth_factor' => $fourth_factor,
            'fourth_factor_point' => $fourth_factor_point,
            'fifth_factor' => $fifth_factor,
            'except1' => $except1,
            'except2' => $except2,
            'except3' => $except3,
            'except4' => $except4,
            'except5' => $except5,
            'except1_detail' => $except1_detail,
            'except2_detail' => $except2_detail,
        ];

        // 데이터 저장
        $selected = $MatchFactorModel->where('member_ci', $member_ci)->first();
        if ($selected) {
            $inserted = $MatchFactorModel->update($member_ci, $data);
        } else {
            $inserted = $MatchFactorModel->insert($data);
        }

        // 저장완료 되었을 떄
        if ($inserted) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Partner info saved successfully', 'data' => $data]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Partner info saved successfully', 'data' => $data]);
        }
    }

    public function meetingSave()
    {
        $rules = [
            'category' => [
                'label' => 'category',
                'rules' => 'required',
                'errors' => [
                    'required' => '카테고리를 선택해주세요.',
                ]
            ],
            'recruitment_start_date' => [
                'label' => 'recruitment_start_date',
                'rules' => 'required',
                'errors' => [
                    'required' => '모집기간을 입력해주세요.',
                ]
            ],
            'recruitment_end_date' => [
                'label' => 'recruitment_end_date',
                'rules' => 'required',
                'errors' => [
                    'required' => '모집기간을 입력해주세요.',
                ]
            ],
            'meeting_start_date' => [
                'label' => 'meeting_start_date',
                'rules' => 'required',
                'errors' => [
                    'required' => '모임일자를 입력해주세요.',
                ]
            ],
            // 'meeting_end_date' => [
            //     'label' => 'meeting_end_date',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '모임일자를 입력해주세요.',
            //     ]
            // ],
            'number_of_people' => [
                'label' => 'number_of_people',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '모집 인원을 입력해주세요.',
                    'numeric' => '모집 인원은 숫자만 입력 가능합니다.'
                ]
            ],
            'group_min_age' => [
                'label' => 'group_min_age',
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => '최소 나이를 입력해주세요.',
                    'numeric' => '최소 나이는 숫자만 입력 가능합니다.',
                    'max_length' => '최소 나이는 최대 2자리 숫자여야 합니다.',
                ]
            ],
            'group_max_age' => [
                'label' => 'group_max_age',
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => '최대 나이를 입력해주세요.',
                    'numeric' => '최대 나이는 숫자만 입력 가능합니다.',
                    'max_length' => '최대 나이는 최대 2자리 숫자여야 합니다.'
                ]
            ],
            // 'matching_rate' => [
            //     'label' => 'matching_rate',
            //     'rules' => 'required|numeric|less_than_equal_to[100]',
            //     'errors' => [
            //         'required' => '매칭률을 선택해주세요.',
            //         'numeric' => '매칭률은 숫자만 입력 가능합니다.',
            //         'less_than_equal_to' => '매칭률은 100% 이하만 가능합니다.'
            //     ]
            // ],
            'title' => [
                'label' => 'title',
                'rules' => 'required',
                'errors' => [
                    'required' => '제목을 입력해주세요.',
                ]
            ],
            // 'content' => [
            //     'label' => 'content',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '내용을 입력해주세요.',
            //     ]
            // ],
            'meeting_place' => [
                'label' => 'meeting_place',
                'rules' => 'required',
                'errors' => [
                    'required' => '모임장소를 입력해주세요.',
                ]
            ],
            'membership_fee' => [
                'label' => 'membership_fee',
                'rules' => 'required',
                'errors' => [
                    'required' => '회비를 입력해주세요.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        } else {

            $file = $this->request->getFile('meeting_photo');
            $category = $this->request->getPost('category');
            $recruitment_start_date = $this->request->getPost('recruitment_start_date');
            $recruitment_end_date = $this->request->getPost('recruitment_end_date');
            $meeting_start_date = $this->request->getPost('meeting_start_date');
            $meeting_end_date = $this->request->getPost('meeting_start_date'); // 모임일자 시작/끝 동일하게 변경
            $number_of_people = $this->request->getPost('number_of_people');
            $group_min_age = $this->request->getPost('group_min_age');
            $group_max_age = $this->request->getPost('group_max_age');
            $matching_rate = $this->request->getPost('matching_rate');
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');
            //$reservation_previous = $this->request->getPost('reservation_previous');
            $meeting_place = $this->request->getPost('meeting_place') . " " . $this->request->getPost('meeting_place_detail');
            $membership_fee = $this->request->getPost('membership_fee');

            // CI조회
            $session = session();
            $member_ci = $session->get('ci');

            $encrypter = \Config\Services::encrypter();
            $chat_room_ci = base64_encode($encrypter->encrypt($member_ci, ['key' => 'nonamedm', 'blockSize' => 32]));
            $data = [
                'member_ci' => $member_ci,
                'category' => $category,
                'recruitment_start_date' => $recruitment_start_date,
                'recruitment_end_date' => $recruitment_end_date,
                'meeting_start_date' => $meeting_start_date,
                'meeting_end_date' => $meeting_end_date,
                'number_of_people' => $number_of_people,
                'group_min_age' => $group_min_age,
                'group_max_age' => $group_max_age,
                'matching_rate' => $matching_rate,
                'title' => $title,
                'content' => $content,
                //'reservation_previous' => $reservation_previous,
                'meeting_place' => $meeting_place,
                'membership_fee' => $membership_fee,
                'chat_room_ci' => $chat_room_ci
            ];

            // 데이터 저장
            $MeetingModel = new MeetingModel();
            $insertedMeetingIdx = $MeetingModel->insert($data);

            //참석 멤버 추가
            $meetMemdata = [
                'meeting_idx' => $insertedMeetingIdx,
                'member_ci' => $member_ci,
                'meeting_master' => 'K',
                'create_at' => date('Y-m-d H:i:s'),
            ];
            $meeting_members = new MeetingMembersModel();
            $meetingMembersIdx = $meeting_members->insert($meetMemdata);


            $ChatRoomModel = new ChatRoomModel();
            $ChatRoomMemberModel = new ChatRoomMemberModel();
            $MemberModel = new MemberModel();
            $chatquery = "INSERT INTO wh_chat_room
            (room_ci, room_type, room_count, delete_yn, created_at, updated_at)
            VALUES('" . $chat_room_ci . "', '1', '1', 'n', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
            $createMultyChat = $ChatRoomModel->query($chatquery);
            if ($createMultyChat) {
                $chatquery = "INSERT INTO wh_chat_room_member
                (room_ci, member_ci, entry_num, member_type, delete_yn, entered_at, created_at, updated_at)
                VALUES('" . $chat_room_ci . "', '" . $member_ci . "', '1','1', 'n', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
                $enterMultyChat = $ChatRoomMemberModel->query($chatquery);
            }


            if ($insertedMeetingIdx && $meetingMembersIdx && $createMultyChat) {
                $inserted_id = $MeetingModel->getInsertID();

                $upload = new Upload();
                $fileData = $upload->meetingUpload($file, $inserted_id, $member_ci);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Save Meeting successfully',
                    'data' => $data,
                    'inserted_id' => $inserted_id
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => 'error',
                    'message' => 'Failed to save meeting',
                    'data' => $data
                ]);
            }
        }
    }

    public function meetingFiltering()
    {
        $category = $this->request->getPost('category'); // 카테고리 필터링
        $searchText = $this->request->getPost('searchText'); // 검색 필터링
        $filterOption = $this->request->getPost('filterOption'); // 필터링

        $MeetingModel = new MeetingModel();
        $currentTime = date('Y-m-d H:i:s');

        // 카테고리 필터링
        if (!empty($category)) {
            $MeetingModel->where('category', $category);
        }

        // 검색어 필터링
        if (!empty($searchText)) {
            $MeetingModel->like('title', $searchText);
        }

        // 필터 옵션에 따른 정렬
        switch ($filterOption) {
            case 'create_at':
                $MeetingModel->orderBy('create_at', 'DESC');
                break;
            case 'meeting_start_date':
                $MeetingModel->orderBy('meeting_start_date', 'ASC');
                break;
            case 'membership_fee':
                $MeetingModel->orderBy('membership_fee', 'ASC');
                break;
            default:
                $MeetingModel->orderBy('create_at', 'DESC');
        }

        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $birthday = $MemberModel
            ->select('birthday')
            ->where('ci', $ci)
            ->first();

        $birthDate = \DateTime::createFromFormat('Ymd', $birthday['birthday']);
        $currentDate = new \DateTime('now');
        $age = $birthDate->diff($currentDate)->y;


        $meetings = $MeetingModel
            ->join('wh_meetings_files', 'wh_meetings_files.meeting_idx = wh_meetings.idx', 'left')
            ->where('wh_meetings.meeting_start_date >=', $currentTime)
            ->where('wh_meetings.delete_yn', 'N')
            ->where('wh_meetings.group_min_age <=', $age)
            ->where('wh_meetings.group_max_age >=', $age)
            ->findAll();

        $days = ['일', '월', '화', '수', '목', '금', '토'];

        $MeetingMembersModel = new MeetingMembersModel();

        // 각 모임에 대한 참여 인원 수 계산
        foreach ($meetings as &$meeting) {

            // 모임 시작 시간 포맷팅
            $meetingDateTimestamp = strtotime($meeting['meeting_start_date']);
            $meetingDay = date("w", $meetingDateTimestamp); //0~6
            $dayName = $days[$meetingDay]; //요일
            $meetingDateTime = date("Y.m.d ", $meetingDateTimestamp) . ' (' . $dayName . ') ' . date(" H:i", $meetingDateTimestamp);
            $meeting['meetingDateTime'] = $meetingDateTime;

            $memCount = $MeetingMembersModel
                ->where('meeting_idx', $meeting['idx'])
                ->where('delete_yn', 'N')
                ->countAllResults();
            $meeting['count'] = $memCount;
        }
        unset($meeting); // 참조 해제

        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($meetings);
    }


    public function myMeetingFiltering()
    {
        $filterOption = $this->request->getPost('filterOption'); // 필터링

        $session = session();
        $ci = $session->get('ci');

        $MeetingModel = new MeetingModel();

        // 필터 옵션에 따른 정렬
        switch ($filterOption) {
            case 'create_at':
                $MeetingModel->orderBy('create_at', 'DESC');
                break;
            case 'meeting_start_date':
                $MeetingModel->orderBy('meeting_start_date', 'ASC');
                break;
            case 'membership_fee':
                $MeetingModel->orderBy('membership_fee', 'ASC');
                break;
            default:
                $MeetingModel->orderBy('create_at', 'DESC');
        }

        $meetings = $MeetingModel
            ->join('wh_meetings_files', 'wh_meetings_files.meeting_idx = wh_meetings.idx', 'left')
            ->where('wh_meetings.member_ci', $ci)
            ->where('wh_meetings.delete_yn', 'N')
            ->findAll();

        $days = ['일', '월', '화', '수', '목', '금', '토'];
        $currentDate = new \DateTime();

        $MeetingMembersModel = new MeetingMembersModel();

        foreach ($meetings as &$meeting) {
            // 모임 시작 시간 포맷팅
            $meetingDateTimestamp = strtotime($meeting['meeting_start_date']);
            $meetingDay = date("w", $meetingDateTimestamp); //0~6
            $dayName = $days[$meetingDay]; //요일
            $meetingDateTime = date("Y.m.d ", $meetingDateTimestamp) . ' (' . $dayName . ') ' . date(" H:i", $meetingDateTimestamp);
            $meeting['meetingDateTime'] = $meetingDateTime;

            // 이벤트 종료 여부 판단
            $eventDate = new \DateTime($meeting['meeting_start_date']);
            $meeting['isEnded'] = ($currentDate > $eventDate);

            // 각 모임에 대한 참여 인원 수 계산
            $memCount = $MeetingMembersModel
                ->where('meeting_idx', $meeting['idx'])
                ->where('delete_yn', 'N')
                ->countAllResults();
            $meeting['count'] = $memCount;
        }
        unset($meeting); //참조 해제

        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($meetings);
    }

    public function allianceFiltering()
    {
        $category = $this->request->getPost('category'); // 카테고리 필터링
        $searchText = $this->request->getPost('searchText'); // 검색 필터링
        $filterOption = $this->request->getPost('filterOption'); // 필터링

        $AllianceModel = new AllianceModel();

        // 동적 WHERE 절 구성 시작
        $whereConditions = "a.delete_yn = 'N' AND a.alliance_application = '2'";
        $bindParams = [];

        // 카테고리 필터링 조건
        if (!empty($category)) {
            $whereConditions .= " AND alliance_type = :category:";
            $bindParams['category'] = $category;
        }

        // 검색어 필터링 조건
        if (!empty($searchText)) {
            $whereConditions .= " AND company_name LIKE :searchText:";
            $bindParams['searchText'] = '%' . $searchText . '%';
        }

        // 지역에 따른 정렬 조건
        if (!empty($filterOption)) {
            $whereConditions .= " AND address LIKE :filterOption:";
            $bindParams['filterOption'] = '%' . $filterOption . '%';
        }

        $query = "SELECT a.idx, a.company_name, a.address, a.alliance_type, b.alliance_idx, b.file_path, b.file_name
            FROM wh_alliance a
            LEFT JOIN (
                SELECT MIN(idx) AS idx, alliance_idx
                FROM wh_alliance_files
                GROUP BY alliance_idx
            ) AS bf ON bf.alliance_idx = a.idx
            LEFT JOIN wh_alliance_files b ON b.idx = bf.idx
            WHERE " . $whereConditions . "
            ORDER BY a.idx ASC";

        $alliances = $AllianceModel
            ->query($query, $bindParams)->getResultArray();

        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($alliances);
    }

    // public function allianceInfo()
    // {
    //     $idx = $this->request->getPost('idx');

    //     $AllianceModel = new AllianceModel();

    //     $alliances = $AllianceModel
    //         ->join('wh_alliance_files', 'wh_alliance_files.alliance_idx = wh_alliance.idx', 'left')
    //         ->where('wh_alliance.delete_yn', 'N')
    //         ->like('idx', $idx)
    //         ->findAll();


    //     // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
    //     return $this->response->setJSON($alliances);
    // }
    public function allianceReservation()
    {
        $date = $this->request->getGet('date');
        $idx = $this->request->getGet('idx');

        $AllianceReservationModel = new AllianceReservationModel();

        // date_default_timezone_set('Asia/Seoul');
        // $currentDateTime = date('Y-m-d');
        $reservations = $AllianceReservationModel
            ->select('reservation_date, reservation_time')
            ->where('wh_alliance_idx', $idx)
            ->where('reservation_date', $date)
            //->where('DATE(reservation_datetime)', $currentDateTime)
            ->where('delete_yn', 'N')
            ->orderBy('reservation_datetime', 'ASC')
            ->findAll();

        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($reservations);
    }

    public function myAlliance()
    {
        $session = session();
        $member_ci = $session->get('ci');


        $AllianceReservationModel = new AllianceReservationModel();

        // 동적 WHERE 절 구성 시작
        $whereConditions = "a.delete_yn = 'N'";
        $bindParams = [];

        // 카테고리 필터링 조건
        if (!empty($member_ci)) {
            $whereConditions .= " AND member_ci = :member_ci:";
            $bindParams['member_ci'] = $member_ci;
        }

        $query = "SELECT *
            FROM wh_alliance_reservation a
            
            WHERE " . $whereConditions . "
            AND reservation_date > now()
            ORDER BY a.idx ASC";

        $reservations = $AllianceReservationModel->query($query, $bindParams)->getResultArray();
        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($reservations);
    }
    public function myAllianceDetail()
    {
        $session = session();
        $member_ci = $session->get('ci');
        $idx = $this->request->getPost('value');

        $AllianceReservationModel = new AllianceReservationModel();

        // 동적 WHERE 절 구성 시작
        $whereConditions = "a.delete_yn = 'N'";
        $bindParams = [];

        // 카테고리 필터링 조건
        if (!empty($member_ci)) {
            $whereConditions .= " AND member_ci = :member_ci:";
            $bindParams['member_ci'] = $member_ci;
        }
        if (!empty($idx)) {
            $whereConditions .= " AND wh_alliance_idx = :wh_alliance_idx:";
            $bindParams['wh_alliance_idx'] = $idx;
        }
        // idx 조작방지를 위해 한번 더 조회하는것
        $query = "SELECT *
            FROM wh_alliance_reservation a
            
            WHERE " . $whereConditions . "
            ORDER BY a.idx ASC";

        $reservations = $AllianceReservationModel->query($query, $bindParams)->getResultArray();

        if ($reservations) {
            $AllianceModel = new AllianceModel();

            // 동적 WHERE 절 구성 시작
            $whereConditions = "a.delete_yn = 'N'";
            $bindParams = [];

            // 카테고리 필터링 조건
            $whereConditions .= " AND idx = :wh_alliance_idx:";
            $bindParams['wh_alliance_idx'] = $reservations[0]['wh_alliance_idx'];

            // idx 조작방지를 위해 한번 더 조회하는것
            $query = "SELECT a.address, a.alliance_pay, a.detailed_address
            FROM wh_alliance a
            WHERE " . $whereConditions . "
            ORDER BY a.idx ASC";

            $alliance = $AllianceReservationModel->query($query, $bindParams)->getResultArray();
            $alliance['reservation'] = $reservations[0];
        }
        // 조회된 모임 정보를 JSON 형식으로 클라이언트에 응답
        return $this->response->setJSON($alliance);
    }

    public function chgExcept()
    {
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        $value = $this->request->getPost('value');
        if ($value === 'mbti') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $mbtiCode]);
        } else if ($value === 'animal_type1') {
            $session = session();
            $member_ci = $session->get('ci');
            $MatchPartnerModel = new MatchPartnerModel();
            $selected = $MatchPartnerModel->where('member_ci', $member_ci)->first();
            if ($selected) {
                if ($selected['partner_gender'] === "0") {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $animalTypeFemale]);
                } else {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $animalTypeMale]);
                }
            } else {
                return $this->response->setJSON(['status' => 'success', 'message' => 'failed']);
            }
        } else if ($value === 'stylish') {
            $session = session();
            $member_ci = $session->get('ci');
            $MatchPartnerModel = new MatchPartnerModel();
            $selected = $MatchPartnerModel->where('member_ci', $member_ci)->first();
            if ($selected) {
                if ($selected['partner_gender'] === "0") {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $femaleStyle]);
                } else {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $maleStyle]);
                }
            } else {
                return $this->response->setJSON(['status' => 'success', 'message' => 'failed']);
            }
        } else if ($value === 'drinking') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $drinkingCode]);
        } else if ($value === 'year') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success']);
        } else if ($value === 'bodyshape') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $bodyshapeCode]);
        } else if ($value === 'city') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $sidoCode]);
        } else if ($value === 'married') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $maritalCode]);
        } else if ($value === 'smoker') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $smoking]);
        } else if ($value === 'religion') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $religionCode]);
        } else if ($value === 'gender') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $gender]);
        } else if ($value === 'height') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $height]);
        } else if ($value === 'education') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $educationCode]);
        } else if ($value === 'job') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $jobCode]);
        } else if ($value === 'asset_range') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $asset]);
        } else if ($value === 'income_range') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $income]);
        }

        // if ($value === '')
        // {
        // }
    }

    public function calcMatchRate()
    {
        $MemberModel = new MemberModel();
        $MatchPartnerModel = new MatchPartnerModel();
        $MatchFactorModel = new MatchFactorModel();
        $session = session();
        $ci = $session->get('ci');

        $myPartner = $MatchPartnerModel->where(['member_ci' => $ci])->first();
        $myFactor = $MatchFactorModel->where(['member_ci' => $ci])->first();

        $query = "SELECT * FROM members";
        $query .= " WHERE 1=1";
        if ($myFactor['except1'] && $myFactor['except1'] !== "" && $myFactor['except1'] !== null) //배제항목 있을 시 조건에서 배제하기
        {
            $query .= " AND (" . $myFactor['except1'] . " != '" . $myFactor['except1_detail'] . "'  OR " . $myFactor['except1'] . " IS NULL)";
        }
        if ($myFactor['except2'] && $myFactor['except2'] !== "" && $myFactor['except2'] !== null) //배제항목 있을 시 조건에서 배제하기
        {
            $query .= " AND (" . $myFactor['except2'] . " != '" . $myFactor['except2_detail'] . "'  OR " . $myFactor['except2'] . " IS NULL)";
        }
        if (!empty($myPartner['partner_gender']) || $myPartner['partner_gender'] != '')  // 성별 거르기
        {
            $query .= " AND (gender = '" . $myPartner['partner_gender'] . "')";
        }
        if ($myPartner && $myFactor) { // 파트너정보 있을때만 계산
            $datas = $MemberModel
                ->query($query)->getResultArray();
            // 세션(또는 파일로 로컬)에 저장한다. 이후 로그인 시 해당 ajax 작동시킨다.
            $mydata = $MemberModel->where(['ci' => $ci])->first();
            foreach ($datas as &$item) {
                // echo print_r($item[0]);
                // 기본배점 항목 계산
                $calc = 0;
                $calcMax = 0;
                if ($mydata['nickname'] !== $item['nickname']) { // 본인이 아닌 경우만 계산
                    $MatchRateModel = new MatchRateModel();

                    $your_rate = $MatchRateModel->where(['member_ci' => $item['ci'], 'your_ci' => $mydata['ci']])->first();

                    // group1 -- MBTI, 얼굴형, 스타일, 음주횟수
                    // MBTI
                    if ($item['mbti'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['mbti'] === $item['mbti'])
                        // 원하는 유형이 같을 때
                        {
                            $calcValue = $myFactor['group1'] * 1; // 점수
                        } else if ($myPartner['mbti'] === '16') // 무관일 때
                        {
                            $calcValue = $myFactor['group1'] * 1; // 모두에게 점수
                        } else {
                            $calcValue = 0;
                        }
                        $calc += $calcValue;
                    }
                    // 얼굴형
                    // if (!$item['mbti'] !== null) // 회원가입시 얼굴형 아직 없음
                    // {
                    //     $calcValue = 0;
                    //     if ($myPartner['mbti'] === $item['mbti'])
                    //     // 원하는 유형이 같을 때
                    //     {
                    //         $calcValue = $myFactor['group2'] * 1; // 점수
                    //     } else
                    //     {
                    //         $calcValue = 0;
                    //     }
                    //     $calc += $calcValue;
                    // }

                    // 스타일
                    if ($item['stylish'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['stylish'] === $item['stylish'])
                        // 원하는 유형이 같을 때
                        {
                            $calcValue = $myFactor['group1'] * 1; // 점수
                        } else {
                            $calcValue = 0;
                        }
                        $calc += $calcValue;
                    }
                    // 음주횟수
                    if ($item['drinking'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['drinking'] === '0') { // 음주횟수 - 무관
                            $calcValue = $myFactor['group1'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['drinking'] === $item['drinking']) {
                                $calcValue = $myFactor['group1'] * 1; // 그외 일치할 경우 점수
                            } else {
                                $calcValue = 0;
                            }
                        }
                        $calc += $calcValue;
                    }
                    // group2 -- 나이, 체형, 지역, 결혼경험, 흡연유무, 종교
                    // 나이
                    if ($item['birthday'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['fromyear'] !== null && $myPartner['toyear']) {
                            $birthday = $item['birthday'];
                            $birthYear = substr($birthday, 0, 4);
                            if ($birthYear >= $myPartner['fromyear'] && $birthYear <= $myPartner['toyear']) {
                                // 나이조건 적합
                                $calcValue = $myFactor['group2'] * 1;
                            } else {
                                // 나이 부적합
                                $calcValue = 0;
                            }
                        } else {
                            $calcValue = 0;
                        }

                        $calc += $calcValue;
                    }
                    // 체형
                    if ($item['bodyshape'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['bodyshape'] === '5')
                        //무관일 때
                        {
                            $calcValue = $myFactor['group2'] * 1; // 점수
                        } else if ($myPartner['bodyshape'] === $item['bodyshape'])
                        // 원하는 체형이 같을 때
                        {
                            $calcValue = $myFactor['group2'] * 1; // 모두에게 점수
                        } else if ((($myPartner['bodyshape'] - 1) === $item['bodyshape'] || ($myPartner['bodyshape'] + 1) === $item['bodyshape']))
                        // 바로옆 체형일 때
                        {
                            $calcValue = $myFactor['group2'] * 0.5; // 0.5배점
                        } else {
                            $calcValue = 0;
                        }
                        $calc += $calcValue;
                    }
                    // 지역
                    if ($item['city'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['region'] === $item['city'])
                        // 지역이 같을 때
                        {
                            $calcValue = $myFactor['group2'] * 1; // 점수
                        }

                        $calc += $calcValue;
                    }
                    // 결혼유무
                    if ($item['married'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['married'] === '0') { // 결혼유무 - 무관
                            $calcValue = $myFactor['group2'] * 1; // 모두에게 점수
                        } else {
                            if ($item['married'] === '0') {
                                $calcValue = $myFactor['group2'] * 1; // 미혼에게만 점수
                            }
                        }
                        $calc += $calcValue;
                    }
                    // 흡연유무
                    if ($item['smoker'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['smoker'] === '0') { // 흡연유무 - 무관
                            $calcValue = $myFactor['group2'] * 1; // 모두에게 점수
                        } else {
                            if ($item['smoker'] === '0') {
                                $calcValue = $myFactor['group2'] * 1; // 금연자만 점수
                            }
                        }
                        $calc += $calcValue;
                    }
                    // 종교
                    if ($item['religion'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['religion'] === '5') { // 종교유무 - 무관
                            $calcValue = $myFactor['group2'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['religion'] === $item['religion']) {
                                $calcValue = $myFactor['group2'] * 1; // 원하는 종교만 점수
                            }
                        }
                        $calc += $calcValue;
                    }
                    // group3 -- 성별, 키, 학력, 직업, 자산구간, 소득구간
                    // 성별은 애초에 거르기 때문에 배점 X
                    // 키
                    if ($item['height'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['height'] !== null) {
                            if ($item['height'] >= $myPartner['height']) {
                                // 원하는 키보다 클 때
                                $calcValue = $myFactor['group3'] * 1;
                            } else {
                                // 키 부적합
                                $calcValue = 0;
                            }
                        } else {
                            $calcValue = 0;
                        }

                        $calc += $calcValue;
                    }
                    // 학력
                    if ($item['education'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['education'] === '5') { // 학력 - 무관
                            $calcValue = $myFactor['group3'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['education'] <= $item['education']) {
                                $calcValue = $myFactor['group3'] * 1; // 원하는 학력 이상이면 점수
                            } else {
                                $calcValue = 0;
                            }
                        }
                        $calc += $calcValue;
                    }
                    // 직업(군)
                    if ($item['job'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['job'] === '3') { // 직업 - 무관
                            $calcValue = $myFactor['group3'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['job'] <= $item['job']) {
                                $calcValue = $myFactor['group3'] * 1; // 원하는 직업 이상이면 점수
                            } else {
                                $calcValue = 0;
                            }
                        }
                        $calc += $calcValue;
                    }
                    // 자산
                    if ($item['asset_range'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['asset_range'] === '6') { // 자산 - 무관
                            $calcValue = $myFactor['group3'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['asset_range'] <= $item['asset_range']) {
                                $calcValue = $myFactor['group3'] * 1; // 원하는 자산 이상이면 점수
                            } else {
                                $calcValue = 0;
                            }
                        }
                        $calc += $calcValue;
                    }
                    // 소득
                    if ($item['income_range'] !== null) {
                        $calcValue = 0;
                        if ($myPartner['income_range'] === '6') { // 소득 - 무관
                            $calcValue = $myFactor['group3'] * 1; // 모두에게 점수
                        } else {
                            if ($myPartner['income_range'] <= $item['income_range']) {
                                $calcValue = $myFactor['group3'] * 1; // 원하는 소득 이상이면 점수
                            } else {
                                $calcValue = 0;
                            }
                        }
                        $calc += $calcValue;
                    }


                    // 가중치 항목 계산
                    if ($myFactor['first_factor'] !== null) {
                        if ($item[$myFactor['first_factor']] === $myPartner[$myFactor['first_factor']]) {
                            $calcValue = $myFactor['first_factor_point']; // 가중치1 항목 일치 시 추가점수
                        }
                        $calc += $calcValue;
                        $calcMax += $calcValue;
                    }
                    if ($myFactor['second_factor'] !== null) {
                        if ($item[$myFactor['second_factor']] === $myPartner[$myFactor['second_factor']]) {
                            $calcValue = $myFactor['second_factor_point']; // 가중치2 항목 일치 시 추가점수
                        }
                        $calc += $calcValue;
                        $calcMax += $calcValue;
                    }
                    if ($myFactor['third_factor'] !== null) {
                        if ($item[$myFactor['third_factor']] === $myPartner[$myFactor['third_factor']]) {
                            $calcValue = $myFactor['third_factor_point']; // 가중치3 항목 일치 시 추가점수
                        }
                        $calc += $calcValue;
                        $calcMax += $calcValue;
                    }
                    if ($myFactor['fourth_factor'] !== null) {
                        if ($item[$myFactor['fourth_factor']] === $myPartner[$myFactor['fourth_factor']]) {
                            $calcValue = $myFactor['fourth_factor_point']; // 가중치4 항목 일치 시 추가점수
                        }
                        $calc += $calcValue;
                        $calcMax += $calcValue;
                    }

                    // group1 항목 총 4개 -- 얼굴형은 현재 제외이므로 3개만 계산
                    // group2 항목 총 6개
                    // group3 항목 총 6개 -- 성별은 애초에 거르기 때문에 5개만 계산
                    $calcMax += $myFactor['group1'] * 3 + $myFactor['group2'] * 6 + $myFactor['group3'] * 5;
                    $item['calc'] = $calc;
                    $item['calc_max'] = $calcMax;


                    // 계산한 가중치 항목 DB insert -> 회원수 너무 많아지면 python 배치 저장 필요

                    $selectParam = [
                        'member_ci' => $mydata['ci'],
                        // 'my_nickname' => $mydata['nickname'], 닉네임 수정할 수 있어서 조건 삭제
                        'your_ci' => $item['ci'],
                    ];
                    $selected = $MatchRateModel->where($selectParam)->first();
                    $ideal_rate = number_format(($calc === 0 ? 1 : $calc) / ($calcMax === 0 ? 100 : $calcMax) * 100, 2);
                    $match_rate = $your_rate ? number_format(($your_rate['ideal_rate'] + $ideal_rate) / 2, 2) : number_format(($ideal_rate) / 2, 2);
                    if ($selected) {
                        $query = "UPDATE wh_match_rate";
                        $query .= " SET match_score = '" . $calc . "'";
                        $query .= " , my_nickname = '" . $mydata['nickname'] . "'";
                        $query .= " , match_score_max = '" . $calcMax . "'";
                        $query .= " , match_rate = '" . $match_rate . "'";
                        $query .= " , ideal_rate = '" . $ideal_rate . "'";
                        $query .= " WHERE member_ci = '" . $mydata['ci'] . "'";
                        $query .= " AND your_ci = '" . $item['ci'] . "'";

                        $result = $MatchRateModel
                            ->query($query);
                    } else {
                        $insertParam = [
                            'member_ci' => $mydata['ci'],
                            'my_nickname' => $mydata['nickname'],
                            'your_ci' => $item['ci'],
                            'your_nickname' => $item['nickname'],
                            'match_score' => $item['calc'],
                            'match_score_max' => $item['calc_max'],
                            'match_rate' => $match_rate,
                            'ideal_rate' => $ideal_rate,
                        ];
                        $result = $MatchRateModel->insert($insertParam);
                    }
                }
            }
        } else {
        }


        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $datas]);
        } else {
            return $this->response->setJSON(['status' => 'success', 'message' => 'failed']);
        }
    }
    public function alianceUp()
    {

        $session = session();
        $ci = $session->get('ci');

        $AllianceMemberModel = new AllianceMemberModel();
        $AllianceModel = new AllianceModel();
        $AllianceFileModel = new AllianceFileModel();

        $mobile_no = $this->request->getPost('mobile_no');

        $encrypter = \Config\Services::encrypter();
        $alliance_ci = base64_encode($encrypter->encrypt($mobile_no, ['key' => 'nonamedm', 'blockSize' => 24]));

        $agree1 = $this->request->getPost('agree1');
        $agree2 = $this->request->getPost('agree2');
        $agree3 = $this->request->getPost('agree3');
        $gender = $this->request->getPost('gender');
        $alliance_type = $this->request->getPost('alliance_category');
        $company_contact = $this->request->getPost('alliance_number');
        $email = $this->request->getPost('alliance_email');
        $company_name = $this->request->getPost('alliance_name');
        $representative_name = $this->request->getPost('alliance_ceoname');
        $address = $this->request->getPost('alliance_address1');
        $detailed_address = $this->request->getPost('alliance_address2');
        $business_day = $this->request->getPost('alliance_bizday');
        $alliance_pay = $this->request->getPost('alliance_pay');
        $representative_contact = $this->request->getPost('alliance_ceonumber');
        $business_hour_start = $this->request->getPost('alliance_biztime1');
        $business_hour_end = $this->request->getPost('alliance_biztime2');
        $detailed_content = $this->request->getPost('detailed_content');

        $alliance_ceo_num = $this->request->getPost('alliance_ceo_num');
        $alliance_ceonum_file = $this->request->getFile('alliance_ceonum_file');
        $alliance_photo = $this->request->getFile('alliance_photo');
        $alliance_photo_detail = $this->request->getFiles('alliance_photo_detail');


        $data = [
            'mobile_no' => $mobile_no,
            'member_ci' => $ci,
            'alliance_ci' => $alliance_ci,
            'alliance_ceo_num' => $alliance_ceo_num,
            'ceo_name' => $representative_name,
            'company_name' => $representative_name,
            'gender' => $gender,
            'agree1' => $agree1,
            'agree2' => $agree2,
            'agree3' => $agree3,
        ];

        // 데이터 저장
        $inserted = $AllianceMemberModel->insert($data);

        // 제휴신청
        $session = session();
        $ci = $session->get('ci');

        $allianceData = [
            'member_ci' => $ci,
            'alliance_ci' => $alliance_ci,
            'alliance_ceo_num' => $alliance_ceo_num,
            'alliance_type' => $alliance_type,
            'company_contact' => $company_contact,
            'email' => $email,
            'company_name' => $company_name,
            'representative_name' => $representative_name,
            'address' => $address,
            'detailed_address' => $detailed_address,
            'representative_contact' => $representative_contact,
            'business_day' => $business_day,
            'business_hour_start' => $business_hour_start . ":00:00",
            'business_hour_end' => $business_hour_end . ":00:00",
            'detailed_content' => $detailed_content,
            'alliance_pay' => $alliance_pay,
            'alliance_application' => '1',
            'delete_yn' => 'n',
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $allianceId = $AllianceModel->insert($allianceData);

        if ($alliance_ceonum_file && $alliance_ceonum_file->isValid() && !$alliance_ceonum_file->hasMoved()) {

            // return var_dump($alliance_ceonum_file->getClientName());
            $upload = new Upload();
            $fileData = $upload->allianceUpload($alliance_ceonum_file);
            $fileMainData = [
                'member_ci' => $ci,
                'alliance_idx' => $allianceId,
                'file_path' => $fileData['file_path'],
                'file_name' => $fileData['file_name'],
                'org_name' => $fileData['org_name'],
                'ext' => $fileData['ext'],
                'delete_yn' => 'n',
                'board_type' => 'ceonum',
                'extra1',
                'extra2',
                'extra3'
            ];
            $AllianceFileModel->insert($fileMainData);
        } else {
            $msg =  "사업자등록증 첨부파일이 등록되지 않았습니다.";
        }

        if ($alliance_photo && $alliance_photo->isValid() && !$alliance_photo->hasMoved()) {
            $upload = new Upload();
            $fileData = $upload->allianceUpload($alliance_photo);

            $fileMainData = [
                'member_ci' => $ci,
                'alliance_idx' => $allianceId,
                'file_path' => $fileData['file_path'],
                'file_name' => $fileData['file_name'],
                'org_name' => $fileData['org_name'],
                'ext' => $fileData['ext'],
                'delete_yn' => 'n',
                'board_type' => 'm',
                'extra1',
                'extra2',
                'extra3'
            ];
            $AllianceFileModel->insert($fileMainData);
        } else {
            $msg =  "메인 사진파일이 전송 되지 않았습니다.";
        }

        if (!empty($alliance_photo_detail)) {

            foreach ($alliance_photo_detail as $fileArray) {
                foreach ($fileArray as $file) {
                    // 각 파일을 처리하는 코드
                    $upload = new Upload();
                    $fileData = $upload->allianceUpload($file);

                    $fileDetailsData = [
                        'member_ci' => $ci,
                        'alliance_idx' => $allianceId,
                        'file_path' => $fileData['file_path'],
                        'file_name' => $fileData['file_name'],
                        'org_name' => $fileData['org_name'],
                        'ext' => $fileData['ext'],
                        'delete_yn' => 'n',
                        'board_type' => 'd'
                    ];

                    $fileDetailsInsert = $AllianceFileModel->insert($fileDetailsData);
                }
            }
        } else {
            $msg =  "상세 사진파일이 전송 되지 않았습니다.";
        }

        if ($allianceId) {
            $msg =  "제휴 신청 후 관리자 승인으로 제휴점에 입점 됩니다.";
            // return view('mo_alliance_success',['msg' => $msg]);
            return $this->response->setJSON(['status' => 'success', 'msg' => $msg]);
        }
    }

    public function createChat()
    {
        // 1:1 채팅 생성하기
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $member_ci = $session->get('ci');

        $nickname = $this->request->getPost('nickname');
        $query = "SELECT * FROM members WHERE nickname = '" . $nickname . "'";
        $sendto = $MemberModel
            ->query($query)->getResultArray();

        // 보내는사람, 받는사람의 member_ci 를 알파벳순으로 정렬 후
        // 두 값을 조합해서 room_ci를 생성함
        $sorted_values = [$member_ci, $sendto[0]['ci']];
        sort($sorted_values);
        $combined = implode('', $sorted_values);
        $room_ci = hash('sha256', $combined);

        $query = "SELECT * FROM wh_chat_room WHERE room_ci = '" . $room_ci . "' AND delete_yn='n'";
        $chatroom = $ChatRoomModel
            ->query($query)->getResultArray();

        if ($chatroom) {
            // 기존에 채팅이 존재할 경우
            $query = "SELECT * FROM wh_chat_room_member WHERE delete_yn = 'n' AND room_ci='" . $room_ci . "' AND member_ci='" . $member_ci . "'";
            $checkYn = $ChatRoomMemberModel
                ->query($query)->getResultArray();

            if ($checkYn) {
                // 내가 이 채팅에 참여중인 상태이면 바로 이동한다
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["room_ci" => $room_ci]]);
            } else {
                // 내가 이 채팅에서 나간 상태이면 참가 상태를 참여로 바꿔준다
                $query = "UPDATE wh_chat_room_member
                SET delete_yn='n', updated_at=CURRENT_TIMESTAMP
                WHERE room_ci='" . $room_ci . "' AND member_ci='" . $member_ci . "'";
                $updateChatRoom1 = $ChatRoomMemberModel
                    ->query($query);
                // $query = "UPDATE wh_chat_room_member
                // SET delete_yn='n', entered_at=CURRENT_TIMESTAMP, updated_at=CURRENT_TIMESTAMP
                // WHERE room_ci='" . $room_ci . "' AND member_ci='" . $sendto[0]['ci'] . "'";
                // $updateChatRoom2 = $ChatRoomMemberModel
                // ->query($query);
                $query = "UPDATE wh_chat_room SET room_count = (CAST(room_count AS UNSIGNED) + 1)
                           WHERE room_ci='" . $room_ci . "'";
                $updateChatRoomCount = $ChatRoomModel
                    ->query($query);
                if ($updateChatRoomCount) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["room_ci" => $room_ci]]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'failed', 'data' => '채팅방 참여 실패']);
                }
            }
        } else {
            // 없는 경우 신규 채팅방 생성
            $query = "INSERT INTO wh_chat_room (room_ci, room_type, room_count) VALUES('" . $room_ci . "','0','2');";
            $createChat = $ChatRoomModel
                ->query($query);

            // 채팅방 멤버 업데이트
            if ($createChat) {
                $query = "INSERT INTO wh_chat_room_member
                            (room_ci, member_ci, entry_num, member_type, entered_at, updated_at)
                            VALUES('" . $room_ci . "','" . $member_ci . "','1','0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
                $enterChatRoom1 = $ChatRoomMemberModel
                    ->query($query);
                $query = "INSERT INTO wh_chat_room_member
                            (room_ci, member_ci, entry_num, member_type, entered_at, updated_at)
                            VALUES('" . $room_ci . "','" . $sendto[0]['ci'] . "','2','0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
                $enterChatRoom2 = $ChatRoomMemberModel
                    ->query($query);
                if ($enterChatRoom1 && $enterChatRoom2) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["room_ci" => $room_ci]]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'failed', 'data' => '채팅방 참여 실패']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'failed', 'data' => '채팅방 생성 실패']);
            }
        }
    }
    public function createMultyChat()
    {
        // 다중 채팅 생성하기
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $member_ci = $session->get('ci');

        $room_ci = $this->request->getPost('room_ci');

        $query = "SELECT * FROM wh_chat_room WHERE room_ci = '" . $room_ci . "' AND delete_yn='n'";
        $chatroom = $ChatRoomModel
            ->query($query)->getResultArray();

        if ($chatroom) {
            // 기존에 채팅이 존재할 경우
            $query = "SELECT * FROM wh_chat_room_member WHERE delete_yn = 'n' AND room_ci='" . $room_ci . "' AND member_ci='" . $member_ci . "'";
            $checkYn = $ChatRoomMemberModel
                ->query($query)->getResultArray();

            if ($checkYn) {
                // 내가 이 채팅에 참여중인 상태이면 바로 이동한다
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["room_ci" => $room_ci]]);
            } else {
                // 내가 이 채팅에서 나간 상태이면 참가 상태를 참여로 바꿔준다
                $query = "UPDATE wh_chat_room_member
                SET delete_yn='n', updated_at=CURRENT_TIMESTAMP
                WHERE room_ci='" . $room_ci . "' AND member_ci='" . $member_ci . "'";
                $updateChatRoom1 = $ChatRoomMemberModel
                    ->query($query);
                // $query = "UPDATE wh_chat_room_member
                // SET delete_yn='n', entered_at=CURRENT_TIMESTAMP, updated_at=CURRENT_TIMESTAMP
                // WHERE room_ci='" . $room_ci . "' AND member_ci='" . $sendto[0]['ci'] . "'";
                // $updateChatRoom2 = $ChatRoomMemberModel
                // ->query($query);
                $query = "UPDATE wh_chat_room SET room_count = (CAST(room_count AS UNSIGNED) + 1)
                           WHERE room_ci='" . $room_ci . "'";
                $updateChatRoomCount = $ChatRoomModel
                    ->query($query);
                if ($updateChatRoomCount) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["room_ci" => $room_ci]]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'failed', 'data' => '채팅방 참여 실패']);
                }
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'failed', 'data' => '채팅방 참여 실패']);
        }
    }
    public function sendMsg()
    {
        // 1:1 채팅 생성하기
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $member_ci = $session->get('ci');

        $room_ci = $this->request->getPost('room_ci');
        // 여기서 member_ci로 내가 방 참가자 맞는지 조회 한번 해야함
        $query = "SELECT * FROM wh_chat_room_member WHERE member_ci = '" . $member_ci . "'
                  AND room_ci = '" . $room_ci . "'";
        $checkYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($checkYn) {
            // 해당 채팅방의 멤버가 맞다면 메세지 전송
            $msg_cont = $this->request->getPost('msg_cont');
            $msg_type = $this->request->getPost('msg_type');

            if ($msg_type == '0') {
                $msg_cont = htmlspecialchars($msg_cont, ENT_QUOTES);
                $msg_cont = str_replace("\n", "<br>", $msg_cont);
            }
            $query = "INSERT INTO wh_chat_room_msg
            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
            VALUES('" . $room_ci . "','" . $member_ci . "','9','0','" . $msg_cont . "','9','9');";

            $sendMsg = $ChatRoomMsgModel
                ->query($query);


            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $sendMsg]]);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }
    public function reloadMsg()
    {
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면
            $query = "SELECT crm.chk_entry_num, crm.chk_num, crm.created_at, crm.entry_num, crm.msg_cont, crm.msg_type, crm.updated_at,
                            (SELECT nickname FROM members WHERE ci = crm.member_ci) as nickname,
                            (CASE
                                WHEN member_ci = '" . $ci . "' THEN 'me'
                                ELSE 'you' 
                                END) AS chk,
                                (SELECT CAST(match_rate AS DECIMAL(10,0)) FROM wh_match_rate WHERE member_ci='" . $ci . "' AND your_nickname = nickname ORDER BY created_at DESC LIMIT 1) as match_rate,
                            (SELECT file_path FROM member_files WHERE member_ci = crm.member_ci AND board_type='main_photo' AND delete_yn='n') AS file_path,
                            (SELECT file_name FROM member_files WHERE member_ci = crm.member_ci AND board_type='main_photo' AND delete_yn='n') AS file_name
                            FROM wh_chat_room_msg  crm WHERE crm.room_ci = '" . $room_ci . "' AND crm.delete_yn='n' ORDER BY crm.created_at ASC";
            $allMsg = $ChatRoomMsgModel
                ->query($query)->getResultArray();
            if ($allMsg) {
                date_default_timezone_set('Asia/Seoul');
                $current_time = time();
                $today_date = date('Y-m-d', $current_time);
                foreach ($allMsg as &$row) {
                    $today_date === date('Y-m-d', strtotime($row['created_at'])) ?  $row['created_at'] = date('H:i', strtotime($row['created_at'])) : $row['created_at'] = date('m-d', strtotime($row['created_at']));
                }
            }
            $query = "SELECT * FROM wh_chat_room_member WHERE room_ci = '" . $room_ci . "' AND member_ci != '" . $ci . "' AND delete_yn='n'";

            $data['allMsg'] = $allMsg;

            // echo print_r($allMsg);
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $data]]);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }

    public function extRm()
    {
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면
            $query = "UPDATE wh_chat_room_member SET DELETE_YN='y' WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
            $extRm = $ChatRoomMemberModel
                ->query($query);
            $query = "UPDATE wh_chat_room SET room_count = (CAST(room_count AS UNSIGNED) - 1)
                        WHERE room_ci='" . $room_ci . "'";
            $updateChatRoomCount = $ChatRoomModel
                ->query($query);
            if ($updateChatRoomCount) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $extRm]]);
            } else {
                return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }

    public function banUsr()
    {
        $ChatRoomModel = new ChatRoomModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MemberModel = new MemberModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        $entry_num = $this->request->getPost('num');
        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면
            $query = "UPDATE wh_chat_room_member SET DELETE_YN='y' WHERE room_ci='" . $room_ci . "' AND entry_num='" . $entry_num . "'";
            $banUsr = $ChatRoomMemberModel
                ->query($query);
            $query = "UPDATE wh_chat_room SET room_count = (CAST(room_count AS UNSIGNED) - 1)
                WHERE room_ci='" . $room_ci . "'";
            $updateChatRoomCount = $ChatRoomModel
                ->query($query);
            if ($updateChatRoomCount) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $banUsr]]);
            } else {
                return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }

    public function sndRpt()
    {
        $ChatRoomMemberModel = new ChatRoomMemberModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        $entry_num = $this->request->getPost('num');
        $rptctgr = $this->request->getPost('rptctgr');
        $rpttxt = $this->request->getPost('rpttxt');

        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면
            $query = "INSERT INTO wh_report_member (member_ci, member_name, target_ci, target_name, report_text, report_category)
            VALUES('" . $ci . "', (SELECT name FROM members WHERE CI='" . $ci . "'), 
                    (SELECT member_ci FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND ENTRY_NUM='" . $entry_num . "'), 
                    (SELECT name FROM members WHERE ci=(SELECT member_ci FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND ENTRY_NUM='" . $entry_num . "')),
                    '" . $rpttxt . "', '" . $rptctgr . "');";

            $rptUsr = $ChatRoomMemberModel
                ->query($query);
            if ($rptUsr) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $rptUsr]]);
            } else {
                return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }
    public function submitScdl()
    {
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $MeetingPersonModel = new MeetingPersonModel();
        $pointModel = new PointModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        $scdl_date = $this->request->getPost('scdl_date');
        $scdl_type = $this->request->getPost('scdl_type');
        $scdl_fee = 5000;
        $scdl_type === '1' ?  $scdl_fee = 5000 :  $scdl_fee = 10000;

        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면 기존 약속 있는지 확인
            $query = "SELECT * FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND delete_yn='n'";
            $scheduleYn = $MeetingPersonModel
                ->query($query)->getResultArray();
            if ($scheduleYn) {
                // 기존에 약속이 있다면
                // 내 포인트 먼저 조회
                // $query = "SELECT my_point, 
                //                 (SELECT usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci = '" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1) AS usable_point 
                //             FROM wh_points WHERE member_ci='" . $ci . "' ORDER BY idx DESC LIMIT 1";
                // $myPointQuery = $pointModel
                //     ->query($query)->getResultArray();
                // $myPoint = $myPointQuery[0]['my_point'] ? intval($myPointQuery[0]['my_point']) : 0;
                // $usablePoint = $myPointQuery[0]['usable_point'] ? intval($myPointQuery[0]['usable_point']) : 0;

                // 기존 약속은 delete_yn = y 업데이트 후
                $query = "UPDATE wh_meeting_person
                SET delete_yn='y'
                WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
                $makeSchedule = $MeetingPersonModel
                    ->query($query);

                // 기존 예약금액 환불시키기
                // $query = "INSERT INTO wh_points (member_ci, my_point, add_point, point_details, point_type)
                // VALUES ('" . $ci . "', '" . ($myPoint + $usablePoint) . "','" . $usablePoint . "','모임 환불(+" . $usablePoint . ")','A');";
                // $refundPoint = $pointModel->query($query);

                // 환불 진행 성공시
                // if ($refundPoint) {
                // 포인트가 충분히 있으면
                // 새로운 약속 정보 INSERT --> 약속 만드는 사람은 포인트 걷지 않음
                $query = "INSERT INTO wh_meeting_person
                        (member_ci, scdl_type, scdl_date, number_of_people, chat_room_ci)
                        VALUES('" . $ci . "', '" . $scdl_type . "', STR_TO_DATE('" . $scdl_date . "', '%Y-%m-%d %H:%i'), 2, '" . $room_ci . "')";
                $makeSchedule = $MeetingPersonModel
                    ->query($query);

                // if ($myPoint + $usablePoint > $scdl_fee) {
                //     // 포인트 정보 업데이트 (환불 후 다시 모임에 포인트 입력)--> 약속 만드는 사람은 포인트 걷지 않음
                //     // $query = "INSERT INTO wh_points (member_ci, my_point, use_point, point_details, point_type)
                //     //         VALUES ('" . $ci . "', '" . ($myPoint + $usablePoint - $scdl_fee) . "','" . $scdl_fee . "','모임 예약금(-" . $scdl_fee . ")','U');";
                //     // $usePoint = $pointModel->query($query);
                //     // if (!$usePoint) {
                //     //     return $this->response->setJSON(['status' => 'failed', 'message' => '모임 생성 실패']);
                //     // }
                // } else {
                //     return $this->response->setJSON(['status' => 'failed', 'message' => 'no_point', 'result' => '3']);
                // }
                // }
            } else {
                // 내 포인트 먼저 조회
                // $query = "SELECT my_point, 
                //         (SELECT usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci = '" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1) AS usable_point 
                //             FROM wh_points WHERE member_ci='" . $ci . "' ORDER BY my_point DESC LIMIT 1";
                // $myPointQuery = $pointModel
                //     ->query($query)->getResultArray();
                // 포인트 사용 추가
                // $myPointQuery = $pointModel
                //     ->query($query)->getResultArray();
                // $myPoint = $myPointQuery[0]['my_point'] ? intval($myPointQuery[0]['my_point']) : 0;
                // $usablePoint = $myPointQuery[0]['usable_point'] ? intval($myPointQuery[0]['usable_point']) : 0;

                // 신규면 INSERT --> 약속 만드는 사람은 포인트 걷지 않음
                $query = "INSERT INTO wh_meeting_person
                        (member_ci, scdl_type, scdl_date, number_of_people, chat_room_ci)
                        VALUES('" . $ci . "', '" . $scdl_type . "', STR_TO_DATE('" . $scdl_date . "', '%Y-%m-%d %H:%i'), 2, '" . $room_ci . "')";
                $makeSchedule = $MeetingPersonModel
                    ->query($query);
                // if ($myPoint > $scdl_fee) {

                //     // 포인트 정보 업데이트 --> 약속 만드는 사람은 포인트 걷지 않음
                //     // $query = "INSERT INTO wh_points (member_ci, my_point, use_point, point_details, point_type)
                //     //         VALUES ('" . $ci . "', '" . ($myPoint - $scdl_fee) . "','" . $scdl_fee . "','모임 예약금(-" . $scdl_fee . ")','U');";
                //     // $usePoint = $pointModel->query($query);
                //     // if (!$usePoint) {
                //     //     return $this->response->setJSON(['status' => 'failed', 'message' => '모임 생성 실패']);
                //     // }
                // } else {
                //     return $this->response->setJSON(['status' => 'failed', 'message' => 'no_point', 'result' => '3']);
                // }
            }
            $msg_cont = '모임 생성 <br/>';
            $msg_cont .= '날짜 : ' . $scdl_date . '<br/>';
            // $msg_cont .= '회비 : ' . number_format($scdl_fee) . ' 원<br/>';
            $msg_cont .= '<br/>';
            $msg_cont .= '<span class="scdl_part_msg">참석하시려면 확인 버튼을 눌러주세요<br/><br/></span>';
            $msg_cont .= '<button class="scdl_confirm" onclick="partScdl()">확인</button>';
            $msgQuery = "INSERT INTO wh_chat_room_msg
            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
            VALUES('" . $room_ci . "','" . $ci . "','9','0','" . $msg_cont . "','9','9');";

            $ChatRoomMsgModel->query($msgQuery);

            if ($makeSchedule) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => '0']]);
            } else {
                return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }
    public function partScdl()
    {
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $MeetingPersonModel = new MeetingPersonModel();
        $pointModel = new PointModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');

        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면 모임에 참석중인지 확인
            $query = "SELECT * FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
            $scheduleYn = $MeetingPersonModel
                ->query($query)->getResultArray();
            if ($scheduleYn) {
                // 이미 참석중이면
                // 내 포인트 먼저 조회
                // $query = "SELECT my_point, 
                //         (SELECT usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci = '" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1) AS usable_point 
                //             FROM wh_points WHERE member_ci='" . $ci . "' ORDER BY idx DESC LIMIT 1";
                // $myPointQuery = $pointModel
                //     ->query($query)->getResultArray();
                // $myPoint = $myPointQuery[0]['my_point'] ? intval($myPointQuery[0]['my_point']) : 0;
                // $usablePoint = $myPointQuery[0]['usable_point'] ? intval($myPointQuery[0]['usable_point']) : 0;

                // 기존 약속은 delete_yn = y 업데이트 후
                $query = "UPDATE wh_meeting_person
                SET delete_yn='y'
                WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
                $makeSchedule = $MeetingPersonModel
                    ->query($query);

                // 기존 예약금액 환불시키기
                // $query = "INSERT INTO wh_points (member_ci, my_point, add_point, point_details, point_type)
                // VALUES ('" . $ci . "', '" . ($myPoint + $usablePoint) . "','" . $usablePoint . "','모임 환불(+" . $usablePoint . ")','A');";
                // $refundPoint = $pointModel->query($query);

                // 최신 약속에 맞춰서 내용 업데이트
                $query = "SELECT * FROM wh_meeting_person WHERE  chat_room_ci='" . $room_ci . "' AND delete_yn='n'";
                $newScdlQuery = $pointModel
                    ->query($query)->getResultArray();
                // $scdl_fee = $newScdlQuery[0]['membership_fee'];
                $scdl_type = $newScdlQuery[0]['scdl_type'];
                $scdl_date = $newScdlQuery[0]['scdl_date'];

                // 환불 진행 성공시
                if (!$newScdlQuery) {
                    return $this->response->setJSON(['status' => 'failed', 'message' => 'refund_fail', 'result' => '4']);
                } else {
                    // 포인트가 충분히 있으면
                    // 새로운 약속 정보 INSERT
                    $query = "INSERT INTO wh_meeting_person
                        (member_ci, scdl_type, scdl_date, number_of_people, chat_room_ci)
                        VALUES('" . $ci . "', '" . $scdl_type . "', STR_TO_DATE('" . $scdl_date . "', '%Y-%m-%d %H:%i'), 2, '" . $room_ci . "')";
                    $makeSchedule = $MeetingPersonModel
                        ->query($query);

                    // 포인트 정보 업데이트 (환불 후 다시 모임에 포인트 입력)
                    // $query = "INSERT INTO wh_points (member_ci, my_point, use_point, point_details, point_type)
                    //         VALUES ('" . $ci . "', '" . ($myPoint + $usablePoint - $scdl_fee) . "','" . $scdl_fee . "','모임 예약금(-" . $scdl_fee . ")','U');";
                    // $usePoint = $pointModel->query($query);
                    // if (!$usePoint) {
                    //     return $this->response->setJSON(['status' => 'failed', 'message' => '모임 생성 실패']);
                    // } else {
                    // }
                    $msg_cont = '날짜 : ' . $scdl_date . '<br/>';
                    $msg_cont .= '모임 참가에 동의하였습니다 <br/>';
                    $msgQuery = "INSERT INTO wh_chat_room_msg
                            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
                            VALUES('" . $room_ci . "','" . $ci . "','9','0','" . $msg_cont . "','9','9');";

                    $ChatRoomMsgModel->query($msgQuery);
                    return $this->response->setJSON(['status' => 'success', 'message' => '참석 정보를 업데이트 했습니다', 'result' => '1']);
                    //             if ($myPoint + $usablePoint > $scdl_fee) {
                    // } else {
                    //     return $this->response->setJSON(['status' => 'failed', 'message' => 'no-point', 'result' => '3']);
                    // }
                }
            } else {
                // 신규면 INSERT
                // 내 포인트 먼저 조회
                // $query = "SELECT my_point, 
                //         (SELECT usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci = '" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1) AS usable_point 
                //         FROM wh_points WHERE member_ci='" . $ci . "' ORDER BY idx DESC LIMIT 1";
                // $myPointQuery = $pointModel
                //     ->query($query)->getResultArray();
                // $myPoint = $myPointQuery[0]['my_point'] ? intval($myPointQuery[0]['my_point']) : 0;
                // $usablePoint = $myPointQuery[0]['usable_point'] ? intval($myPointQuery[0]['usable_point']) : 0;

                $query = "SELECT * FROM wh_meeting_person WHERE chat_room_ci = '" . $room_ci . "' AND delete_yn='n'";
                $scheduleData = $MeetingPersonModel
                    ->query($query)->getResultArray();
                if ($scheduleData) {
                    // $scdl_fee = $scheduleData[0]['membership_fee'];

                    $query = "INSERT INTO wh_meeting_person
                    (member_ci, chat_room_ci, scdl_type, scdl_date, number_of_people)
                    VALUES('" . $ci . "', '" . $room_ci . "','" . $scheduleData[0]['scdl_type'] . "','" . $scheduleData[0]['scdl_date'] . "','" . $scheduleData[0]['number_of_people'] . "')";
                    $makeSchedule = $MeetingPersonModel
                        ->query($query);


                    // 포인트 정보 업데이트
                    // if ($myPoint > $scdl_fee) {
                    //     $query = "INSERT INTO wh_points (member_ci, my_point, use_point, point_details, point_type)
                    //             VALUES ('" . $ci . "', '" . ($myPoint - $scdl_fee) . "','" . $scdl_fee . "','모임 예약금(-" . $scdl_fee . ")','U');";
                    //     $usePoint = $pointModel->query($query);
                    //     if (!$usePoint) {
                    //         return $this->response->setJSON(['status' => 'failed', 'message' => '모임 생성 실패']);
                    //     }
                    // }

                    $msg_cont = '모임 참가에 동의하였습니다 <br/>';
                    $msgQuery = "INSERT INTO wh_chat_room_msg
                        (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
                        VALUES('" . $room_ci . "','" . $ci . "','9','0','" . $msg_cont . "','9','9');";

                    $ChatRoomMsgModel->query($msgQuery);
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '0', 'data' => ["reulst_value" => $makeSchedule]]);
                } else {
                    $msg_cont = '모임을 확인할 수 없습니다 <br/> 모임을 다시 등록해 주세요';
                    $msgQuery = "INSERT INTO wh_chat_room_msg
                        (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
                        VALUES('" . $room_ci . "','" . $ci . "','9','0','" . $msg_cont . "','9','9');";

                    $ChatRoomMsgModel->query($msgQuery);
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '2']);
                }
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>fn_alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }
    public function usablePoint()
    {
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MeetingPersonModel = new MeetingPersonModel();
        $MeetingModel = new MeetingModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        $room_type = $this->request->getPost('room_type');

        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면 

            if ($room_type === '0') { // 1:1 채팅방일 때
                // 참가중인 약속이 있는지 확인 및 사용가능 포인트 확인
                $query = "SELECT FORMAT(CAST(usable_point AS UNSIGNED),0) AS usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
                $usblPoint = $MeetingPersonModel
                    ->query($query)->getResultArray();
                if ($usblPoint) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $usblPoint]]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'error']);
                }
            } else { // 단톡방일 때
                $query = "SELECT FORMAT(CAST(meeting_points AS UNSIGNED),0) AS usable_point FROM wh_meeting_points WHERE meeting_idx=(SELECT IDX FROM wh_meetings WHERE chat_room_ci='" . $room_ci . "')";
                $usblPoint = $MeetingModel
                    ->query($query)->getResultArray();
                if ($usblPoint) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => ["reulst_value" => $usblPoint]]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'error']);
                }
            }

            // echo print_r($allMsg);
        } else {
            echo "<script>alert('잘못된 접근입니다'); moveToUrl('/');</script>";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed']);
        }
    }
    public function sndDeposit()
    {
        $ChatRoomMemberModel = new ChatRoomMemberModel();
        $MeetingPersonModel = new MeetingPersonModel();
        $ChatRoomMsgModel = new ChatRoomMsgModel();
        $pointModel = new PointModel();

        $session = session();
        $ci = $session->get('ci');
        $room_ci = $this->request->getPost('room_ci');
        $room_type = $this->request->getPost('room_type');
        $snd_dpst = $this->request->getPost('snd_dpst');
        $postData = $this->request->getPost('uploadedFiles');

        // 내가 이 방의 참가자가 맞는지 다시 확인
        $query = "SELECT * FROM wh_chat_room_member WHERE room_ci='" . $room_ci . "' AND member_ci='" . $ci . "'";
        $memberYn = $ChatRoomMemberModel
            ->query($query)->getResultArray();
        if ($memberYn) {
            // 내가 방 참가자가 맞으면

            // 예약금 전송처리 시작
            // 가용 포인트 쿼리
            $query = "SELECT usable_point FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1";
            $usblPointQuery = $ChatRoomMemberModel->query($query)->getResultArray();
            $usablePoint = intval($usblPointQuery[0]['usable_point']);

            if ($snd_dpst > $usablePoint) {
                // 가용 포인트보다 보낼금액이 크면
                return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'result' => '1',]);
            } else {
                if ($room_type === '0') {
                    // 1:1 채팅일때, 나 말고 다른사람에게 전송
                    $query = "SELECT member_ci AS target FROM wh_meeting_person WHERE chat_room_ci='" . $room_ci . "' AND member_ci!='" . $ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1";
                    $targetQuery = $ChatRoomMemberModel->query($query)->getResultArray();
                    $target = $targetQuery[0]['target'];
                } else if ($room_type === '1') {
                    // 단체 채팅일때 방장에게 전송
                    $query = "SELECT member_ci AS target FROM wh_meetings WHERE chat_room_ci='" . $room_ci . "' AND delete_yn='n' ORDER BY create_at DESC LIMIT 1";
                    $targetQuery = $ChatRoomMemberModel->query($query)->getResultArray();
                    $target = $targetQuery[0]['target'];
                }

                $query = "SELECT my_point
                        FROM wh_points WHERE member_ci='" . $target . "' ORDER BY idx DESC LIMIT 1";
                $targetPointQuery = $pointModel
                    ->query($query)->getResultArray();
                $targetPoint = $targetPointQuery[0]['my_point'];


                $query = "INSERT INTO wh_points (member_ci, my_point, use_point, point_details, point_type)
                                VALUES ('" . $target . "', '" . ($targetPoint + $snd_dpst) . "','" . $snd_dpst . "','모임 예약금 수령(+" . $snd_dpst . ")','A');";
                $sendPoint = $pointModel->query($query);

                $query = "UPDATE wh_meeting_person SET usable_point='" . ($usablePoint - $snd_dpst) . "'
                 WHERE chat_room_ci='" . $room_ci . "' AND member_ci='" . $ci . "' AND delete_yn='n'";
                $updateUsablePoint = $ChatRoomMemberModel->query($query);

                if ($sendPoint && $updateUsablePoint) {

                    // 전송된 사진 처리 (미정)
                    $insertedData = [];

                    if (!empty($postData)) {
                        // $postData 배열을 반복하여 데이터베이스에 삽입
                        foreach ($postData as $fileInfo) {
                            // $fileInfo에서 필요한 데이터를 추출하여 데이터베이스에 삽입
                            $org_name = $fileInfo['org_name'];
                            $file_name = $fileInfo['file_name'];
                            $file_path = $fileInfo['file_path'];
                            $ext = $fileInfo['ext'];
                            $data = [
                                'member_ci' => $ci,
                                'feed_cont' => '신규 회원가입을 축하합니다',
                                'public_yn' => '0',
                                'thumb_filename' => $file_name,
                                'thumb_filepath' => $file_path,
                            ];
                            // $inserted = $MemberFeedModel->insert($data);
                            $inserted = true;
                            if ($inserted) {
                                // $feed_idx = $MemberFeedModel->insertID();
                                $data = [
                                    // 'feed_idx' => $feed_idx,
                                    // 'member_ci' => $ci,
                                    // 'org_name' => $org_name,
                                    // 'file_name' => $file_name,
                                    // 'file_path' => $file_path,
                                    // 'ext' => $ext,
                                    // 'board_type' => 'feeds',
                                ];
                                // $inserted = $MemberFeedFileModel->insert($data);
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
                    // 전송된 사진 처리 (끝)

                    $msg_cont = "모임장에게 예약금을 전송했습니다.<br/> 내지갑 에서 확인해 보세요!";
                    // 전송 성공 메세지
                    $query = "INSERT INTO wh_chat_room_msg
                    (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
                    VALUES('" . $room_ci . "','" . $ci . "','9','0','" . $msg_cont . "','9','9');";

                    $sendMsg = $ChatRoomMsgModel
                        ->query($query);

                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '0', 'sendMsg' => $sendMsg]);
                }
            }





            // echo print_r($allMsg);
        } else {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'query' => $query]);
        }
    }
    public function gunguSch()
    {
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        $value = $this->request->getPost('value');
        $insertedData = [];
        foreach ($gunguCode as $item) {
            if ($item['p_id'] === $value) {
                $insertedData[] = $item;
            }
        }

        usort($insertedData, function ($a, $b) {
            return strcmp($a['name'], $b['name']); // 'name' 항목을 기준으로 문자열 순으로 정렬
        });

        if ($insertedData) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'data' => $insertedData]);
        }
    }
    public function getVerifyCode()
    {
        $EmailRegisterModel = new EmailRegisterModel();

        // 임시 테이블 만들 때 까지 전화번호가 임시 ci
        $ci = $this->request->getPost('ci');
        $emailAddr = "" . $this->request->getPost('email');
        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $emailAddr)) {
            // echo "유효한 이메일 주소입니다.";
        } else {
            // echo "유효하지 않은 이메일 주소입니다.";
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'result' => '1']);
        }
        $random_numbers = "";
        for ($i = 0; $i < 6; $i++) {
            $random_numbers .= rand(0, 9); // 0부터 9까지의 랜덤한 숫자 생성하여 문자열에 추가
        }

        $email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'smtp.naver.com';
        $config['SMTPUser'] = 'nonamedm@naver.com';
        $config['SMTPPass'] = '6U829H5WJDZP';
        $config['SMTPPort'] = '465';
        $config['SMTPCrypto'] = 'ssl';
        $config['SMTPTimeout'] = '10';
        $config['wordWrap'] = true;
        $config['mailType'] = 'html';


        $email->initialize($config);
        $email->clear();

        $email->setFrom('nonamedm@naver.com', 'Matchfy 관리자');
        $email->setTo($emailAddr);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject('Matchfy 인증코드 발송');
        $msgCont = '
            <img src="https://nonamedm18.mycafe24.com/static/images/matchfy.png">
            <h2 style="color: #6f6f6f;">
                이메일 인증코드를 입력하세요 
            </h2>
            <br />
            <h1>[ <em  style="color: #ff0267;">' . $random_numbers . '</em> ]</h1>
        ';

        $email->setMessage($msgCont);

        $emailSend = $email->send();

        $emailSend = true;
        if ($emailSend) {
            $query = "UPDATE wh_email_register SET delete_yn='y', updated_at=CURRENT_TIMESTAMP
                        WHERE mobile_no='" . $ci . "' AND member_email='" . $emailAddr . "' AND delete_yn='n' AND verify_yn='n'";
            $updateRegist = $EmailRegisterModel
                ->query($query);
            if ($updateRegist) {
                $query = "INSERT INTO wh_email_register 
                        (mobile_no, member_email, verify_code, created_at, updated_at)
                        VALUES('" . $ci . "', '" . $emailAddr . "', '" . $random_numbers . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
                $createRegist = $EmailRegisterModel
                    ->query($query);

                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '0', 'data' => $random_numbers, 'email' => $emailSend, 'code' => $createRegist]);
            }
        } else {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'result' => '2']);
        }
    }

    public function chkVerifyCode()
    {
        $EmailRegisterModel = new EmailRegisterModel();

        $ci = $this->request->getPost('ci');
        $code = $this->request->getPost('code');
        $emailAddr = "" . $this->request->getPost('email');

        $query = "SELECT * FROM wh_email_register 
                    WHERE mobile_no='" . $ci . "' AND member_email='" . $emailAddr . "' AND delete_yn='n' ORDER BY created_at DESC LIMIT 1";
        $chkRegist = $EmailRegisterModel
            ->query($query)->getResultArray();
        if ($chkRegist) {
            // 코드가 맞는지 확인
            if ($chkRegist[0]['verify_code'] === $code) {
                $query = "UPDATE wh_email_register SET verify_yn='y' 
                            WHERE mobile_no = '" . $chkRegist[0]['mobile_no'] . "' AND member_email =  '" . $chkRegist[0]['member_email'] . "' AND delete_yn = 'n' AND verify_yn='n'";
                $confirmRegist = $EmailRegisterModel
                    ->query($query);

                if ($confirmRegist) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '0']);
                } else {
                    return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'result' => '2']);
                }
            } else {
                return $this->response->setJSON(['status' => 'success', 'message' => 'success', 'result' => '1']); // 잘못된 코드입니다.
            }
        } else {
            return $this->response->setJSON(['status' => 'failed', 'message' => 'failed', 'result' => '2']);
        }
    }
}
