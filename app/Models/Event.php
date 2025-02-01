<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    public function isOnDate($date)
    {
        return Carbon::parse($this->start_date)->lte($date) && Carbon::parse($this->end_date)->gte($date);
    }

}
