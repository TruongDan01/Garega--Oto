<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'status',
        'orders',
        'created_at',
        'updated_at',
    ];

    public static function getProductByBranch($id)
    {
        $branch = Branch::select('id', 'name', 'address')->find($id);

        if (!$branch) {
            return response()->json(['message' => 'Chi nhánh không tồn tại'], 404);
        }


        return response()->json($branch, 200);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
