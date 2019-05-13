<?php

namespace App\Tenant;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class ManagerTenant 
{

  public function setConnection(Company $company)
  {

    DB::purge('tenant'); // nombre de la conexión ?
    
    config()->set('database.connections.tenant.host', $company->bd_hostname);
    config()->set('database.connections.tenant.database', $company->bd_database);
    config()->set('database.connections.tenant.username', $company->bd_username);
    config()->set('database.connections.tenant.password', $company->bd_password);

    DB::reconnect('tenant');

    // opcional para testear conexión (min 6:30 - clase 2.3)
    Schema::connection('tenant')->getConnection()->reconnect();

  }

}
