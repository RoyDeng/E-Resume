<?php

// 命名空間
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Resume\Entity\User;
use App\Resume\Entity\Experience;
use App\Resume\Entity\Education;
use Validator;
use Hash;
use Image;

class UserAuthController extends Controller {

    // 檔案頁
    public function userEditPage(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        $binding = [
            'title' => '基本資料',
            'user' => $user,
        ];
        return view('auth.showUser', $binding);
    }

    // 檔案資料更新處理
    public function userEditProcess(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 大頭貼
            'photo' => [
                'file',
                'image',
                'max: 10240',    // 10 MB
            ],
            // 姓氏
            'lastname' => [
                'required',
                'max:50',
            ],
            // 姓名
            'firstname' => [
                'required',
                'max:50',
            ],
            // 連絡電話
            'phone' => [
                'numeric',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/edit')->withErros($validator)->withInput();
        }

        if (isset($input['photo'])) {
            // 有上傳圖片
            $photo = $input['photo'];
            // 檔案副檔名
            $file_extension = $photo->getClientOriginalExtension();
            // 產生自訂隨機檔案名稱
            $file_name = uniqid() . '.' . $file_extension;
            // 檔案相對路徑
            $file_relative_path = 'images/user/' . $file_name;
            // 檔案存放目錄為對外開放 public 目錄下的相對位置
            $file_path = public_path($file_relative_path);
            // 裁切圖片
            $image = Image::make($photo)->fit(130, 130)->save($file_path);
            // 設定圖片檔案相對位置
            $input['photo'] = $file_relative_path;
        }

        $user->update($input);

        // 重新導向到資料編輯頁
        return redirect('/user/edit');
    }

    
    // 傳記頁
    public function userBioEditPage(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        $binding = [
            'title' => '傳記',
            'user' => $user,
        ];
        return view('auth.showUserBio', $binding);
    }

    // 傳記資料更新處理
    public function userBioEditProcess(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        // 接收輸入資料
        $input = request()->all();

        $user->update($input);

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    // 新增工作經歷
    public function userExpCreateProcess(){
        // 取得登入使用者編號
        $user_id = session()->get('user_id');
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 開始年份
            'from' => [
                'required',
                'numeric',
            ],
            // 結束年份
            'to' => [
                'required',
                'numeric',
            ],
            // 公司名稱
            'company' => [
                'required',
                'max:80',
            ],
            // 頭銜
            'position' => [
                'required',
                'max:80',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/bio/edit')->withErros($validator)->withInput();
        }

        $input['user_id'] = $user_id;

        $experience = Experience::create($input);

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    public function getUserExp() {
		if (request()->ajax()) {
            // 接收輸入資料
            $input = request()->all();
			$experience = Experience::findOrFail($input['id']);
			return response()->json($experience);
		}
    }
    
    // 工作經歷資料更新處理
    public function userExpEditProcess(){
        // 接收輸入資料
        $input = request()->all();
        // 撈取工作經歷資料
        $experience = Experience::findOrFail($input['id']);

        // 驗證規則
        $rules = [
            // 開始年份
            'from' => [
                'required',
                'numeric',
            ],
            // 結束年份
            'to' => [
                'required',
                'numeric',
            ],
            // 公司名稱
            'company' => [
                'required',
                'max:80',
            ],
            // 頭銜
            'position' => [
                'required',
                'max:80',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/bio/edit')->withErros($validator)->withInput();
        }

        $experience->update($input);

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    // 工作經歷資料刪除處理
    public function userExpDeleteProcess(){
        // 接收輸入資料
        $input = request()->all();
        // 撈取工作經歷資料
        $experience = Experience::findOrFail($input['id']);

        $experience->delete();

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    // 新增教育背景
    public function userEduCreateProcess(){
        // 取得登入使用者編號
        $user_id = session()->get('user_id');
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 開始年份
            'from' => [
                'required',
                'numeric',
            ],
            // 結束年份
            'to' => [
                'required',
                'numeric',
            ],
            // 學校
            'school' => [
                'required',
                'max:80',
            ],
            // 科系
            'department' => [
                'required',
                'max:80',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/bio/edit')->withErros($validator)->withInput();
        }

        $input['user_id'] = $user_id;

        $education = Education::create($input);

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    public function getUserEdu() {
		if (request()->ajax()) {
            // 接收輸入資料
            $input = request()->all();
			$education = Education::findOrFail($input['id']);
			return response()->json($education);
		}
    }

    // 教育背景資料更新處理
    public function userEduEditProcess(){
        // 接收輸入資料
        $input = request()->all();
        // 撈取教育背景資料
        $education = Education::findOrFail($input['id']);

        // 驗證規則
        $rules = [
            // 開始年份
            'from' => [
                'required',
                'numeric',
            ],
            // 結束年份
            'to' => [
                'required',
                'numeric',
            ],
            // 學校
            'school' => [
                'required',
                'max:80',
            ],
            // 頭銜
            'department' => [
                'required',
                'max:80',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/bio/edit')->withErros($validator)->withInput();
        }

        $education->update($input);

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    // 工作經歷資料刪除處理
    public function userEduDeleteProcess(){
        // 接收輸入資料
        $input = request()->all();
        // 撈取工作經歷資料
        $education = Education::findOrFail($input['id']);

        $education->delete();

        // 重新導向到資料編輯頁
        return redirect('/user/bio/edit');
    }

    // 安全性頁
    public function userPasswordEditPage(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        $binding = [
            'title' => '安全性',
            'user' => $user,
        ];
        return view('auth.userSecurity', $binding);
    }

    // 密碼資料更新處理
    public function userPasswordEditProcess(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 密碼
            'password' => [
                'required',
                'min:6',
            ],
            //密碼驗證
            'new_password' => [
                'required',
                'min:6',
            ],
            //密碼驗證
            'password_confirmation' => [
                'required',
                'same:new_password',
                'min:6',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/sign-up')->withErros($validator);
        }

        // 密碼加密
        $input['password'] = Hash::make($input['new_password']);

        $user->update($input);

        // 重新導向到資料編輯頁
        return redirect('/user/security/edit');
    }

}