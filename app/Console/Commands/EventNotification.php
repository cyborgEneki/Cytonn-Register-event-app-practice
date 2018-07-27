<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

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
        $user = User::all();

        foreach ($user as $a)

        {
            EventNotification::raw("This is automatically generated when the lead date arrives.", function($message) use ($a)

            {
                $message->from('joanreneki@gmail.com');

                $message->to($a->email)->subject('Event Notification');
            });
        }

        $this->info('The event notification has been sent successfully');
    }
}
