<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GabsRequest extends Model
{
    use HasFactory;

    protected $table = "gabs_requests";

    protected $fillable = [
        'patient_id',
        'clinic_id',
        'description',
        'gab_quant',
    ];

    /**
     * Relação um para muitos com Gab.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gabs(): HasMany
    {
        return $this->hasMany(Gab::class, 'request_id');
    }
}
