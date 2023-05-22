<?php

namespace App\Repository;

use App\Models\Company;

class CompanyRegistrationRepository
{
    public function __construct()
    {

    }

    public function createCompany($name, $company_size, $date_creation, $fiscal_year_start, $short_description, $phone_number)
    {
        return  Company::create([
                'name' => $name,
                'company_size' => $company_size,
                'date_creation' => $date_creation,
                'fiscal_year_start' => $fiscal_year_start,
                'short_description' => $short_description,
                'phone_number' => $phone_number,
            ]
        );
    }

    public function createCompanyAdmin()
    {

    }
}
