<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategorySampahC;
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
}
