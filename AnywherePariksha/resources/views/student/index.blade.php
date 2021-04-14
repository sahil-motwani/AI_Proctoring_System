@extends('student.layouts.app')


@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Quiz Assigned</h4>

            </div>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($quizzes as $quiz)
                    <?php $i++ ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <form action="{{ route('quiz') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $quiz->quiz_id }}" name="quiz_id">
                                                <input type="hidden" value="{{ $student_id }}" name="student_id">
                                                <p class="card-category">{{ $quiz->quiz_name }}</p>
                                                <h4 class="card-title" id="quiz-pending-time{{ $i }}">00:00:00</h4>
                                                <input type="hidden" id="quiz-start-dt{{ $i }}"
                                                       value="{{ $quiz->start_dt }}">
                                                <input type="hidden" id="quiz-end-dt{{ $i }}"
                                                       value="{{ $quiz->end_dt }}">
                                                <div class="card-title">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModalCenter" id="stat-quiz-{{ $i }}">
                                                        Verify Your Image
                                                    </button>


                                                </div>
                                                <button type="submit" class="mt-3 btn btn-primary"
                                                        id="start-quiz-{{ $i }}" >
                                                    Start Quiz
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @csrf
                {{--                    <input type="hidden" value="{{ $quiz->quiz_id }}" name="quiz_id">--}}
                <div class="modal-body">

                    <div id="camera"></div>
                    <input class="btn btn-sm btn-primary" type="button" value="Take Picture" id="btPic"
                           onclick="takeSnapShot()"/>
                    <button class="btn btn-sm btn-primary" onclick="clearImage()">Reset</button>
                    <div id="results"></div>
                    <button class="btn btn-sm btn-primary" id="verify-image">Verify Image</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Begin Test</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script src="{{asset("/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js")}}"></script>
    <script>

        for (i = 1; i <=<?php echo $i ?>; i++) {
            reverseTimer("quiz-start-dt" + i, "quiz-pending-time" + i, "start-quiz-" + i, "quiz-end-dt" + i);
        }
        $(document).ready(function () {

            @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
            $.notify({
                // options
                message: 'This Quiz Was Already Submitted'
            }, {
                // settings
                type: 'info',
                delay: 1000
            })
            @endif
        });
    </script>
@endsection

