<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventSeriesCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventSeriesCreated $event)
    {

        //Forma do curso.
        $userList = User::all();
        foreach ($userList as $index => $user){
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason,
            );
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);
        }



        // $email = new SeriesCreated(
        //     $series->name,
        //     $series->id,
        //     $request->seasonsQty,
        //     $request->episodesPerSeason,
        // );
        // $users = User::pluck('email')->toArray();
        // // Trocado o to para bcc, no qual faz com que os emails sejam enviados em cco.
        // Mail::bcc($users)->queue($email);
    }
}
