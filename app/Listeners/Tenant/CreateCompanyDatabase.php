<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;
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

        // Observar '!' antes de $this
        if (!$this->database->createDatabase($company))
        {
            throw new \Exception('Database creation failed');
        }

        // correr migraciones
        event(new DatabaseCreated($company));

    }
}
