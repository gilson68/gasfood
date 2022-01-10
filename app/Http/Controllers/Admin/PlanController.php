<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Support\Str;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();
		return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function Store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }
        return view('admin.pages.plans.show', compact('plan'));
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }

    public function destroy($url)
    {
        $plan = $this->repository
                        ->with('details')
                        ->where('url', $url)
                        ->first();

        if (!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem detalhes vinculados a esse plano, portanto não pode ser excluído');
        }

        $plan->delete();
        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', compact('plans'));
    }
}
