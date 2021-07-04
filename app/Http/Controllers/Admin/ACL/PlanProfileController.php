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
        $this->Plan = $plan;
        $this->Profile = $profile;
    }

    public function index($idPlan){
        $plan = $this->Plan->find($idPlan);


        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->Profiles()->paginate();

        return view('admin.pages.Plans.Profiles.index', compact('Plan', 'Profiles'));
    }

    public function ProfilesAvailable(Request $request, $idPlan){
        $filters = $request->except('_token');
        
        $plan = $this->Plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }
        
        $profiles = $plan->ProfilesAvailable($request->filter);

        return view('admin.pages.Plans.Profiles.available', compact('Plan', 'Profiles', 'filters'));
    }

    public function attachProfilesPlan(Request $request, $idPlan)
    {
        $plan = $this->Plan->find($idPlan);


        if(!$plan){
            return redirect()->back();
        }

        if(!$request->Profiles || count($request->Profiles) == 0){
            return redirect()->back()->with('error', 'Nenhuma permissão foi selecionada!');
        }

        $plan->Profiles()->attach($request->Profiles);
        
        return redirect()->route('Plans.Profiles.index', $idPlan);
    }

    public function detachProfilePlan($idPlan, $idProfile)
    {
        $plan = $this->Plan->find($idPlan);
        $profile = $this->Profile->find($idProfile);

        if(!$plan || !$profile){
            return redirect()->back();
        }

        $plan->Profiles()->detach($profile);

        return redirect()->route('Plans.Profiles.index', $idPlan);
    }

    public function Plans($idProfile){
        $profile = $this->Profile->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }

        $plans = $profile->Plans()->paginate();

        return view('admin.pages.Profiles.Plans.Plans', compact('Profile', 'Plans'));
    }
}
