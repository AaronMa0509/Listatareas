<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecordatorioMailable;
use App\Models\Task;
use Carbon\Carbon;

class SendTaskReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Envia recordatorios por correo para tareas que vencen en las próximas 24 horas';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tasks = Task::where('due_date', '>', Carbon::now())
                     ->where('due_date', '<=', Carbon::now()->addDay())
                     ->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->send(new RecordatorioMailable($task));
        }

        $this->info('Recordatorios enviados correctamente.');
    }
}
