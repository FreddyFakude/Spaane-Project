<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Models\EmployeeLeaveRequest;

class LeaveCalculation
{
    public function calculateRemainingDaysOnLeaveType(Employee $employee, EmployeeLeaveInitialCurrentDay $leaveTypeInitialDay)
    {
      return   $leaveTypeInitialDay->days - $employee->leaveRequests()
//              ->where('company_leave_type_id', $leaveTypeInitialDay->id)
              ->where('leave_initial_day_id', $leaveTypeInitialDay->id)
              ->where('status', EmployeeLeaveRequest::STATUS['approved'])
              ->sum('total_days');
    }

    public function calculateRemainingDaysOnAllLeaveType(Employee $employee)
    {
        $leavesArr = [];
        foreach ($employee->leavePolicies as $leavePolicy){
         $leavesArr[$leavePolicy->initialDay->leave_type_name]  =   $this->calculateRemainingDaysOnLeaveType($employee, $leavePolicy->initialDay);
        }
        return $leavesArr;
    }
}
