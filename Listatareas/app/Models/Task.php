<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    protected $dates = ['due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'task_id');
    }
}

