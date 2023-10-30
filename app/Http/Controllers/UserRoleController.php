<?php
namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $roles = User::with('roles')->where('id' , '=' , $user->id);
        return UserResource::collection($roles->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users['users'] = User::all();
        $roles['roles'] = Role::all();
        return view('user-role.create', $users, $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'role_id' => 'required'
        ];
        $messages = [];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $user = User::findOrFail($request->user_id);
            // parameter can be a Role object, BackedEnum, array, id or the role string name
            $user->roles()->attach([
                $request->role_id
            ]);
            if ($user) {
                return response()->json(['success' => 'تمت عملية إضافة البيانات بنجاح']);
            } else {
                return response()->json(['error' => 'حدوث خطأ اثناء عملية إضافة البيانات']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        // parameter can be a Role object, BackedEnum, array, id or the role string name
        $user->roles()->detach([
            $request->role_id
        ]);
        if ($user) {
            return response()->json(['success' => 'تمت عملية تحديث البيانات بنجاح']);
        } else {
            return response()->json(['error' => 'حدوث خطأ اثناء عملية تحديث البيانات']);
        }
    }
}
