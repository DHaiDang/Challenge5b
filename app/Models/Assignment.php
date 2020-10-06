<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model {
    use Notifiable;
    protected $table = 'Assignment';
    protected $primaryKey = 'flight_id';
}
