<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {
    protected $table = 'inbox';
    
    public $timestamps = true;
    
	protected $fillable = [
		'message','idSend', 'idReceive'
	];
}