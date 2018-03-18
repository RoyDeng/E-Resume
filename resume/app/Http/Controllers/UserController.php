<?php

// 命名空間
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Resume\Entity\User;
use Validator;
use Hash;

class UserController extends Controller {

    // 登入頁
    public function signInPage(){
        $binding = [
            'title' => '登入',
        ];
        return view('signIn', $binding);
    }

    // 處理登入資料
    public function signInProcess(){
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // Email
            'email' => [
                'required',
                'max:150',
                'email',
            ],
            // 密碼
            'password' => [
                'required',
                'min:6',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/sign-in')->withErros($validator)->withInput();
        }

        // 撈取使用者資料
        $user = User::where('email', $input['email'])->firstOrFail();

        // 檢查密碼是否正確
        $is_password_correct = Hash::check($input['password'], $user->password);

        if (!$is_password_correct) {
            // 密碼錯誤回傳錯誤訊息
            $error_message = [
                'msg' => [
                    '密碼驗證錯誤',
                ],
            ];
            return redirect('/sign-in')->withErros();
        }

        // session 記錄會員編號
        session()->put('user_id', $user->id);

        // 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
        return redirect()->intended('/');
    }

    // 註冊頁
    public function signUpPage(){
        $binding = [
            'title' => '註冊',
        ];
        return view('signUp', $binding);
    }
    
    // 處理註冊資料
    public function signUpProcess(){
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
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
            // Email
            'email' => [
                'required',
                'max:150',
                'email',
            ],
            // 密碼
            'password' => [
                'required',
                'min:6',
            ],
            //密碼驗證
            'password_confirmation' => [
                'required',
                'same:password',
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
        $input['password'] = Hash::make($input['password']);

        // 新增會員資料
        $user = User::create($input);

        // 重新導向到登入頁
        return redirect('/sign-in');
    }

    // 處理登出資料
    public function signOut(){
        // 清除 Session
        session()->forget('user_id');

        // 重新導向回登入頁
        return redirect('/sign-in');
    }
}