<?php
namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolePermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {

        return new RoleResource($role);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles['roles'] = Role::all();
        $permissions['permissions'] = Permission::all();
        return view('role-permission.create', $roles, $permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'role_id' => 'required',
            'permission_id' => 'required'
        ];
        $messages = [];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $role = Role::findOrFail($request->role_id);
            $role->permissions()->attach([
                $request->permission_id
            ]);
            if ($role) {
                return response()->json(['success' => 'تمت عملية إضافة البيانات بنجاح']);
            } else {
                return response()->json(['error' => 'حدوث خطأ اثناء عملية إضافة البيانات']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        dd($request->all());
        $role = Role::findOrFail($request->role_id);
        $role->permissions()->detach([
            $request->permission_id
        ]);
        if ($role) {
            return response()->json(['success' => 'تمت عملية حذف البيانات بنجاح']);
        } else {
            return response()->json(['error' => 'حدوث خطأ اثناء عملية حذف البيانات']);
        }
    }
}
