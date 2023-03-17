<?php

namespace App\Repository;

use App\Models\Employee;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Models\EmployeeLeavePolicy;
use App\Models\EmployeeLeaveRequest;
use Carbon\Carbon;

class EmployeeLeaveRequestRepository
{
    /**
     * @var EmployeeLeaveRequest[]
     */

    public function insert(Employee $employee, EmployeeLeaveInitialCurrentDay $initialDay, EmployeeLeavePolicy $employeeLeavePolicy,string $startDate, string $endDate)
    {
        return EmployeeLeaveRequest::create([
            "employee_id" => $employee->id,
            "start_date" => Carbon::parse($startDate)->format('Y-m-d'),
            "end_date" => Carbon::parse($endDate)->format('Y-m-d'),
            'leave_initial_day_id' => $initialDay->id,
            "employee_leave_policy_id" => $employeeLeavePolicy->id,
            "status"=> EmployeeLeaveRequest::STATUS['review'],
            "leave_type" => $employeeLeavePolicy->leaveType->name,
            "total_days" => Carbon::parse($startDate)->diffInDays(Carbon::parse($startDate)),
            "hash" => sha1(time())
        ]);
    }
//    {
//        return EmployeeLeaveRequest::create([
//            "employee_id" => $employee->id,
//            "start_date" => $validated['start_date'],
//            "end_date" => $validated['end_date'],
//            'leave_initial_day_id' => $employee->initialLeaveTypeDays->last()->id,
//            "employee_leave_policy_id" => $validated['employee_leave_policy_id'],
//            "status"=> EmployeeLeaveRequest::STATUS['review'],
//            "leave_type" => "Test",
//            "total_days" => Carbon::parse($validated['start_date'])->diffInDays(Carbon::parse($validated['end_date'])),
//            "hash" => sha1(time())
//        ]);
//    }
}
