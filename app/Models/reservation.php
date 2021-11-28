<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    
    protected $table = 'reservation';

    protected $fillable = [
        'user_id',
        'f_name', 'l_name', 'address','zipcode','email','city','state',
        'phone','checkInDate','checkOutDate','checkInTime','checkOutTime','forAdults',
        'forChildren','numOfRooms','roomTypeOne','roomTypeTow','specialInstructions'
    ];
}
