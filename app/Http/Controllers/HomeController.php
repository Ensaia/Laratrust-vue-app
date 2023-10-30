<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data['count_users'] = User::count();
        $data['count_roles'] = Role::count();
        $data['count_permissions'] = Permission::count();
        return response()->json(['data' => $data]);
        return view('home.index',$data);
    }
    public function profile(){
        return view('home.profile');
    }
}
