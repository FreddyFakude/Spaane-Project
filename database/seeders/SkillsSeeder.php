<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fake project wallets
        DB::table('skills')->insert([[
            'id' => '1',
            'name' => 'AI',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '2',
            'name' => 'Adobe Edge',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '3',
            'name' => 'Amazon Relational Database',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '4',
            'name' => 'Amazon Web Services',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '5',
            'name' => 'Android App Development',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '6',
            'name' => 'Automotive Engineering',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '7',
            'name' => 'Application Programming',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '8',
            'name' => 'Building Estimation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '9',
            'name' => 'Backbone.js',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '10',
            'name' => 'Backend Rest API',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '11',
            'name' => 'Business Valuation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '12',
            'name' => 'Business coaching',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '13',
            'name' => 'Box 2D',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '14',
            'name' => 'Business Scenario Development',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '15',
            'name' => 'Cinematography',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '16',
            'name' => 'CakePHP',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '17',
            'name' => 'Carbide.c++',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '18',
            'name' => 'Excel VBA',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '19',
            'name' => 'Firestorm',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '20',
            'name' => 'Front-end Development',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '21',
            'name' => 'Fraud Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '22',
            'name' => 'FreePBX',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '23',
            'name' => 'Financial Statements Preparation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '24',
            'name' => 'Film Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '25',
            'name' => 'Git',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '26',
            'name' => 'Game Development',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '27',
            'name' => 'Google Tag Manager',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '28',
            'name' => 'Google Docs',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '29',
            'name' => 'Google Ads',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '30',
            'name' => 'Google Analytics',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '31',
            'name' => 'Google Cloud Platform',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '32',
            'name' => 'iReport',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '33',
            'name' => 'IBM MQ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '34',
            'name' => 'Informatix Programming',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '35',
            'name' => 'Jewellery Design',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '36',
            'name' => 'Liquibase',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '37',
            'name' => 'Mac OSX Administration',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '38',
            'name' => 'Mining Engineering ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '39',
            'name' => 'Mobile Program Languages',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '40',
            'name' => 'Music',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '41',
            'name' => 'MYSQL',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '42',
            'name' => 'Netfabb',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '43',
            'name' => 'Network Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '44',
            'name' => 'Network Monitoring',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '45',
            'name' => 'Network Programing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '46',
            'name' => 'Oracle ATG Web Commerce',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '47',
            'name' => 'Oracle Demantra',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '48',
            'name' => 'Oracle Endeca',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '49',
            'name' => 'OOPS',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '50',
            'name' => 'OSClass',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '51',
            'name' => 'Platform Migration',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '52',
            'name' => 'PeopleCode',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '53',
            'name' => 'Predictive Analytics',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '54',
            'name' => 'PostgreSQL',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '55',
            'name' => 'Power Query',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '56',
            'name' => 'SQLite',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '57',
            'name' => 'Squarespace',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '58',
            'name' => 'Robotium',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '59',
            'name' => 'Sketchup',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '60',
            'name' => 'SEO writing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '61',
            'name' => 'SEO backlinking',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '62',
            'name' => 'Teamviewer',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '63',
            'name' => '3D Sculpting',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '64',
            'name' => '3D Visualisation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '65',
            'name' => 'Violoncello',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '66',
            'name' => '.NET FRAMEWORK',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '67',
            'name' => 'ASP.NET',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '68',
            'name' => 'C++',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '69',
            'name' => 'ColdFusion Markup Language (CFML)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '70',
            'name' => 'Common Lisp',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '71',
            'name' => 'D',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '72',
            'name' => 'Elixir',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '73',
            'name' => 'Haskell',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '74',
            'name' => 'HTML',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '75',
            'name' => 'CSS',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '76',
            'name' => 'Java',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '77',
            'name' => 'JavaScript',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '78',
            'name' => 'Lua',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '79',
            'name' => 'Scala',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '80',
            'name' => 'Perl',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '81',
            'name' => 'PHP',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '82',
            'name' => 'Python',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '83',
            'name' => 'Ruby',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '84',
            'name' => 'Ionic',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '85',
            'name' => 'React Native ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '86',
            'name' => 'Xamarin ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '87',
            'name' => 'Adobe PhoneGap ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '88',
            'name' => 'Flutter',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '89',
            'name' => 'Box 2D',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '90',
            'name' => 'Ruby On Rails',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '91',
            'name' => 'Corona SDK',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '92',
            'name' => 'Django ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '93',
            'name' => 'Native Scripts',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '94',
            'name' => 'Mobile Angular UI',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '95',
            'name' => 'Framework 7',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '96',
            'name' => 'Intel XDK',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '97',
            'name' => 'Appcelerator Titanium',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '98',
            'name' => 'Sencha Touch',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '99',
            'name' => 'Kendo U',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '100',
            'name' => 'jQuery Mobile',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '101',
            'name' => 'Firebase',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '102',
            'name' => 'Machine Learning',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '103',
            'name' => 'Point of Sale software (POS)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '104',
            'name' => 'CAD software',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '105',
            'name' => 'Electronic Medical Record software (EMR)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '106',
            'name' => 'Logistics Management software',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '107',
            'name' => 'Content Management Systems (CMS)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '108',
            'name' => 'Bookkeeping software',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '109',
            'name' => 'Box 2D',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '110',
            'name' => 'Customer Relationship Management systems (CRM)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '111',
            'name' => 'Common operating systems',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '112',
            'name' => 'Software proficiency',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '113',
            'name' => 'Box 2D',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '114',
            'name' => 'Technical writing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '115',
            'name' => 'Project management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '116',
            'name' => 'Data analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '117',
            'name' => 'Objective-C',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '118',
            'name' => 'Blockchain technologies',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '119',
            'name' => 'Bitcoin',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '120',
            'name' => 'Ripple',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '121',
            'name' => 'Ethereum',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '122',
            'name' => 'Entrepreneurship',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '123',
            'name' => 'Monero',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '124',
            'name' => 'LitecoinAJAX',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '125',
            'name' => 'Cloud and Distributed Computing ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '126',
            'name' => 'Kubernetes',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '127',
            'name' => 'Docker',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '128',
            'name' => 'Azure',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '129',
            'name' => 'AWS',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '130',
            'name' => 'TensorFlow',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '131',
            'name' => 'Scikit-learn',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '132',
            'name' => 'Google Cloud ML Engine',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '133',
            'name' => 'AML',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '134',
            'name' => 'Microsoft Windows',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '135',
            'name' => 'macOS',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '136',
            'name' => 'Linux',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '137',
            'name' => 'OSCP',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '138',
            'name' => 'CISSP',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '139',
            'name' => 'Cisco CCNA ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '140',
            'name' => 'Certified Ethical Hacker (CEH)',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '141',
            'name' => 'CompTIA Security+',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '142',
            'name' => 'AutoCAD',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '143',
            'name' => 'MATLAB ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '144',
            'name' => 'Verilog',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '145',
            'name' => 'Simulink',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '146',
            'name' => 'Pspice',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '147',
            'name' => 'Multisim',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '148',
            'name' => 'ETAP',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '149',
            'name' => 'VMware vSphere',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '150',
            'name' => 'Microsoft Hyper-V',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '151',
            'name' => 'QEMU',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '152',
            'name' => 'Oracle VM VirtualBox',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '153',
            'name' => 'XEN',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '154',
            'name' => 'Big Data',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '155',
            'name' => 'Statistical analysi',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '156',
            'name' => 'Data mining and modeling',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '157',
            'name' => 'Database management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '158',
            'name' => 'Virtualization',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '159',
            'name' => 'Electronic and Electrical Engineering',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '160',
            'name' => 'Network and Information Security',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '161',
            'name' => 'eCommerce Platforms',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '162',
            'name' => 'Magento',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '163',
            'name' => 'PrestaShop',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '164',
            'name' => 'Joomla',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '165',
            'name' => 'OpenCart',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '166',
            'name' => 'WooCommerce',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '167',
            'name' => 'Shopify',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '168',
            'name' => 'Budgeting',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '169',
            'name' => 'Work Scheduling',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '170',
            'name' => 'Project Evaluation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '171',
            'name' => 'Technical Reports',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '172',
            'name' => 'Risk Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '173',
            'name' => 'Scrum',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '174',
            'name' => 'Agile',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '175',
            'name' => 'Staffing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '176',
            'name' => 'Record Keeping',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '177',
            'name' => 'Cost Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '178',
            'name' => 'Statistical Methods',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '179',
            'name' => 'Statistical Methods',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '180',
            'name' => 'Programming',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '181',
            'name' => 'Database Design',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '182',
            'name' => 'Excel Power User',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '183',
            'name' => 'SAS Enterprise Miner',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '184',
            'name' => 'SQL',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '185',
            'name' => 'Minitab ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '186',
            'name' => 'Data Analytics',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '187',
            'name' => 'MS Access, Oracle',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '188',
            'name' => 'Data Visualization',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '189',
            'name' => 'Photoshop',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '190',
            'name' => 'Illustrator',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '191',
            'name' => 'Acrobat ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '192',
            'name' => 'InDesign',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '193',
            'name' => 'Free Hand',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '194',
            'name' => 'Corel Draw',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '195',
            'name' => 'Typography',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '196',
            'name' => 'Sketching',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '197',
            'name' => 'Layout',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '198',
            'name' => 'Calendar Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '199',
            'name' => 'Travel Planning',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '200',
            'name' => 'Event Planning',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '201',
            'name' => 'Writing Emails and Letters',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '202',
            'name' => 'Transcription',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '203',
            'name' => 'Inventory Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '204',
            'name' => 'Billing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '205',
            'name' => 'Salesforce',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '206',
            'name' => 'Research',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '207',
            'name' => 'Order Processing',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '208',
            'name' => 'Product Knowledge',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '209',
            'name' => 'Social Media',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '210',
            'name' => 'General Marketing Skills',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '211',
            'name' => 'Relationship Building',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '212',
            'name' => 'Presentation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '213',
            'name' => 'Prospecting',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '214',
            'name' => 'Customer Needs Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '215',
            'name' => 'Product Demo',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '216',
            'name' => 'Objection Handling',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '217',
            'name' => 'Closing Sales',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '218',
            'name' => 'Lead Qualification',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '219',
            'name' => 'Benchmarking',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '220',
            'name' => 'Future State Assessment',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '221',
            'name' => 'Business Process Re-engineering',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '222',
            'name' => 'As-is Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '223',
            'name' => 'Defining Solutions and Scope',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '224',
            'name' => 'Gap Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '225',
            'name' => 'Role Change',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '226',
            'name' => 'Wireframing, Prototyping, User Stories',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '227',
            'name' => 'Financial Analysis/Modeling',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '228',
            'name' => 'SWOT Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '229',
            'name' => 'Collections',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '230',
            'name' => 'Financial Statements',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '231',
            'name' => 'Payroll',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '232',
            'name' => 'IT Skills',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '233',
            'name' => 'Asset Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '234',
            'name' => 'Payroll Taxes',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '235',
            'name' => 'Account Analysis',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '236',
            'name' => 'Regulatory Filings',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '237',
            'name' => 'MS Office',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '238',
            'name' => 'Revenue Projections',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '239',
            'name' => 'Account Reconciliation',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '240',
            'name' => 'State Tax Law',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '241',
            'name' => 'Budgets',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '242',
            'name' => 'Tax Compliance ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '243',
            'name' => 'Corporate Tax',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '244',
            'name' => 'Tax Returns',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '245',
            'name' => 'General Ledger',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '246',
            'name' => 'Profit and Loss',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '247',
            'name' => 'Mathematics',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '248',
            'name' => 'Quickbooks',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '249',
            'name' => 'Paychex',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '250',
            'name' => 'Income Tax',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '251',
            'name' => 'Invoices ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '252',
            'name' => 'Communication',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '253',
            'name' => 'Critical Thinking',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '254',
            'name' => 'Business Knowledge',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '255',
            'name' => 'Organization',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '256',
            'name' => 'Time Management',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '257',
            'name' => 'Leadership ',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '258',
            'name' => 'Detail Oriented',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ],[
            'id' => '259',
            'name' => 'Attention to Detail',
            'description' => '1',
            'created_at' => '2019-11-12 00:00:00',
            'updated_at' => '2019-11-12 00:00:00'
        ]]);
    }
}
