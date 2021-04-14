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
                                            <th>Select Student</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $student->student_id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td><input type="checkbox" value="{{ $student->student_id }}"
                                                           name="selected_students[]"></td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>


                            <div class="form-group">
                                <label for="squareSelect" class="font-weight-bold">Select Quiz</label>
                                <select class="form-control input-square" id="squareSelect" name="quiz_id">
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->quiz_id }}">{{ $quiz->quiz_name }}</option>
                                    @endforeach
                                </select>
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
