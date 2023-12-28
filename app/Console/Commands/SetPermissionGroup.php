<?php

namespace App\Console\Commands;

use App\Models\UsersPermissions;
use Illuminate\Console\Command;

class SetPermissionGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OW:set-permission-gp {userid} {group}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the permission group for a user. The permission group must be one of the following types: a, m, t, u.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userID = $this->argument('userid');
        $group = $this->argument('group');

        $userPermissions = UsersPermissions::where('user',$userID);

        if (!in_array($group, ['a', 'm', 't', 'u'])) {
            return $this->error('Permission group must be one of the following types: a, m, t, u.');
        }

        if ($userPermissions) {
            $userPermissions->update(['general_group' => $group]);
            return $this->info("User with ID '$userID' added to the permission group '$group'.");
        } else {
            return $this->error("User with ID '$userID' not found.");
        }
    }
}
