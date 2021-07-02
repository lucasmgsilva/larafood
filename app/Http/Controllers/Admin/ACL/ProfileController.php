<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\StoreUpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Profile $profile) {
        $this->repository = $profile;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfileRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $this->repository->find($id);

        if(!$profile){
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = $this->repository->find($id);

        if(!$profile){
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfileRequest $request, $id)
    {
        $profile = $this->repository->find($id);

        if(!$profile){
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = $this->repository->find($id);

        if(!$profile){
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request){        
        $filters = $request->except('_token');
        
        $filter = $request->filter;
        
        if(!$filter){
            return redirect()->back();
        }

        $profiles = $this->repository->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate(1);

        return view('admin.pages.profiles.index', compact('profiles', 'filters'));
    }
}
