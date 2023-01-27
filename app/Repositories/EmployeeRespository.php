<?php
namespace App\Repositories;

use Illuminate\Support\Carbon;
use App\Models\EmployeeModel;
use Illuminate\Log\Logger;

  class EmployeeRespository {

    public function getEmployees(){

        ### use eloquent model to get all record
        return EmployeeModel::all()->sortByDesc('created_at');
    }

    public function getEmployee($empID){

        return EmployeeModel::find($empID);
    }

    public function createEmployees($employeeData)
    {
        $employeePostPayload = array(
            'name' => $employeeData['name'],
            'age' => $employeeData['age'],
            'email' => $employeeData["email"],
            'dob' => Carbon::parse($employeeData['date_of_birth'])->format('Y-m-d'),
            'address' => ( isset($employeeData['address']) ) ? $employeeData['address'] : NULL,
            'photo' => ( isset($employeeData['photo_path']) ) ? $employeeData['photo_path'] : NUll,
        );
      // Logger($employeePostPayload);
        return EmployeeModel::create($employeePostPayload);
    }


    public function updateEmployees($employeeData){
        $employeeUpdatePayload = array(
            'name' => $employeeData['name'],
            'age' => $employeeData['age'],
            'email' => $employeeData["email"],
            'dob' => Carbon::parse($employeeData['date_of_birth'])->format('Y-m-d'),
            'address' => ( isset($employeeData['address']) ) ? $employeeData['address'] : NULL,
            'photo' => ( isset($employeeData['photo_path']) ) ? $employeeData['photo_path'] : NULL,
        );
        // Logger($employeeUpdatePayload);
        return EmployeeModel::where('id', '=', $employeeData['id'])->update($employeeUpdatePayload);
    }

    ### soft delete  employee
    public function deleteEmployees($employeeId){
        return EmployeeModel::where('id', '=', $employeeId)->delete();
    }

  }
?>