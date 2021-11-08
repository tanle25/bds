<?php

namespace App\Models\Testmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewpageModel extends Model
{
    use HasFactory;
    protected $table='pages';
    protected $fillable = ['name','slug','description','content'];
}
