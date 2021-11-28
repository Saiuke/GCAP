<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PeopleCategories;

class People extends Model
{
    use HasFactory;

    public $table = 'people';
    protected $fillable = [
        'name', 'category', 'document', 'phone', 'email'
    ];

    public function getCategoryLabelAttribute(){
        return strtolower(PeopleCategories::where('id', $this->category)->first()->label);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
