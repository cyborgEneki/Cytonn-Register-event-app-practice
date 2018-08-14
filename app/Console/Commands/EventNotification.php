<?php

namespace App\Console\Commands;

use App\Event;
use App\Mail\eventNotif;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;

class EventNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a message to the team leader when the lead date arrives';

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
     * @return mixed
     */
    public function handle()
    {
        //Check if there are events we need to send notifications for
        $today = Carbon::today();

        $events = Event::where('lead_start_date', $today)->get();


        foreach($events as $event) {
            $this->sendNotification($event);
        }


    }

    public function sendNotification ($event) {
        $users = User::where('role', 'admin')->get();

        foreach ($users as $user) {

            Mail::to($user->email)
                ->send(new \App\Mail\EventNotification($event));

            $this->info('The event notification has been sent successfully');
        }
    }
}
