<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRemuneration extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'company_remunerations';

    // Allow mass assignment on all attributes
    protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'hash';
    }
}
