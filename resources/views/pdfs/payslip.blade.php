<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .salary-slip {
            margin: 15px;
        }
        .salary-slip .empDetail {
            width: 100%;
            text-align: left;
            border: 2px solid black;
            border-collapse: collapse;
            table-layout: fixed;
        }
        .salary-slip .head {
            margin: 10px;
            margin-bottom: 50px;
            width: 100%;
        }
        .salary-slip .companyName {
            text-align: right;
            font-size: 25px;
            font-weight: bold;
        }
        .salary-slip .salaryMonth {
            text-align: left;
        }
        .salary-slip .table-border-bottom {
            border-bottom: 1px solid;
        }
        .salary-slip .table-border-right {
            border-right: 1px solid;
        }
        .salary-slip .myBackground {
            padding-top: 10px;
            text-align: left;
            border: 1px solid black;
            height: 40px;
        }
        .salary-slip .myAlign {
            text-align: left;
            border-right: 1px solid black;
        }
        .salary-slip .myTotalBackground {
            padding-top: 10px;
            text-align: left;
            background-color: #770737;
            border-spacing: 0px;
        }
        .salary-slip .align-4 {
            width: 25%;
            float: left;
        }
        .salary-slip .tail {
            margin-top: 35px;
        }
        .salary-slip .align-2 {
            margin-top: 25px;
            width: 50%;
            float: left;
        }
        .salary-slip .border-center {
            text-align: left;
        }
        .salary-slip .border-center th, .salary-slip .border-center td {
            border: 1px solid black;
        }
        .salary-slip td, .salary-slip td {
            padding-left: 6px;
        }
    </style>
