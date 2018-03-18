<?php

// 練習
Route::group(['prefix' => 'practice'], function(){

    // 三角形
    Route::get('/triangle', function(){

        $n = 6;

        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $n - $i; $j++) {
                echo '&nbsp;';
            }
            for ($z = 1; $z <= 2 * $i - 1; $z++) {
                echo '*';
            }
            echo '<br>';
        }
        
    });

    // 排序
    Route::get('/sort', function(){

        $arr = array(3, 0, 2, 5, -1, 4, 1);

        echo '排序前的數組: ' . implode(', ', $arr) . '<br>';

        function bubble_sort($arr) {
            for ($i = 0; $i < count($arr); $i++) {
                for ($j = 0; $j < count($arr) - 1; $j++) {
                    if ($arr[$i] < $arr[$j]) {
                        // 兩數交換位置
                        $x = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $x;
                    }
                }
            }

            return $arr;
        }

        echo '排序後的數組: ' . implode(', ', bubble_sort($arr));

    });

    // 階乘
    Route::get('/factorial', function(){

        function factorial($n){
            if ($n == 1 || $n == 0 ) {
                return 1;
            } else {
                return $n * factorial($n - 1);
            }
        }

        echo '10!=' . factorial(10);

    });

});

// 使用者登入頁面
Route::get('/sign-in', 'UserController@signInPage');

// 使用者登入處理
Route::post('/sign-in', 'UserController@signInProcess');

// 使用者註冊頁面
Route::get('/sign-up', 'UserController@signUpPage');

// 使用者資料新增
Route::post('/sign-up', 'UserController@signUpProcess');

// 使用者登出
Route::get('/sign-out', 'UserController@signOut');

// 路由群組指定中介層
Route::group(['middleware' => 'user.auth'], function(){

    // 首頁
    Route::get('/', 'HomeController@indexPage');

    // 搜尋頁
    Route::get('/search', 'HomeController@searchPage');

    // 使用者
    Route::group(['prefix' => 'user'], function(){

        // 使用者編輯頁面檢視
        Route::get('/edit', 'UserAuthController@userEditPage');

        // 使用者資料修改
        Route::post('/edit', 'UserAuthController@userEditProcess');

        // 傳記
        Route::group(['prefix' => 'bio'], function(){

            // 資料編輯頁面檢視
            Route::get('/edit', 'UserAuthController@userBioEditPage');

            // 資料修改
            Route::post('/edit', 'UserAuthController@userBioEditProcess');

        });

        // 工作經歷
        Route::group(['prefix' => 'experience'], function(){

            // 資料新增
            Route::post('/create', 'UserAuthController@userExpCreateProcess');

            // 撈取資料
            Route::get('/get_exp', 'UserAuthController@getUserExp');

            // 資料修改
            Route::post('/edit', 'UserAuthController@userExpEditProcess');

            // 資料刪除
            Route::post('/delete', 'UserAuthController@userExpDeleteProcess');

        });

        // 教育背景
        Route::group(['prefix' => 'education'], function(){

            // 資料新增
            Route::post('/create', 'UserAuthController@userEduCreateProcess');

            // 撈取資料
            Route::get('/get_edu', 'UserAuthController@getUserEdu');

            // 資料修改
            Route::post('/edit', 'UserAuthController@userEduEditProcess');

            // 資料刪除
            Route::post('/delete', 'UserAuthController@userEduDeleteProcess');

        });

        // 安全性
        Route::group(['prefix' => 'security'], function(){

            // 資料編輯頁面檢視
            Route::get('/edit', 'UserAuthController@userPasswordEditPage');

            // 資料修改
            Route::post('/edit', 'UserAuthController@userPasswordEditProcess');

        });

    });
});

Route::group(['prefix' => '{user_id}'], function(){

    // 履歷
    Route::get('/resume', 'HomeController@resumePage');

    // 履歷 (PDF)
    Route::get('/resume_pdf', 'HomeController@resumePDFPage');

});
