<html>
    <head>
        <style>
            .salary-slip{
                margin: 15px;
                .empDetail {
                    width: 100%;
                    text-align: left;
                    border: 2px solid black;
                    border-collapse: collapse;
                    table-layout: fixed;
                }

                .head {
                    margin: 10px;
                    margin-bottom: 50px;
                    width: 100%;
                }

                .companyName {
                    text-align: right;
                    font-size: 25px;
                    font-weight: bold;
                }

                .salaryMonth {
                    text-align: center;
                }

                .table-border-bottom {
                    border-bottom: 1px solid;
                }

                .table-border-right {
                    border-right: 1px solid;
                }

                .myBackground {
                    padding-top: 10px;
                    text-align: left;
                    border: 1px solid black;
                    height: 40px;
                }

                .myAlign {
                    text-align: center;
                    border-right: 1px solid black;
                }

                .myTotalBackground {
                    padding-top: 10px;
                    text-align: left;
                    background-color: #EBF1DE;
                    border-spacing: 0px;
                }

                .align-4 {
                    width: 25%;
                    float: left;
                }

                .tail {
                    margin-top: 35px;
                }

                .align-2 {
                    margin-top: 25px;
                    width: 50%;
                    float: left;
                }

                .border-center {
                    text-align: center;
                }
                .border-center th, .border-center td {
                    border: 1px solid black;
                }

                th, td {
                    padding-left: 6px;
                }
            }
        </style>
    </head>
    <body>
        <div class="salary-slip" >
            <table class="empDetail">
                <tr height="100px">
                    <td colspan='4' class="companyName"> {{ $employee->company->name }}.</td>
                </tr>
                <tr>
                    <th>
                        Employee Name
                    </th>
                    <td>
                        {{ $employee->first_name }}
                    </td>
                    <td></td>
                    <th>
                        Job title
                    </th>
                    <td>
                        {{ $employee->role }}
                    </td>
                    <td></td>
                    <th>
                        Payslip no.
                    </th>
                    <td>
                       {{ $payslip->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Date of Birth
                    </th>
                    <td>
                        <td>{{ $employee->dob }}</td>
                    </td>
                    <td></td>
                    <th>
                        joining Date
                    </th>
                    <td>
                        {{ $employee->professional_experience?->start_date }}
                    </td>
                    <td></td>
                    <th>
                        Bank Name
                    </th>
                    <td>
                        XXXXXXXXXX
                    </td>
                </tr>
                <tr>
                    <th>
                        Employee ID
                    </th>
                    <td>
                        XXXXXXXXXXX
                    </td>
                    <td></td>
                    <th>
                        Worked Days
                    </th>
                    <td>
                        XXXXXXXXXX
                    </td>
                    <td></td>
                    <th>
                        Acc No
                    </th>
                    <td>
                        XXXXXXXXXXX
                    </td>
                </tr>
                <tr>
                    <th>
                        Employee Tax
                    </th>
                    <td>
                        XXXXXXXXXXX
                    </td>
                    <td></td>
                    <th>
                        Pay Period
                    </th>
                    <td>
                        XXXXXXXXXX
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>
                        Employee Code
                    </th>
                    <td>
                        xxxxxxx
                    </td>
                    <td></td>
                    <th>
                        Direct Manager
                    </th>
                    <td>
                        {{ $employee?->direct_manager }}
                    </td>
                    <td></td>
                </tr>
                <tr class="myBackground">
                    <th colspan="2">
                    Earnings
                    </th>
                    <th class="table-border-right">
                    Amount (Rs.)
                    </th>
                    <th colspan="2">
                    Deductions
                    </th>
                    <th >
                    Amount (Rs.)
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                    Basic Salary
                    </th>
                    <td></td>
                    <td class="myAlign">
                        <td>R{{ $employee->remuneration?->basic_salary }}</td>
                    </td>
                    <th colspan="2" >
                    PAYE
                    </th >
                    <td></td>
                    <td class="myAlign">
                        {{ (new \App\Services\TaxCalculations\PAYECalculator($employee))->calculatePaye() }}
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                    Travel allowance
                    </th>
                    <td></td>

                    <td class="myAlign">
                        {{ $employee->remuneration?->travel_allowance }}
                    </td>
                    <th colspan="2" >
                    UIF
                    </th >
                    <td></td>
                    <td class="myAlign">
                        {{ (new \App\Services\TaxCalculations\UIFCalculator($employee))->calculateUIF()  }}
                    </td>
                </tr>
                <tr class="myBackground">
                    <th colspan="3">
                        Total Earnings
                    </th>
                    <td class="myAlign">
                        R10000
                    </td>
                    <th colspan="3" >
                        Total Deductions
                    </th >
                    <td class="myAlign">
                        R1000
                    </td>
                </tr>
                <tr height="40px">
                    <th colspan="2">
                    Company Contibutions:
                    </th>
                    <th>
                    </th>
                    <td class="table-border-right">
                    </td>
                    <th colspan="2" class="table-border-bottom" >
                    Net Salary
                    </th >
                    <td >
                    </td>
                    <td >
                    XXXXXXXXXX
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        UIF
                    </td><td></td>
                    <td class="myAlign">
                        00.00
                    </td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        SDL
                    </td> <td></td>
                    <td class="myAlign">
                        00.00
                    </td>
                    <th colspan="2">
                    </th >
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        COIDA
                    </td> <td></td>
                    <td class="myAlign">
                        00.00
                    </td>
                    <td colspan="2" >
                    </td > <td></td>
                    <td class="myAlign">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        UIF -
                    </td> <td></td>
                    <td class="myAlign">
                        COIDA -
                    </td><td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        SDL -
                    </td> <td></td>
                    <td class="myAlign">
                    </td>
                    <td colspan="4"></td>
                </tr>
              {{-- <tbody class="border-center">
                <tr>
                  <th>
                    Attend/ Absence
      </th>
                  <th>
                    Days in Month
      </th>
                  <th>
                    Days Paid
      </th>
                  <th>
                    Days Not Paid
      </th>
                  <th>
                    Leave Position
      </th>
                  <th>
                    Privilege Leave
      </th>
                  <th>
                    Sick Leave
      </th>
                  <th>
                    Casual Leave
      </th>
                </tr>
                <tr>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <td>Yrly Open Balance</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <th >Current Month</th>
                  <td >31.0</td>
                  <td >31.0</td>
                  <td >31.0</td>
                  <td>Availed</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <td colspan="4"></td>
                  <td>Closing Balance</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <td colspan="4"> &nbsp; </td>
                  <td > </td>
                  <td > </td>
                  <td > </td>
                  <td > </td>
                </tr >
                <tr>
                  <td colspan="4"></td>
                  <td>Company Pool Leave Balance</td>
                  <td>1500</td>
                  <td ></td>
                  <td ></td>
                </tr >
              </tbody> --}}
            </table >
          </div >
    </body>
</html>
