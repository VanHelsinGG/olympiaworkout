<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OW:delete-user {userid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a user by ID, ignoring foreign key constraints';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userid = $this->argument('userid');

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $user = User::find($userid);

        if (!$user) {
            return $this->error("User with ID '$userid' not found.");
        }

        $user->delete();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return $this->info("User with ID '$userid' has been deleted!");
    }
}
