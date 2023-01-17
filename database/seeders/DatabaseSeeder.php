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
            \Database\Seeders\CompanyAccountAdministratorRoleSeeder::class,
            \Database\Seeders\CompanyAccountAdministratorSeeder::class,
            \Database\Seeders\EmployeeSeeder::class,
            \Database\Seeders\IndependentContractorSeeder::class,
            \Database\Seeders\TalentProfileSeeder::class,
//            SkillsSeeder::class
        ]);
    }
}
