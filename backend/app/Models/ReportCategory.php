<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportCategory extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function reportSubcategories()
    {
        return $this->hasMany(ReportSubcategory::class, 'report_category_id', 'id');
    }
}
