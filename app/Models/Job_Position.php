<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Position extends Model
{

    use HasFactory;

    public function job_category(){
        return $this->belongsTo(Job_Category::class);
    }
}
