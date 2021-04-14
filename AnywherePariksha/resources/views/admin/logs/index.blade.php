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
                        <form action="{{ route('quiz_logs') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="quizzes" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Quiz Id</th>
                                            <th>Name</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        @foreach($quizzes as $quiz)
                                            <tr>
                                                <td>
                                                    <input type="radio" name="quiz_id" id="quiz_id"
                                                           value="{{ $quiz->quiz_id }}">
                                                </td>
                                                <td>{{ $quiz->quiz_id }}</td>
                                                <td>{{ $quiz->quiz_name }}</td>
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
