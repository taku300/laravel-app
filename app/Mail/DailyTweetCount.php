<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class DailyTweetCount extends Mailable implements shouldQueue
{
    use Queueable, SerializesModels;

    public User $toUser;
    public int $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $toUser, int $count)
    {
        $this->toUser = $toUser;
        $this->count = $count;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "昨日は{$this->count}件のつぶやきが追加されました！"
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'email.daily_tweet_count',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
