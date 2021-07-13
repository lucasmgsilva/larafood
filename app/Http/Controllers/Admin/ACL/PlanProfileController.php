<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    private $plan, $profile;

    public function __construct(Plan $plan, Profile $profile) {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function index($idPlan){
        $plan = $this->plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.index', compact('plan', 'profiles'));
    }

    public function ProfilesAvailable(Request $request, $idPlan){
        $filters = $request->except('_token');
        
        $plan = $this->plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }
        
        $profiles = $plan->ProfilesAvailable($request->filter);

        return view('admin.pages.Plans.Profiles.available', compact('plan', 'profiles', 'filters'));
    }

    public function attachProfilesPlan(Request $request, $idPlan)
    {
        $plan = $this->plan->find($idPlan);


        if(!$plan){
            return redirect()->back();
        }

        if(!$request->profiles || count($request->profiles) == 0){
            return redirect()->back()->with('error', 'Nenhuma permissão foi selecionada!');
        }

        $plan->Profiles()->attach($request->profiles);
        
        return redirect()->route('plans.profiles.index', $idPlan);
    }

    public function detachProfilePlan($idPlan, $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if(!$plan || !$profile){
            return redirect()->back();
        }

        $plan->Profiles()->detach($profile);

        return redirect()->route('plans.profiles.index', $idPlan);
    }

    public function Plans($idProfile){
        $profile = $this->profile->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }

        $plans = $profile->Plans()->paginate();

        return view('admin.pages.Profiles.Plans.Plans', compact('Profile', 'Plans'));
    }
}
