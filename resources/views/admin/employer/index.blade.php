
@extends('layouts.master')
@section('title')
@endsection
@section('content')
    <div class="text-right m-b-5">
        <a href="#"  class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Tableau des utilisatuers</h4>
        </div>
        <div class="card-body p-2" id="show_all_employees">

        </div>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <h5 class="text-center">Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-secondary" >Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL WITH FORM -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="" method="post" id="add_employer" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Firstname</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>last_name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="last_name" name="last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>telephone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="telephone" name="telephone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>post</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="post" name="post">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>avatar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="file" class="form-control" placeholder="post" name="avatar">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <button type="submit" id="add_employer_btn" class="btn btn-primary m-t-15 waves-effect">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        //fetch all data
        // fetch all employees ajax request
        fetchAllEmployees();

        function fetchAllEmployees() {
            $.ajax({
                url: '{{ route('fetchAll') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }






        // add new employee ajax request
        $("#add_employer").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_employer_btn").text('Adding...');
            $.ajax({
                url: '{{ route('store') }}',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Employee Updated Successfully!',
                            'success'
                        )
                        fetchAllEmployees();
                    }
                    $("#edit_employee_btn").text('Update Employee');
                    $("#edit_employee_form")[0].reset();
                    $("#editEmployeeModal").modal('hide');
                }
            });
        });
    </script>
@endsection
