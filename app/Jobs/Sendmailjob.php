<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Mail;

class Sendmailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $words=[
            'oke' => 'mantep dah ini oke array',
            'mantul' => 'mantulll borrr',
            'yes' =>'ini yes loh',
            'mantul-coy' => 'ini mantul coy',
            'sipp-dah' => 'ini sipp dah'
        ];

        $users =  User::all();

        foreach ($users as $user){
            $key = array_rand($words);
            $value= $words[$key];
            Mail::raw("{$key} -> {$value}", function($mail) use ($user) {
                $mail->from('system@mail.com');
                $mail->to($user->email)->subject('word of the day');
            });

            sleep(3);
        }
    }
}
