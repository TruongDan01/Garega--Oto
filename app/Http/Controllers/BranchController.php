<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Model\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return BranchResource::collection(Branch::all());
    }

    public function show($id)
    {
        return new BranchResource(Branch::findOrFail($id));
    }

}
