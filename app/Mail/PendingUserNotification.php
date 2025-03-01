<?php

namespace App\Mail;

use App\Models\PendingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendingUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $pendingUser;
    public $isUser;

    public function __construct(PendingUser $pendingUser, $isUser = false)
    {
        $this->pendingUser = $pendingUser;
        $this->isUser = $isUser;
    }

    public function build()
    {
        if ($this->isUser) {
            return $this->subject('Registrasi Berhasil - Menunggu Validasi Admin')
                        ->view('emails.pending-user-notification-user');
        }

        return $this->subject('User Baru Menunggu Validasi')
                    ->view('emails.pending-user-notification-admin');
    }
}
