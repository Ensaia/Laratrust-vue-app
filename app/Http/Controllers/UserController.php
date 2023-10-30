<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Helpers\Authorization;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return new UserResource($user);

        //return  response()->json(["message" => "Forbidden"], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
       
        $user = User::where('id','=', $id)->delete();
        if ($user) {
            return redirect()->route('usersIndex')->with('success', 'تمت عملية حذف البيانات بنجاح');
        } else {
            return redirect()->route('usersIndex')->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
        }
    }
}
