<?php

namespace App\Http\Controllers;

use App\UsersInfo;

class UsersInfoController extends Controller
{

    public function show($id)
    {
        $user_info = UsersInfo::find($id);
        return response()->json($user_info, 200);
    }

    public function update($id)
    {
        $user_info = UsersInfo::find($id);
        $user_info->update
        ([
            'avatar' => request('avatar'),
            'full_name' => request('full_name'),
            'phone' => request('avatar'),
            'about' => request('avatar'),
            'rating' => request('rating'),
            'rule' => request('rule')
        ]);

        return response()->json($user_info, 200);
    }
}