</head>
<body>
<div class="salary-slip" >
    <table class="empDetail">
        <tr height="100px" style='background-color: #770737'>
            <td colspan='4'>
                <img height="90px" src="{{ asset('assets/images/logo_white.png') }}" /></td>
            <td colspan='4' class="companyName" style="color: white; padding-right:20px">Spaane</td>
        </tr>
        <tr>
            <td>
                <b>Employee Name</b>
            </td>
            <td>
                {{ $employee->first_name }} {{ $employee->last_name }}
            </td>
            <td></td>
            <td>
                <b>Job Title</b>
            </td>
            <td>
               {{ $employee->role }}
            </td>
            <td></td>
            <td>
                <b>Payslip no</b>
            </td>
            <td>
               {{ $payslip->id }}
            </td>
        </tr>
        <tr>
            <td>
                <b>Date of Birth</b>
            </td>
            <td>
                {{ $employee->dob }}
            </td>
            <td></td>
            <td>
                <b>Joining date</b>
            </td>
            <td>
                XXXXXXX
            </td>
            <td></td>
            <td>
                <b>Bank name</b>
            </td>
            <td>
                XXXXXXX
            </td>
        </tr>
        <tr>
            <td>
                <b>Employee ID</b>
            </td>
            <td>
                {{ $employee->id }}
            </td><td></td>
            <td>
                <b>Worked Days</b>
            </td>
            <td>
                XXXXXXX
            </td><td></td>
            <td>
                <b>Acc. no.</b>
            </td>
            <td>
                XXXXXXXX
            </td>
        </tr>
        <tr>
            <td>
                <b>Employee Tax</b>
            </td>
            <td>
                {{ $employee->tax_number }}
            </td><td></td>
            <td>
                <b>Pay Period</b>
            </td>
            <td>
                XXXXXXXX
            </td><td></td>
            <td>
                <b>Personel Area</b>
            </td>
            <td>
                XXXXXXX
            </td>
        </tr>
        <tr>
            <td>
                <b>Employee Code</b>
            </td>
            <td>
                Sales Manager
            </td><td></td>
        </tr>
        <tr>
            <td>
                <b>Direct manager</b>
            </td>
            <td>
                {{ $employee->direct_manager }}
            </td><td></td>
        </tr>
        <tr class="myBackground">
            <td colspan="2">
                Payments
            </td>
            <td >
                Particular
            </td>
            <td class="table-border-right">
                Amount (Rs.)
            </td>
            <td colspan="2">
                Deductions
            </td>
            <td >
                Particular
            </td>
            <td >
                Amount (Rs.)
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Basic Salary
            </td>
            <td></td>
            <td class="myAlign">
                4935.00
            </td>
            <td colspan="2" >
                Provident Fund
            </td >
            <td></td>

            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Fixed Dearness Allowance
            </td>
            <td></td>

            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                LIC
            </td >
            <td></td>

            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Variable Dearness Allowance
            </td>
            <td></td>

            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Loan
            </td >
            <td></td>

            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                House Rent Allowance
            </td>
            <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Professional Tax
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Graduation Allowance
            </td>
            <td></td>

            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Security Deposite(SD)
            </td >
            <td></td>

            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Conveyance Allowance
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Staff Benefit(SB)
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Post Allowance
            </td>
            <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Labour Welfare Fund
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Special Allowance
            </td>
            <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                NSC
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="4" class="table-border-right"></td>
            <td colspan="2" >
                Union tdanco Officer(UTO)
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="4" class="table-border-right"></td>
            <td colspan="2" >
                Advance
            </td >
            <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="4" class="table-border-right"></td>
            <td colspan="2" >
                Income Tax
            </td > <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr class="myBackground">
            <td colspan="3">
                Total Payments
            </td>
            <td class="myAlign">
                10000
            </td>
            <td colspan="3" >
                Total Deductions
            </td >
            <td class="myAlign">
                1000
            </td>
        </tr >
        <tr height="40px">
            <td colspan="2">
                Projection for Financial Year:
            </td>
            <td>
            </td>
            <td class="table-border-right">
            </td>
            <td colspan="2" class="table-border-bottom" >
                Net Salary
            </td >
            <td >
            </td>
            <td >
                XXXXXXXXXX
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Gross Salary
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td><td colspan="4"></td>
        </tr >
        <tr>
            <td colspan="2">
                Aggr. Dedu - P.Tax & Std Ded
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Cumulative
            </td >
            <td colspan="2"></td>
        </tr >
        <tr>
            <td colspan="2">
                Gross Total Income
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="2" >
                Empl PF Contribution
            </td > <td></td>
            <td class="myAlign">
                00.00
            </td>
        </tr >
        <tr>
            <td colspan="2">
                Aggr of Chapter "PF"
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td><td colspan="4"></td>
        </tr >
        <tr>
            <td colspan="2">
                Total Income
            </td> <td></td>
            <td class="myAlign">
                00.00
            </td>
            <td colspan="4"></td>
        </tr >
        <!--        <tbody class="border-center">-->
        <!--        <tr>-->
        <!--            <th>-->
        <!--                Attend/ Absence-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Days in Month-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Days Paid-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Days Not Paid-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Leave Position-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Privilege Leave-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Sick Leave-->
        <!--            </th>-->
        <!--            <th>-->
        <!--                Casual Leave-->
        <!--            </th>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td ></td>-->
        <!--            <td ></td>-->
        <!--            <td ></td>-->
        <!--            <td ></td>-->
        <!--            <td>Yrly Open Balance</td>-->
        <!--            <td>0.0</td> <td>0.0</td>-->
        <!--            <td>0.0</td>-->
        <!--        </tr >-->
        <!--        <tr>-->
        <!--            <th >Current Month</th>-->
        <!--            <td >31.0</td>-->
        <!--            <td >31.0</td>-->
        <!--            <td >31.0</td>-->
        <!--            <td>Availed</td>-->
        <!--            <td>0.0</td> <td>0.0</td>-->
        <!--            <td>0.0</td>-->
        <!--        </tr >-->
        <!--        <tr>-->
        <!--            <td colspan="4"></td>-->
        <!--            <td>Closing Balance</td>-->
        <!--            <td>0.0</td> <td>0.0</td>-->
        <!--            <td>0.0</td>-->
        <!--        </tr >-->
        <!--        <tr>-->
        <!--            <td colspan="4"> &nbsp; </td>-->
        <!--            <td > </td>-->
        <!--            <td > </td>-->
        <!--            <td > </td>-->
        <!--            <td > </td>-->
        <!--        </tr >-->
        <!--        <tr>-->
        <!--            <td colspan="4"></td>-->
        <!--            <td>Company Pool Leave Balance</td>-->
        <!--            <td>1500</td>-->
        <!--            <td ></td>-->
        <!--            <td ></td>-->
        <!--        </tr >-->
        <!--        </tbody>-->
    </table >

</div >

</body>
</html>
