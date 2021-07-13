<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(User $user) {
        $this->repository = $user;

        $this->middleware(['can:Usuários']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->tenantUser()->paginate();

        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $tenant = auth()->user()->tenant;
        $data = $request->all();
        $data['tenant_id'] = $tenant->id;
        $data['password'] = bcrypt($data['password']);
        
        $this->repository->create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->tenantUser()->find($id);

        if(!$user){
            return redirect()->back();
        }

        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->tenantUser()->find($id);

        if(!$user){
            return redirect()->back();
        }

        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserRequest $request, $id)
    {
        $user = $this->repository->tenantUser()->find($id);

        if(!$user){
            return redirect()->back();
        }

        $data = $request->only('name', 'email');

        if ($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->repository->tenantUser()->find($id);

        if(!$user){
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    public function search(Request $request){        
        $filters = $request->except('_token');
        
        $filter = $request->filter;
        
        if(!$filter){
            return redirect()->back();
        }

        $users = $this->repository->where('name', 'LIKE', "%{$filter}%")->orWhere('email', 'LIKE', "%{$filter}%")->tenantUser()->paginate();

        return view('admin.pages.users.index', compact('users', 'filters'));
    }
}
