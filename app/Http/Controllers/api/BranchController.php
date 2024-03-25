<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Province::getAllProvince();
        return response()->json($branches);
    }

    public function show($id) {
        $branches = Branch::getProductByBranch($id);
        return $branches;
    }
}
