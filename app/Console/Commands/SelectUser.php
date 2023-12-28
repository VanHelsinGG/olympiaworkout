<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SelectUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OW:select-user {userid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show a specific user with the given ID.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userID = $this->argument('userid');

        $user = User::find($userID);

        if(!$user){
            $this->error("The user with ID '$userID' does not exist!");
        }else{
            return $this->info($user);
        }
    }
}
