<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        dd($company);
    }
}
