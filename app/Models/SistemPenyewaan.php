<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SistemPenyewaan extends Model
{
    use HasFactory;

    protected $table = 'sistem_penyewaan';

    protected $fillable = [
        'nama_penyewa',
        'user_id',
        'manajemen_produks_id',
        'rent_date',
        'return_date',
        'actual_return_date'

    ];


    /**
     * Get the user that owns the SistemPenyewaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the user that owns the SistemPenyewaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produks(): BelongsTo
    {
        return $this->belongsTo(ManajemenProduks::class, 'manajemen_produks_id', 'id');
    }
}
