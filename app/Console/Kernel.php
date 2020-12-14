<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use Illuminate\Support\Facades\Mail;

//import jobs if use method jobs queue
use App\Jobs\Sendmailjob;



class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        //Ini method closure ---
        // $schedule->call(function(){
        //     $words=[
        //         'oke' => 'mantep dah ini oke array',
        //         'mantul' => 'mantulll borrr',
        //         'yes' =>'ini yes loh',
        //         'mantul-coy' => 'ini mantul coy',
        //         'sipp-dah' => 'ini sipp dah'
        //     ];

        //     $users =  User::all();

        //     foreach ($users as $user){
        //         $key = array_rand($words);
        //         $value= $words[$key];
        //         Mail::raw("{$key} -> {$value}", function($mail) use ($user) {
        //             $mail->from('system@mail.com');
        //             $mail->to($user->email)->subject('word of the day');
        //         });

        //         sleep(3);
        //     }
        // })->everyMinute();


        //ini method command ---
        // $schedule->command('daily:word')->everyMinute();



        //ini method job queue---
        // $schedule->job(new Sendmailjob)->everyMinute();
        // $schedule->command('queue:work')->everyMinute();



        //ini method shell exec--
        // $host= config('database.connections.mysql.host');
        // $username= config('database.connections.mysql.username');
        // $password= config('database.connections.mysql.password');
        // $database= config('database.connections.mysql.database');

        // $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        // ->everyMinute()
        // ->sendOutputTo(public_path('daily_backup_db.sql'));

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
