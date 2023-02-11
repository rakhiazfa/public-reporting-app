<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportSubcategory extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return BelongsTo
     */
    public function reportCategory()
    {
        return $this->belongsTo(ReportCategory::class, 'report_category_id', 'id');
    }
}
