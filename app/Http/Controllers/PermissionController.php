<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PermissionResource::collection(Permission::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->validated());

        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request,Permission $permission)
    {
        $validated = $request->validated();
//        $validated = $request->safe()->only(['name']);
        $permission->update($validated);

        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->noContent();
    }
}
