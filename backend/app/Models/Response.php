<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Response extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['response'];

    /**
     * @return BelongsTo
     */
    public function societyReport(): BelongsTo
    {
        return $this->belongsTo(SocietyReport::class, 'society_report_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }
}
