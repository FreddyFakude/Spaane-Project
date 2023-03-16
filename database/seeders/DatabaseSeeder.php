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
            CompanyLeaveTypeSeeder::class,
            \Database\Seeders\CompanyAccountAdministratorRoleSeeder::class,
            \Database\Seeders\CompanyAccountAdministratorSeeder::class,
            CompanyLeaveSettingSeeder::class,
            \Database\Seeders\EmployeeSeeder::class,
            \Database\Seeders\IndependentContractorSeeder::class,
            SkillsSeeder::class,
            WhatsAppTemplateMessageSeeder::class,
            CompanyDepartmentSeeder::class
        ]);
    }
}
