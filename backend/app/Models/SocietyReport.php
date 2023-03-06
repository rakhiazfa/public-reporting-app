<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocietyReport extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'image', 'title', 'body', 'date',
        'status', 'attachment', 'category_id',
        'destination_agency_id', 'slug',
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

    public static function generateTicketId()
    {
        $ticketId = '#' . mt_rand(1000000000, 9999999999);

        if (SocietyReport::where('ticket_id', $ticketId)->first() ?? false) {

            return self::generateTicketId();
        }

        return $ticketId;
    }
}
