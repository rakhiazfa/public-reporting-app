<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'has_been_read'];

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
    public function messageOrigin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function messageDestination(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
