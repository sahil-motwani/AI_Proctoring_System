@extends('admin.layouts.app')


@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic</h4>
                        </div>
                        <form action="{{ route('add_question_quiz') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="quiz_questions" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th>Question Id</th>
                                            <th>Question</th>
                                            <th>Select Quescripstion</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $question->question_id }}</td>
                                                <td>{{ $question->question }}</td>
                                                <td><input type="checkbox" value="{{ $question->question_id }}" name="selected_questions[]"></td>
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
                                <button type="submit" class="btn btn-success form-control">Add Questions</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{ asset("assets/js/plugin/datatables/datatables.min.js") }}"></script>
    <script>
        $('#quiz_questions').DataTable();
    </script>
@endsection

