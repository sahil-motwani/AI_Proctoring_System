@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Students</h4>
                        </div>
                        <form action="{{ route('assign_quiz') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="assign_quiz_students" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Marks</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($results as $result)
                                            <tr>
                                                <td>{{ $result->student_id }}</td>
                                                <td>{{ $result->name }}</td>
                                                <td>{{ $result->marks }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>



                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success form-control">Assign Quiz</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        @endsection
        @section('extra_js')
            <script src="{{ asset("assets/js/plugin/datatables/datatables.min.js") }}"></script>
            <script>
                $('#assign_quiz_students').DataTable();
            </script>
@endsection
