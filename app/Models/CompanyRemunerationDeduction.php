<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRemunerationDeduction extends Model
{
    use HasFactory;

    public const types = [
        'percentage' => "PERCENTAGE",
       'fixed' => "FIXED"
    ];
    protected $guarded = [];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'hash';
    }
}
