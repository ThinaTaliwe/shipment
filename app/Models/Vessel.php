<?php
namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ApiResource(
    order: ['name' => 'ASC'],
    paginationItemsPerPage: 20,
    normalizationContext: ['groups' => ['vessel:read']],
    denormalizationContext: ['groups' => ['vessel:write']],
)]
class Vessel extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'imo_number', 'name', 'call_sign', 'mmsi', 'vessel_type',
        'flag', 'length', 'beam', 'draft', 'gross_tonnage',
        'current_location', 'speed', 'course', 'destination_port_id', 'eta'
    ];
    
    protected $casts = [
        'eta' => 'datetime',
        'length' => 'decimal:2', 'beam' => 'decimal:2', 'draft' => 'decimal:2',
        'gross_tonnage' => 'decimal:2', 'speed' => 'decimal:2', 'course' => 'decimal:2'
    ];
    
    // Port relationship will be added after Port model exists
    // public function destinationPort(): BelongsTo { return $this->belongsTo(Port::class); }
}
