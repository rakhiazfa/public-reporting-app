<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyLocation extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['country', 'province', 'city', 'postal_code', 'address'];
}
