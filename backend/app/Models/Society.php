<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Society extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['nik', 'name', 'date_of_birth', 'gender', 'phone'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function location()
    {
        return $this->hasOne(SocietyLocation::class, 'society_id', 'id');
    }
}
