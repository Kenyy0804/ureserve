<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'information',
        'max_people',
        'start_date',
        'end_date',
        'is_visible',
    ];

    protected function eventDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($this->attributes['start_date'])->format('Y年m月d日'),
        );
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($this->attributes['start_date'])->format('H時i分'),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($this->attributes['end_date'])->format('H時i分'),
        );
    }

    protected function editEventDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($this->attributes['start_date'])->format('Y-m-d'),
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations')
        ->withPivot('id', 'number_of_people', 'canceled_date');
    }
}
