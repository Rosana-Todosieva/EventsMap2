<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $appends = ['formatted_date'];
    protected $fillable = [
        'title',
        'date',
        'price',
        'description',
        'time'
    ];

    protected $casts = [
        'time' => 'datetime:H:i',
        'date' => 'date:d/m/Y'
    ];

    public function image(): Attribute
    {
        return Attribute::get(fn($value)=> $value ? Storage::url($value) : '/images/img.png');
    }

    public function formattedDate(): Attribute
    {
        return new Attribute(get: fn()=> [
            'year' =>  $this->date->format('Y'),
            'month' =>  $this->date->format('M'),
            'day' =>  $this->date->format('d'),
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
