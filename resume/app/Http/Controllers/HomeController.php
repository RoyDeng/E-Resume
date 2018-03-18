<?php

// 命名空間
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Resume\Entity\User;
use PDF;

class HomeController extends Controller {

    // 首頁
    public function indexPage(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        $binding = [
            'title' => '首頁',
            'user' => $user,
        ];
        return view('auth.index', $binding);
    }

    // 搜尋頁
    public function searchPage(){
        // 取得登入使用者資料
        $user_id = session()->get('user_id');
        $user = User::findOrFail($user_id);
        // 接收輸入資料
        $input = request()->all();
        $result = User::where('firstname', 'LIKE', '%' . $input['keyword'] . '%')
            ->orWhere('lastname', 'LIKE', '%' . $input['keyword'] . '%')
            ->orWhereHas('experience', function($query) use($input){
                $query->where('company', 'like', '%' . $input['keyword'] . '%')
                    ->orWhere('position', 'like', '%' . $input['keyword'] . '%');
            })
            ->orWhereHas('education', function($query) use($input){
                $query->where('school', 'like', '%' . $input['keyword'] . '%')
                    ->orWhere('department', 'like', '%' . $input['keyword'] . '%');
            });
        $binding = [
            'title' => '搜尋',
            'user' => $user,
            'count' => $result->get()->count(),
            'result' => $result->paginate(10),
        ];
        return view('auth.searchUser', $binding);
    }

    // 履歷頁
    public function resumePage($user_id){
        // 撈取使用者資料
        $user = User::findOrFail($user_id);
        $binding = [
            'user' => $user,
        ];
        return view('userResume', $binding);
    }

    
    // 履歷頁 (PDF)
    public function resumePDFPage($user_id){
        // 撈取使用者資料
        $user = User::findOrFail($user_id);
        $binding = [
            'user' => $user,
        ];
        PDF::SetFont('cid0jp', '', 12);
        PDF::SetTitle($user->lastname . $user->firstname . ' - 電子名片');
        PDF::AddPage();
        PDF::WriteHTML(view('userResumePDF', $binding)->render());
        PDF::Output(uniqid() . '.pdf');
    }

}
