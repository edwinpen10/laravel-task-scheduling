<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;

class DailyWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily e-mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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
