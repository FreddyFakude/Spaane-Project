<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddressSeeder::class,
            CompanyDepartmentSeeder::class,
            CompanySeeder::class,
            LeaveTypeSeeder::class,
            \Database\Seeders\CompanyAccountAdministratorRoleSeeder::class,
            \Database\Seeders\CompanyAccountAdministratorSeeder::class,
            CompanyLeavePolicySeeder::class,
            \Database\Seeders\EmployeeSeeder::class,
            \Database\Seeders\IndependentContractorSeeder::class,
            SkillsSeeder::class,
            WhatsAppTemplateMessageSeeder::class,
            CompanyDepartmentSeeder::class,
            RemunerationListSeeder::class,
            CompanyRemunerationListSeeder::class,
            EmployeeRemunerationSeeder::class,
        ]);
    }
}
