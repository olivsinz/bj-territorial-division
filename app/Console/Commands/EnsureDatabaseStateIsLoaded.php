<?php

namespace App\Console\Commands;

use Database\State\EnsureDepartmentsAndRelatedRecordsDataArePresent;
use Illuminate\Console\Command;

class EnsureDatabaseStateIsLoaded extends Command
{
    public const COMMAND_SIGNATURE = 'ensure:database-state-is-loaded';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = self::COMMAND_SIGNATURE;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ensure database state is loaded with all departments, towns, districts and neighborhoods.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info("\nLoading database state (Tasks are idempotents) ...");

        (new EnsureDepartmentsAndRelatedRecordsDataArePresent())->handle();

        $this->info("\nDatabase state is loaded successfully!\n");
    }
}
