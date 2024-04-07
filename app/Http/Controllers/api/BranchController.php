<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return BranchResource::collection(['branch' => $branch]);
    }
}
