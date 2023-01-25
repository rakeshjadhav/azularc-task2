<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRespository;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{

    public function __construct(protected EmployeeRespository $employeeRespository)
    {      

    }

    //get list of all employees
    public function getAllEmployees(){

        return $this->employeeRespository->getEmployees();
    }

    public function getEmployee(Request $request){

        return $this->employeeRespository->getEmployee($request->id);
    }

    ### create new employee
    public function createEmployees(EmployeeRequest $employeeRequest){

        // Check if image file is a actual image or isValid image
        if(isset($employeeRequest['photo']) && $employeeRequest['photo']->isValid()){
            $folderPath = 'uploads/employee';

            // move an photo using ::move() laravel function
            $employeeRequest['photo']->move($folderPath,$employeeRequest['photo']->getClientOriginalName());
             //get path for uplaod 
            $employeeRequest['photo_path'] = $folderPath.'/'.$employeeRequest['photo']->getClientOriginalName();
        }
        return $this->employeeRespository->createEmployees($employeeRequest);
    }

    ### update employee data using id
    public function updateEmployees(UpdateEmployeeRequest $updateEmployeeRequest)
    {
         // Check if image file is a actual image or isValid image
        if(isset($updateEmployeeRequest['photo']) && $updateEmployeeRequest['photo']->isValid()){
            $folderPath = 'uploads/employee';

            // move an photo using ::move() laravel function // public_path
            $updateEmployeeRequest['photo']->move($folderPath,$updateEmployeeRequest['photo']->getClientOriginalName());
            $updateEmployeeRequest['photo_path'] = $folderPath.'/'.$updateEmployeeRequest['photo']->getClientOriginalName();
        }
        $isUpdated = $this->employeeRespository->updateEmployees($updateEmployeeRequest);

        if($isUpdated){
            return response()->json(['message'=>'Employee Successfully updated']);
        }else{
            return response()->json(['status'=>'Error']);
        }
        
    }

    ## soft Delete employee
    public function deleteEmployees(Request $request)
    {
        $isDeleted = $this->employeeRespository->deleteEmployees($request->id);
        if($isDeleted){
            return response()->json(['status'=>'Successfully deleted']);
        }else{
            return response()->json(['status'=>'Something went wrong']);
        }
    }

    
    public function getListOfEmployee(){

        $employeeData = $this->getAllEmployees();

        return view('employee.list')->with('employeeData', json_decode($employeeData));;
    }
}
