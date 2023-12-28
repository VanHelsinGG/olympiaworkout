<?php

namespace App\Console\Commands;

use App\Models\UsersPermissions;
use Illuminate\Console\Command;

class SelectUserPermissionByUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OW:select-permissions-user {userid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show a specific user permission with the given user ID.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userID = $this->argument('userid');

        $permissions = UsersPermissions::find($userID);

        if(!$permissions){
            $this->error("The user with ID '$userID' does not exist!");
        }

        return $this->info($permissions);
    }
}
