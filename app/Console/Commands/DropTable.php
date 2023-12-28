<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DropTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OW:drop-table {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop the selected table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');

        if (Schema::hasTable($table)) {
            Schema::dropIfExists($table);
            $this->info("Table '$table' has been dropped!");
        } else {
            $this->error("Table '$table' does not exist.");
        }
    }
}
