@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Select Quiz</h4>
                        </div>
                        <form action="">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="quizzes" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Quiz</th>
                                            <th>Mobile Phone</th>
                                            <th>Multiple faces</th>
                                            <th>No faces</th>
                                            <th>Watching Left Side</th>
                                            <th>Watching Right Side</th>
                                            <th>View Student Photos</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($quiz_logs as $quiz_log)
                                            <tr>
{{--                                                <td>--}}
{{--                                                    <input type="radio" name="quiz_id" id="quiz_id"--}}
{{--                                                           value="{{ $quiz->quiz_id }}">--}}
{{--                                                </td>--}}
                                                <td>{{ $quiz_log->id }}</td>
                                                <td>{{ $quiz_log->student_id }}</td>
                                                <td>{{ $quiz_log->name }}</td>
                                                <td>{{ $quiz_log->quiz_name }}</td>
                                                <td>{{ $quiz_log->mobile_phone }}</td>
                                                <td>{{ $quiz_log->multiple_faces }}</td>
                                                <td>{{ $quiz_log->no_faces }}</td>
                                                <td>{{ $quiz_log->left_side }}</td>
                                                <td>{{ $quiz_log->right_side }}</td>
                                                <td><a href="/admin/quiz/1/student/1/logs">HEllo</a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </form>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success form-control">Show Logs</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
