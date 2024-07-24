<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define las tareas programadas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Programar el envío de recordatorios de tareas diariamente
        $schedule->command('reminders:send')->everyFiveMinutes();
    }

    /**
     * Registra los comandos para la aplicación.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
