<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;


class CompanyController extends Controller
{

    public $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function store(Request $request)
    {
        $company = $this->company->create([
            'name' => 'Empresa x ' . str_random(5), 
            'domain' => str_random(5) . 'minhaempresax.com', 
            'bd_database' => 'multi_tenant' . str_random(5), 
            'bd_hostname' => 'localhost', 
            'bd_username' => 'root', 
            'bd_password' => 'Metal00'
        ]);
        
        event(new CompanyCreated($company));

        // esto es para migrar en caso de que ya tenga la base
        // y quiero sobreescribir datos de conexión (creo)
        // ver video 2.13
        // if (true)
        //     event(new CompanyCreated($company));
        // else
        //     event(new DatabaseCreated($company));

        dd($company);
    }
}
