<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RoleResource;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return RoleResource::collection(Role::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        return new RoleResource($role);

//        $rules = [
//            'name' => 'required|unique:roles',
//             'display_name' => 'required',
//             'description' => 'required',
//        ];
//        $messages = [
//            'name.required' => 'يرجى تعبئة الحقل الخاص باسم الدور',
//            'display_name.required' => 'يرجى تعبئة الحقل الخاص بعنوان الدور',
//            'description.required' => 'يرجى تعبئة الحقل الخاص بوصف الدور',
//        ];
//        $validator = Validator::make($request->all(),$rules,$messages);
//
//        if ($validator->fails()) {
//            return response()->json([
//                "error" => 'validation_error',
//                "message" => $validator->errors(),
//            ], 422);
//        }else{
//
//                $role = Role::create([
//                    'name' => $request->name,
//                    'display_name' => $request->display_name,
//                    'description' => $request->description,
//                ]);
//            if($role){
//                return redirect()->route('roleCreate')->with('success', 'تمت عملية إضافة البيانات بنجاح');
//            }else{
//                return redirect()->route('roleCreate')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
//            }
//        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $validated = $request->validated();

        // Retrieve a portion of the validated input data...
//        $validated = $request->safe()->only(['name']);
//        $validated = $request->safe()->except(['name']);

        $role->update($validated);
        return new RoleResource($role);

//        $rules = [
//            'name' => 'required',
//            'display_name' => 'required',
//            'description' => 'required',
//        ];
//        $messages = [];
//        $validator = Validator::make($request->all(),$rules);
//
//        if ($validator->fails()) {
//            return redirect()->route('roleCreate')
//                ->withErrors($validator)
//                ->withInput();
//        }else{
//            $role = Role::findOrFail($id);
//                $role->update([
//                'name' => $request->name,
//                'display_name' => $request->display_name,
//                'description' => $request->description,
//            ]);
//            if($role){
//                return redirect()->route('roleEdit',['id' => $id])->with('success', 'تمت عملية تحديث البيانات بنجاح');
//            }else{
//                return redirect()->route('roleEdit',['id' => $id])->with('error', 'حدوث خطأ اثناء عملية تحديث البيانات');
//            }
//        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        $role = Role::where('id', $request->id)->delete();
        if($role){
            return redirect()->route('rolesIndex')->with('success', 'تمت عملية حذف البيانات بنجاح');
        }else{
            return redirect()->route('rolesIndex')->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
        }
    }

}
