<!DOCTYPE html>
<html  lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Document</title>
    <style>
        /* CSS styles for the table and page */
        body {
            margin: 0;
            padding: 0;
        }
        .page {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        .top-row {
            height: 33%;
        }
        .middle-row {
            height: 34%;
        }
        .bottom-row {
            height: 33%;
        }
    </style>

</head>
<body>
<div class="page" style="padding: 40px;margin-top: 70px">
    <table>
        <tr class="top-row">
            <td colspan="4"><b>{{ $employee->company->name }}</b>
                <div>
                    <address>
                        {{ $employee->company->address->street_number }}  {{ $employee->company->address->street_name   }} {{ $employee->company->address->suburb }} {{ $employee->company->address->city }} {{ $employee->company->address->postal_code }}
                    </address>
                </div>
            </td>
        </tr>
        <tr class="top-row">
            <td colspan="4">
                <div style="display: block;">
                    <div style="width: 30%;display: inline-block; margin-right: 1%">
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Employee Names</b></div>
                            <div> {{ $employee->first_name }} {{ $employee->last_name }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Date of Birth</b></div>
                            <div>{{ $employee->dob }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Employee ID</b></div>
                            <div> {{ $employee->id }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Employee Tax</b></div>
                            <div> {{ $employee->tax_number }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Employee Code </b></div>
                            <div></div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Direct manager </b></div>
                            <div> {{ $employee->direct_manager }}</div>
                        </div>
                    </div>
                    <div style="width: 30%;display: inline-block;margin-right: 1%;vertical-align: top;">
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Job Title </b></div>
                            <div>{{ $employee->role }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Joining date </b></div>
                            <div>{{ $employee->date_joined }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Acc. no. </b></div>
                            <div> {{ $employee->bankAccount->account_number }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Pay Period</b></div>
                            <div>{{ $employee->pay_period }}</div>
                        </div>
                    </div>
                    <div style="width: 30%;display: inline-block;vertical-align: top;">
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Payslip no  </b></div>
                            <div>{{ $payslip->id }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                            <div><b>Bank name </b></div>
                            <div> {{ $employee->bankAccount->bank_name }}</div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="middle-row" colspan="2">
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 5px;">
                    <div><b>Earnings</b></div>
                    <div>Particular</div>
                    <div>Amount</div>
                </div>
            </td>
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 5px;">
                    <div><b>Deductions</b></div>
                    <div>Particular</div>
                    <div>Amount</div>
                </div>
            </td>
        </tr>
        <tr class="middle-row" colspan="2">
            <td colspan="1">
                @foreach($earnings as $earning)
                    <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                        <div>{{ $earning->name }}</div>
                        <div></div>
                        <div>R{{ $earning->amount }}</div>
                    </div>
                @endforeach
                @foreach($otherEarnings as $earning)
                    <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                        <div>{{ $earning->name }}</div>
                        <div></div>
                        <div>R{{ $earning->amount }}</div>
                    </div>
                @endforeach
            </td>
            <td colspan="1">
                @foreach($deductions as $deduction)
                    <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                        <div>{{ $deduction->name }}</div>
                        <div></div>
                        <div>R{{ ($deduction->type == 'FIXED') ?  $deduction->amount : ($deduction->amount /100) * $totalEarnings }}</div>
                    </div>
                @endforeach
                @foreach($otherDeductions as $deduction)
                    <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                        <div>{{ $deduction->name }}</div>
                        <div></div>
                        <div>R{{ $deduction->amount }}</div>
                    </div>
                @endforeach
            </td>
            <!--            <td>Column 3</td>-->
            <!--            <td>Column 4</td>-->
        </tr>
        <tr class="middle-row" colspan="2">
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 5px;">
                    <div><b>Total Earnings</b></div>
                    <div>R{{ $totalEarnings }}</div>
                </div>
            </td>
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 5px;">
                    <div><b>Total Deductions</b></div>
                    <div>R{{ $totalDeductions }}</div>
                </div>
            </td>
        </tr>
        <tr class="middle-row" colspan="2">
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 20px;">
                    <div><b>Company Contribution</b></div>
                    <div></div>
                </div>
                @foreach ($companyContributions as $companyContribution)
                    <div style="display: flex; justify-content: space-between;margin-bottom: 5px">
                        <div>{{ $companyContribution->name }}</div>
                        <div></div>
                        <div>R({{ $companyContribution->percentage }} %) {{ ($companyContribution->percentage /100) * $totalEarnings}}</div>
                    </div>
                 @endforeach
            </td>
            <td colspan="1">
                <div style="display: flex; justify-content: space-between;margin-bottom: 5px;">
                    <div><b>Net Salary</b></div>
                    <div>R{{ $totalEarnings - $totalDeductions }}</div>
                </div>
            </td>
        </tr>
    </table>
</div>
<style></style>
</body>
</html>
