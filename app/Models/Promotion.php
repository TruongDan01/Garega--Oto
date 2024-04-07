<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

    protected $fillable = [
        'products_id',
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'orders'
    ];

    protected $dates = ['start_date', 'end_date'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function getDurationAttribute()
    {
        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);

            // Tính khoảng thời gian
            $diff = $end->diff($start);

            // số ngày và số giờ
            $days = $diff->days;
            $hours = $diff->h;

            // phút
            $minutes = $diff->i;
            if ($minutes > 0) {
                $hours++;
            }

            return $days . ' ngày ' . $hours . ' giờ ' . $minutes . ' phút';
        }
        return null;
    }

    public function getPromotionStatusAttribute()
    {
        $now = Carbon::now();
        if ($now->lt($this->start_date)) {
            return 'Chưa bắt đầu';
        } elseif ($now->gte($this->start_date) && $now->lte($this->end_date)) {
            return 'Còn hạn';
        } else {
            return 'Hết hạn';
        }
    }
}
