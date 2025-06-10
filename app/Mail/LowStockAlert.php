<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;

class LowStockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $lowStockArticles;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $lowStockArticles
     * @return void
     */
    public function __construct($lowStockArticles)
    {
        $this->lowStockArticles = $lowStockArticles;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Low Stock Alert')
            ->view('emails.low_stock_alert')
            ->with([
                'lowStockArticles' => $this->lowStockArticles,
            ]);
    }

    public function envelope(): \Illuminate\Mail\Mailables\Envelope
    {
        return new \Illuminate\Mail\Mailables\Envelope(
            subject: 'Low Stock Alert',
        );
    }

    public function content(): \Illuminate\Mail\Mailables\Content
    {
        return new \Illuminate\Mail\Mailables\Content(
            html: 'emails.low_stock_alert',
            with: [
                'lowStockArticles' => $this->lowStockArticles,
            ],
        );
    }
}
