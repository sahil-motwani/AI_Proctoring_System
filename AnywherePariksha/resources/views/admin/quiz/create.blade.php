@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('create_quiz') }}" class="gray-form" method="post">
                                @csrf
                                <div class="form-group">
                                    <h3>Quiz Title</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Enter title of quiz</label>
                                            <input type="text" id="quiz-title" class="form-control" name="quiz_name"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="date-time">Start Date and Time</label>
                                            <input class="datetime form-control" type='datetime-local' name="start_dt" required
                                                   placeholder=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="duration">Duration</label>
                                            <div class="input-group-append">
                                                <input class="duration form-control" type="text" name="duration"
                                                       required>
                                                <div class="input-group-append">
                                <span class="input-icon-addon input-group-text">
			                       mins
		                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="neg-marks">Enter marks</label>
                                            <input type="number" class="form-control" name="quiz_marks" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="neg-marks">Enter passing marks %</label>
                                            <div class="input-group-append">
                                                <input type="number" class="form-control" name="passing_marks_percentage" required>
                                                <div class="input-group-append">
                                <span class="input-icon-addon input-group-text">
			                        <i class="fa fa-percent"></i>
		                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="neg-marks">Select Quiz Type</label>
                                            <select name="quiz_type" id="quiz_type" class="form-control">
                                                <option value="actual">Actual</option>
                                                <option value="demo">Demo</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="neg-marks">Select Quiz Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="draft">Draft</option>
                                                <option value="published">Published</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group start-adding-question" align="center">
                                    <button type="submit" class="btn btn-success" name="submit">Create</button>
                                    <!--                <button type="submit" class="btn btn-primary">Start Adding Questions</button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
