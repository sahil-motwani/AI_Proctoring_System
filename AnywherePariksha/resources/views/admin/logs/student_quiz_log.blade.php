@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('disqualify_student') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Select Quiz</h4>
                            </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table id="quizzes" class="display table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student_logs as $student_log)
                                                <input type="hidden" name="quiz_id" value="{{ $student_log->quiz_id }}">
                                                <input type="hidden" name="student_id"
                                                       value="{{ $student_log->student_id }}">
                                                <tr>
                                                    <td>{{ $student_log->id }}</td>
                                                    <td><img src="{{ asset('storage/'.$student_log->img) }}"
                                                             width="200px" height="200px" class="img-fluid" alt=""></td>

                                                    @if($student_log->img_cat == 1)
                                                        <td>Mobile Phone Detected</td>
                                                    @elseif($student_log->img_cat == 4)
                                                        <td>Not looking at the screen</td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success form-control">Show Logs</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
