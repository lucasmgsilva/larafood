<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Controller as ControllersController;
use App\Http\Requests\StoreUpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class RoleController extends ControllersController
{
    private $repository;

    public function __construct(Role $role) {
        $this->repository = $role;

        $this->middleware(['can:Cargos']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repository->paginate();

        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRoleRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->repository->find($id);

        if(!$role){
            return redirect()->back();
        }

        return view('admin.pages.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->repository->find($id);

        if(!$role){
            return redirect()->back();
        }

        return view('admin.pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRoleRequest $request, $id)
    {
        $role = $this->repository->find($id);

        if(!$role){
            return redirect()->back();
        }

        $role->update($request->all());

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->repository->find($id);

        if(!$role){
            return redirect()->back();
        }

        $role->delete();

        return redirect()->route('roles.index');
    }

    public function search(Request $request){        
        $filters = $request->except('_token');
        
        $filter = $request->filter;
        
        if(!$filter){
            return redirect()->back();
        }

        $roles = $this->repository->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate(1);

        return view('admin.pages.roles.index', compact('roles', 'filters'));
    }
}