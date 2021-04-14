<div class="modal fade" id="select_quiz_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Please select quiz for which result has to be
                    generated</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('quiz_results') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <select name="quiz_id" id="quiz" class="form-control">
                            @foreach($quizzes as $quiz)
                                <option value="{{ $quiz->quiz_id }}">{{ $quiz->quiz_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Generate Results</button>
                </div>
            </form>
        </div>
    </div>
</div>
