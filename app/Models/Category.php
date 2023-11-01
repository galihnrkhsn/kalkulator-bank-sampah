<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategorySampahC;
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['nama', 'harga_kg', 'status'];

    const STATUS_AKTIF = 1;
    const STATUS_NONAKTIF = 2;

    protected static function booted(){
        static::creating(function($q){
            if (!isset($q->status)) {
                $q->status = self::STATUS_AKTIF;
            }
        });

    }
    public function history()
    {
        return $this->hasMany(History::class, 'category_id', 'id');
    }
}
