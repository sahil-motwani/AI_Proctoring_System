@extends('admin.layouts.app')

@section('content')
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Quizzes</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="quizzes" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Quiz Id</th>
                                            <th>Name</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($quizzes as $quiz)
                                            <tr>
                                                <td>{{ $quiz->quiz_id }}</td>
                                                <td>{{ $quiz->quiz_name }}</td>
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

@endsection
