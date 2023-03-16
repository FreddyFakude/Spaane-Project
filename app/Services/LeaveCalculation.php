<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeLeaveTypeInitialDay;
use App\Models\EmployeeLeaveRequest;

class LeaveCalculation
{
    public function calculateRemainingDaysOnLeaveType(Employee $employee, EmployeeLeaveTypeInitialDay $leaveTypeInitialDay)
    {
      return   $leaveTypeInitialDay->days - $employee->leaveRequest()
//              ->where('company_leave_type_id', $leaveTypeInitialDay->id)
              ->where('leave_type_initial_day_id', $leaveTypeInitialDay->id)
              ->where('status', EmployeeLeaveRequest::STATUS['approved'])
              ->sum('total_days');
    }
}
