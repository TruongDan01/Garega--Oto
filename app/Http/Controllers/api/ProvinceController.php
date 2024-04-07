<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\BranchResource;

class ProvinceController extends Controller
{

    public function showProvinces()
    {
        $provinces = Province::getProvincesWithBranches();
        return ProvinceResource::collection($provinces);
    }

    public function showBranches($id)
    {
        $province = Province::findOrFail($id);
        $branches = $province->branches;
        return BranchResource::collection($branches);
    }

}
