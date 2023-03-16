<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $addressable_type
 * @property int $addressable_id
 * @property string $street_name
 * @property string $street_number
 * @property string|null $complex_or_building
 * @property string $city
 * @property string|null $suburb
 * @property string $state
 * @property string $country
 * @property string|null $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereComplexOrBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSuburb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipCode($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutomatedResponse
 *
 * @property int $id
 * @property int $company_id
 * @property string $message
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse query()
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AutomatedResponse whereUpdatedAt($value)
 */
	class AutomatedResponse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BankAccount
 *
 * @property int $id
 * @property string|null $name
 * @property string $bank_name
 * @property string|null $branch_code
 * @property string $account_number
 * @property string $account_type
 * @property string $bank_accountable_type
 * @property int $bank_accountable_id
 * @property string|null $extra_info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $bank_accountable
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankAccountableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankAccountableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBranchCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereExtraInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 */
	class BankAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BulkMessage
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $message
 * @property string|null $file_path
 * @property string|null $file_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BulkMessage whereUpdatedAt($value)
 */
	class BulkMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chat
 *
 * @property int $id
 * @property int $company_id
 * @property int $company_account_administrator_id
 * @property int $chatable_id
 * @property string $chatable_type
 * @property string $status
 * @property string $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $chatable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $employee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 * @property-read int|null $messages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereChatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereChatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCompanyAccountAdministratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string|null $date_creation
 * @property string|null $technical_gear
 * @property string|null $target_market
 * @property string|null $suppliers
 * @property string|null $website
 * @property string $funding
 * @property string $short_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompanyAccountAdministrator|null $administrator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BulkMessage[] $bulkMessages
 * @property-read int|null $bulk_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyPayslip[] $payslips
 * @property-read int|null $payslips_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDateCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFunding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSuppliers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTargetMarket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTechnicalGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompanyAccountAdministrator
 *
 * @property int $id
 * @property int $company_id
 * @property int $role_id
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string|null $dob
 * @property string|null $gender
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $profile_image
 * @property string|null $phone_number
 * @property string|null $landline_number
 * @property string|null $current_position
 * @property string|null $position_start_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BulkMessage[] $bulkMessages
 * @property-read int|null $bulk_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereCurrentPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereLandlineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator wherePositionStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministrator whereUpdatedAt($value)
 */
	class CompanyAccountAdministrator extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompanyAccountAdministratorRole
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAccountAdministratorRole whereUpdatedAt($value)
 */
	class CompanyAccountAdministratorRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompanyDepartment
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDepartment whereUpdatedAt($value)
 */
	class CompanyDepartment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompanyPayslip
 *
 * @property int $id
 * @property int $company_id
 * @property int $employee_id
 * @property string $reference_number
 * @property string $hash
 * @property string $file_name
 * @property string|null $file_path
 * @property float $commission
 * @property string $date
 * @property float $basic_salary
 * @property float $reimbursement
 * @property float $travel_allowance
 * @property float $other
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereReimbursement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereTravelAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyPayslip whereUpdatedAt($value)
 */
	class CompanyPayslip extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Education
 *
 * @property int $id
 * @property int $educationable_id
 * @property string $educationable_type
 * @property string|null $institution_name
 * @property string $qualification
 * @property string|null $qualification_start_date
 * @property string|null $qualification_end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEducationableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEducationableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereInstitutionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereQualificationEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereQualificationStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 */
	class Education extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string $email
 * @property string $hash
 * @property int $company_department_id
 * @property int $company_id
 * @property string|null $personal_email
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property string $password
 * @property string|null $dob
 * @property string|null $gender
 * @property int $talent_visibility
 * @property string|null $marital_status
 * @property int $number_of_children
 * @property string $role
 * @property string $mobile_number
 * @property string|null $driving_license_number
 * @property string|null $tax_number
 * @property string|null $id_or_passport
 * @property string|null $nationality
 * @property string|null $home_phone_number
 * @property string|null $office_phone_number
 * @property string|null $emergency_phone_number
 * @property string|null $special_note
 * @property string|null $website
 * @property string $status
 * @property int $is_profile_complete
 * @property int $is_available
 * @property string $type
 * @property float|null $basic_salary
 * @property float|null $travel_allowance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\BankAccount|null $bankAccount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeBulkMessage[] $bulkMessages
 * @property-read int|null $bulk_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\CompanyDepartment $department
 * @property-read \App\Models\Education|null $education
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeLeaveTypeInitialDay[] $leaveDays
 * @property-read int|null $leave_days_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeLeaveRequest[] $leaves
 * @property-read int|null $leaves_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyPayslip[] $payslips
 * @property-read int|null $payslips_count
 * @property-read \App\Models\ProfessionalExperience|null $professional_experience
 * @property-read \App\Models\EmployeeRemuneration|null $remuneration
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCompanyDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDrivingLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmergencyPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereHomePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIdOrPassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsProfileComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNumberOfChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereOfficePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePersonalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSpecialNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTalentVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTravelAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWebsite($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeBulkMessage
 *
 * @property int $id
 * @property int $employee_id
 * @property int $bulk_message_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\BulkMessage $message
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage pending()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereBulkMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeBulkMessage whereUpdatedAt($value)
 */
	class EmployeeBulkMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeLeaveRequest
 *
 * @property int $id
 * @property int $employee_id
 * @property int $employee_leave_day_id
 * @property string $requested_date
 * @property string $hash
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereEmployeeLeaveDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereRequestedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveRequest whereUpdatedAt($value)
 */
	class EmployeeLeave extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeInitialLeaveDay
 *
 * @property int $id
 * @property int $employee_id
 * @property float $days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeLeaveRequest[] $leaves
 * @property-read int|null $leaves_count
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeLeaveTypeInitialDay whereUpdatedAt($value)
 */
	class EmployeeLeaveDay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeRemuneration
 *
 * @property int $id
 * @property int $employee_id
 * @property float|null $basic_salary
 * @property float|null $travel_allowance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereBasicSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereTravelAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeRemuneration whereUpdatedAt($value)
 */
	class EmployeeRemuneration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\IndependentContractor
 *
 * @property int $id
 * @property string|null $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor query()
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndependentContractor whereUpdatedAt($value)
 */
	class IndependentContractor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $messageable_type
 * @property int $messageable_id
 * @property int $chat_id
 * @property string $message
 * @property string $message_unique_id
 * @property int $is_read
 * @property string|null $file_path
 * @property string|null $file_type
 * @property int $is_outbound
 * @property int $is_automated
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $messageable
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsAutomated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsOutbound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payslip
 *
 * @deprecated
 * @return $this
 * @property int $id
 * @property int $employee_id
 * @property int $company_id
 * @property string|null $reference_number
 * @property string $file_name
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payslip whereUpdatedAt($value)
 */
	class Payslip extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProfessionalExperience
 *
 * @property int $id
 * @property int $professional_experienceable_id
 * @property string $professional_experienceable_type
 * @property string $organisation_name
 * @property string $role
 * @property int $is_current
 * @property string|null $start_date
 * @property string|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereOrganisationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereProfessionalExperienceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereProfessionalExperienceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalExperience whereUpdatedAt($value)
 */
	class ProfessionalExperience extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WhatsAppTemplateMessage
 *
 * @property int $id
 * @property string $content
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsAppTemplateMessage whereUpdatedAt($value)
 */
	class WhatsAppTemplateMessage extends \Eloquent {}
}

