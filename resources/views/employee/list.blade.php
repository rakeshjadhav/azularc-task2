@include('layout.header');
  
  <div class="container-fluid">
    <div class="row">
    
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h1 class="h3 mb-0 text-gray-800">Employee</h1>
                    <a  href="#addEmployeeModal" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add New Employee</a>
                </div>
                
                <div class="card-body">
                    
                    <div class="table-responsive">
                        
                        <table id="dataTable" class="table table-striped table-hover" width="100%" cellspacing="0">
                            <div id="deleteMsg" class="font-medium text-red-600 alert alert-success d-none"></div>
                                <thead>
                                    <tr>
                                        <th>Emp Name</th>
                                        <th>Emp Age</th>
                                        <th>Emp Email</th>
                                        <th>Date of Birth</th>
                                        <th>Address</th>
                                        <th>Photo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                @foreach($employeeData as $employee)
                                    <tr employee_id = <?php echo $employee->id;?> >
                                       
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->age}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->dob}}</td>
                                        <td>{{$employee->address}}</td>
                                        <td><?php 
                                            if(isset($employee->photo)){ ?>
                                            <img src="{{ env('APP_URL') }}/{{$employee->photo}}" alt="" width="50" height="50"> 
                                             <?php echo 'Uploaded'; }else {
                                                echo 'Not Uploaded'; 
                                             }?></td>
                                        <td>
                                            <a employee_id = <?php echo $employee->id;?> class="edit-emp-btn btn btn-primary btn-icon-split" data-toggle="modal">Edit</a>

                                            <a employee_id = <?php echo $employee->id;?> class="delete-btn btn btn-danger btn-icon-split" data-toggle="modal">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

      
    </div>

   

</div>


</div>

    {{-- emplyee add model pupup bootstrap model --}}
    <div class="modal fade bd-example-modal-xl" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="addEmpForm" enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" id="name" name="name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Employee Age</label>
                        <input type="text" id="age" name="age" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <div class="form-control date-wrapper">
                        <input type="text"  id="my_date_picker" name="date_of_birth">
                                            </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                    	
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control" />
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" id="submitButton" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

 {{-- emplyee edit model pupup bootstrap model --}}
  <div id="editEmployeeModal" class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editEmployeeForm" emp-id="">
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" id="name" name="name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Employee Age</label>
                        <input type="text" id="age" name="age" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <div class="form-control date-wrapper">
                        <input type="text"  id="my_date_picker" name="date_of_birth">
                                            </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                    	
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control" />
                        {{-- <a id="photo" class="form-control" href="" > </a> --}}
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" id="editEmployeeSubmit" emp-id="" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
 <script src="/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
<!-- Datepicker -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
<script>
     $(function() {
        $( "#my_date_picker" ).datepicker();
    });  
    let base_url = "{{ env('APP_URL') }}/api/v1/employee";    
    </script>
<script>

// onclick submit btn to open employee add form popup model 
$(document).on("submit", "#addEmpForm", function(e) {
    e.preventDefault(); 
    var showError = $("#addEmployeeModal #showError");
    var $form = $(this).val();
    console.log($form);
         
     $.ajax({
                url: base_url+"/create-employees",
                type: 'POST',
                contentType: false,
                processData: false,
                async: false,
                data: new FormData(this),
                success: function(result) {
                    $('.alert-success').html("Add successfully");
                    location.reload();           
                },
                error: function ( xhr, status, error) {
                        
                    showError.removeClass('d-none');
                            if(xhr.responseText){
                                errortoshow = '';
                                $.each(JSON.parse(xhr.responseText).errors, function (i) {
                                    $.each(JSON.parse(xhr.responseText).errors[i], function (key, val) {
                                        errortoshow += val+'<br>';
                                    });
                                });
                                showError.html(errortoshow);
                            }
                        }
                });
    });


    $(document).ready(function(){
       
        let _token = $('meta[name="csrf-token"]').attr('content');
        $('[data-toggle="tooltip"]').tooltip();

   // onclick table row btn to delete record 

        $('#dataTable tbody').on('click', 'tr td a.delete-btn',function () {

            var row_id = $(this).closest('tr').attr('employee_id'); // table row id

            $.ajax({
                url: base_url+"/delete-employees/"+row_id,
                method: "DELETE",
                success: function(result){
                    
                    $("#dataTable #deleteMsg").removeClass('d-none');
                    console.log("success");
                    location.reload();    
                }
            });
        });
        
        $('#dataTable tbody').on('click', 'tr td a.edit-emp-btn',function () {
            // alert (base_url);
        var row_id = $(this).closest('tr').attr('employee_id');
        $("#editEmployeeForm").attr('emp-id',row_id);
        $("#editEmployeeForm #editEmployeeSubmit").attr('emp-id',row_id);
        var data = {
                _token: _token
        }
        $.ajax({
                url: base_url+"/get-employee/"+row_id,
                method: "GET",
                data:data,
                success: function(result){
                    // console.log(result);
                    // first empty  all inputs
                   $("#editEmployeeForm #name").val('');
                   $("#editEmployeeForm #age").val('');
                   $("#editEmployeeForm #my_date_picker").val('');
                   $("#editEmployeeForm #email").val('');
                   $("#editEmployeeForm #address").val('');
                   console.log(result);


                   $("#editEmployeeForm #name").val(result.name);
                   $("#editEmployeeForm #age").val(result.age);
                   $("#editEmployeeForm #my_date_picker").val(result.dob);
                   $("#editEmployeeForm #email").val(result.email);
                  
                   if(result.address){
                    $("#editEmployeeForm #address").val(result.address);
                   }
                   $("#editEmployeeModal").modal('show');
                }
            });
        });
    });
    
    
  
    // on submit open edit emplyee form with filed id wise details
    $(document).on("submit", "#editEmployeeForm", function(e) {
            e.preventDefault(); 
            // alert (base_url);
            // $(function() {
            //     $( "#my_date_picker" ).datepicker();
            //  });
            var showError = $("#editEmployeeForm #showError");
            var $form = $(this).attr('emp-id');
            $.ajax({
                    url: base_url+"/update-employees/"+$form,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    async: false,
                    data: new FormData(this),
                    success: function(result) {
                        location.reload();           
                    },
                    error: function ( xhr, status, error) {
                            
                        showError.removeClass('d-none');
                            if(xhr.responseText){
                                errortoshow = '';
                                $.each(JSON.parse(xhr.responseText).errors, function (i) {
                                    $.each(JSON.parse(xhr.responseText).errors[i], function (key, val) {
                                        errortoshow += val+'<br>';
                                    });
                                });
                                showError.html(errortoshow);
                            }
                        }
                });
    });
    </script>

@include('layout.footer');

<!-- jQuery -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

<!-- Bootstrap -->
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
<!-- Datepicker -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
<script>
    $('#dataTable').DataTable({
        "ordering": false
    });
    </script>