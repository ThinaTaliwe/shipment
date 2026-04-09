<?php
namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ApiResource(
    order: ['name' => 'ASC'],
    normalizationContext: ['groups' => ['port:read']],
    denormalizationContext: ['groups' => ['port:write']],
)]
class Port extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'unlocode', 'name', 'country_code', 'timezone',
        'location', 'website', 'contact_email'
    ];
    
    protected $casts = [
        'location' => 'array' // GeoJSON for PostGIS
    ];
}
