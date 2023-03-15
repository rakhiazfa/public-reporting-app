<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportRejected extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['reason'];

    /**
     * @return BelongsTo
     */
    public function societyReport(): BelongsTo
    {
        return $this->belongsTo(SocietyReport::class, 'society_report_id', 'id');
    }
}
