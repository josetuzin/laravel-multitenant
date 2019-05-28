<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\CompanyCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tenant\Database\DatabaseManager;

class CreateCompanyDatabase
{

    private $database;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param  CompanyCreated  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->company();
        $this->database->createDatabase($company);
    }
}
