<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocietyReport extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'image', 'title', 'body', 'data',
        'status', 'attachment', 'category_id',
        'destination_agency_id',
    ];

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ReportSubcategory::class, 'category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function destination()
    {
        return $this->belongsTo(Agency::class, 'destination_agency_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Society::class, 'author_id', 'id');
    }
}
