<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyLocation extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['country', 'province', 'city', 'sub_district', 'urban_village', 'postal_code', 'address'];

    /**
     * @return BelongsTo
     */
    public function society()
    {
        return $this->belongsTo(Society::class, 'society_id', 'id');
    }
}
