<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public static function getAllProvince()
    {
        $provinces = Province::select('id', 'name')->withCount('branches')->get();
        return response()->json($provinces);
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
