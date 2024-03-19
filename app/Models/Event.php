<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'mstevent';
    

    protected $fillable = [
        'eventName',
        'eventDescription',
        'eventTime',
        'eventDate',
        'businessId',
        'address',

    ];

    public $timestamps = false;

    public function business()
    {
        return $this->belongsTo(Business::class, 'businessId', 'businessId');
    }
    public function eventImage()
    {
        return $this->belongsTo(EventImage::class, 'eventId', 'eventId');
    }
}
