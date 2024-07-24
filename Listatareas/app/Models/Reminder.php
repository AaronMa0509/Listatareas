<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 'reminder_time', 'sent'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
