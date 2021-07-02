<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDetailPlanController;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    private $repository;
    private $plan;

    public function __construct (DetailPlan $detailPlan, Plan $plan){
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create($urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetailPlanController $request, $urlPlan){
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $urlPlan);
    }

    public function edit($urlPlan, $idDetail){
        $plan = $this->plan->where('url', $urlPlan)->first();

        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail ){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetailPlanController $request, $urlPlan, $idDetail){
        $plan = $this->plan->where('url', $urlPlan)->first();

        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail ){
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $urlPlan);
    }
}
