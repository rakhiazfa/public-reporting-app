<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgencyLocation extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['country', 'province', 'city', 'postal_code', 'address'];

    /**
     * @return BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }
}
