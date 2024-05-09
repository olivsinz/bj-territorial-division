<?php

namespace Database\State;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EnsureDepartmentsAndRelatedRecordsDataArePresent
{
    protected const DEPARTMENTS_COUNT = 12;
    protected const TOWNS_COUNT = 77;
    protected const DISTRICTS_COUNT = 546;
    protected const NEIGHBORHOODS_COUNT = 5304;

    /**
     * Ensure data are created.
     *
     * @return void
     */
    public function __invoke()
    {
        if ($this->present()) {
            return;
        }

        $this->insertData();
    }

    /**
     * Ensure are created.
     *
     * @return void
     */
    public function handle()
    {
        $this->__invoke();
    }

    public function insertData(): void
    {
        DB::transaction(function () {
            $this->cleanDB();

            $sqlStatements = File::get(database_path('state/req.sql'));

            $splittedIndividualQueries = explode(';', $sqlStatements);

            foreach ($splittedIndividualQueries as $query) {
                $query = trim($query);

                if (!empty($query)) {
                    DB::statement($query);
                }
            }
        });
    }

    public function cleanDB(): void
    {
        DB::table('departments')->truncate();
        DB::table('towns')->truncate();
        DB::table('districts')->truncate();
        DB::table('neighborhoods')->truncate();
    }

    /**
     * Ensure ranks data are already present.
     *
     * @return bool
     */
    private function present()
    {
        return DB::table('departments')->count() >= self::DEPARTMENTS_COUNT 
            && DB::table('towns')->count() >= self::TOWNS_COUNT 
            && DB::table('districts')->count() >= self::DISTRICTS_COUNT
            && DB::table('neighborhoods')->count() >= self::NEIGHBORHOODS_COUNT;
    }
}