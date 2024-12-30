<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $nameSeries,
        public int $seriesId,
        public int $seasonsQty,
        public int $episodesPerSeason,
    )
    {
        $this->subject="Série $nameSeries criada.";
    }

    public function build(){
        return $this->markdown("mail.seriesCreated");
    }
}
