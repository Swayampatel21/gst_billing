<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EmailSchedule extends Model
{
    protected $table = 'email_schedules';
    protected $fillable = ['send_time', 'is_active'];
}   
