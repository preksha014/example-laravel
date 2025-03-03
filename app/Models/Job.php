<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Tags;


class Job extends Model{
    use HasFactory;
    protected $table = 'jobs_listings';

    protected $fillable = ['title', 'salary'];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tags::class,foreignPivotKey:'job_listings_id');
    }
}