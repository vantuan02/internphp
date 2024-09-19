<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $student;
    public $averageScore;

    /**
     * Create a new message instance.
     */
    public function __construct(Student $student, $averageScore)
    {
        $this->student = $student;
        $this->averageScore = $averageScore;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.statusNotification',
            with: [
                'student' => $this->student,
                'averageScore' => $this->averageScore,
            ],
        );
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
