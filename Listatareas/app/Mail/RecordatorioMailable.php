<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class RecordatorioMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $type;

    /**
     * Create a new message instance.
     * @param Task $task
     * @return void
     */
    public function __construct(Task $task, $type = 'reminder')
    {
        $this->task = $task;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('tasklist@gmail.com', 'Task List'),
            subject: $this->getSubject(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->getView(),
        );
    }

    /**
     * Get the subject based on type.
     */
    protected function getSubject()
    {
        return match ($this->type) {
            'reminder' => 'Recordatorio de Tarea',
            'new' => 'Nueva Tarea Asignada',
            'update' => 'Actualización de Tarea',
            default => 'Notificación de Tarea',
        };
    }

    /**
     * Get the view based on type.
     */
    protected function getView()
    {
        return match ($this->type) {
            'reminder' => 'emails.recordatorio',
            'new' => 'emails.nueva_tarea',
            'update' => 'emails.actualizacion_tarea',
            default => 'emails.recordatorio',
        };
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
