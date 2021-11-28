<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PeopleCategories;

class Teacher extends People
{
    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)->whereCategory(1);
    }
}
