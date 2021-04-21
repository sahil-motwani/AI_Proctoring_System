<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="../../AnywherePariksha/public/assets/img/icon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/azzara.min.css")}}">

    <link rel="stylesheet" href="{{asset("/assets/css/quiz.css")}}">
</head>
<body style="background: #F9FBFD">

<div class="wrapper">

    <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
        <div class="logo-header">

            <a href="../index.html" class="logo">
                <h5 class="navbar-brand text-white">Anywhere Praiksha</h5>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
            <div class="navbar-minimize">
                <button class="btn btn-minimize btn-rounded">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">


                <ul class="nav navbar-nav mx-auto ml-5">
                    <li class="nav-item text-white">
                        <div id="timer"></div>
                    </li>
                </ul>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="../../assets/img/profile.jpg" alt="image profile"
                                                                class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>Hizrian</h4>
                                        <p class="text-muted">hello@example.com</p><a href="profile.html"
                                                                                      class="btn btn-rounded btn-danger btn-sm">View
                                            Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="#">My Balance</a>
                                <a class="dropdown-item" href="#">Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>


    {{--<div class="main-panel">--}}
    {{--    <div class="content content-full">--}}
    {{--        <div class="page-inner page-inner-fill">--}}
    {{--            <div class="page-with-aside mail-wrapper bg-white">--}}
    {{--                <div class="page-content mail-content">--}}
    {{--                    <div class="animated fadeIn">--}}
    {{--                        <form action="{{ route('submit_quiz') }}" method="post" id="quiz_form">--}}
    {{--                            <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">--}}
    {{--                            <input type="hidden" name="student_id" value="{{ $student_id }}">--}}

    {{--                            @csrf--}}
    {{--                            <?php $j = 0; $i = 0?>--}}
    {{--                            @foreach($questions as $question)--}}
    {{--                                <section>--}}
    {{--                                    <div class="que_text"><span>{{ $question->question }}</span></div>--}}
    {{--                                    <div class="option_list">--}}
    {{--                                        <input type="hidden" name="questions[{{ $question->question_id }}]" value="null"--}}
    {{--                                               checked="checked"/>--}}
    {{--                                        @while($j < count($answers) && $question->question_id == $answers[$j]->question_id)--}}
    {{--                                            <div class="form-check">--}}
    {{--                                                <input class="form-check-input" type="radio"--}}
    {{--                                                       name="questions[{{ $question->question_id }}]" id="flexRadioDefault1"--}}
    {{--                                                       value="{{ $answers[$j]->answer_id }}">--}}
    {{--                                                <label class="form-check-label option" for="flexRadioDefault1">--}}
    {{--                                                    {{ $answers[$j]->answer }}--}}
    {{--                                                </label>--}}
    {{--                                                <?php $j++; ?>--}}
    {{--                                            </div>--}}
    {{--                                        @endwhile--}}
    {{--                                        <?php $i++;?>--}}
    {{--                                    </div>--}}
    {{--                                </section>--}}
    {{--                            @endforeach--}}

    {{--                            <button type="submit">Submit</button>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--</div>--}}

    {{--<div class="main-panel">--}}
    {{--<div class="wrapper wrapper-login">--}}

    {{--    <div class="container container-login animated fadeIn">--}}
    {{--        <form action="{{ route('submit_quiz') }}" method="post" id="quiz_form">--}}
    {{--            <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">--}}
    {{--            <input type="hidden" name="student_id" value="{{ $student_id }}">--}}

    {{--            @csrf--}}
    {{--            <?php $j = 0; $i = 0?>--}}
    {{--            @foreach($questions as $question)--}}
    {{--                <section>--}}
    {{--                    <div class="que_text"><span>{{ $question->question }}</span></div>--}}
    {{--                    <div class="option_list">--}}
    {{--                        <input type="hidden" name="questions[{{ $question->question_id }}]" value="null"--}}
    {{--                               checked="checked"/>--}}
    {{--                        @while($j < count($answers) && $question->question_id == $answers[$j]->question_id)--}}
    {{--                            <div class="form-check">--}}
    {{--                                <input class="form-check-input" type="radio"--}}
    {{--                                       name="questions[{{ $question->question_id }}]" id="flexRadioDefault1"--}}
    {{--                                       value="{{ $answers[$j]->answer_id }}">--}}
    {{--                                <label class="form-check-label option" for="flexRadioDefault1">--}}
    {{--                                    {{ $answers[$j]->answer }}--}}
    {{--                                </label>--}}
    {{--                                <?php $j++; ?>--}}
    {{--                            </div>--}}
    {{--                        @endwhile--}}
    {{--                        <?php $i++;?>--}}
    {{--                    </div>--}}
    {{--                </section>--}}
    {{--            @endforeach--}}

    {{--            <button type="submit">Submit</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="animated fadeIn">
                                <form action="{{ route('submit_quiz') }}" method="post"
                                      id="quiz_form">
                                    <input type="hidden" name="mobile_phone" id="mobile_phone">
                                    <input type="hidden" name="multiple_faces" id="multiple_faces">
                                    <input type="hidden" name="no_faces" id="no_faces">
                                    <input type="hidden" name="not_looking_at_screen" id="not_looking_at_screen">
                                    <input type="hidden" name="tab_switches" id="tab_switches">
                                    <input type="hidden" name="quiz_id" id="quiz_id" value="{{ $quiz_id }}">
                                    <input type="hidden" name="student_id" id="student_id" value="{{ $student_id }}">
                                    @csrf
                                    <?php $j = 0; $i = 0?>
                                    @foreach($questions as $question)
                                        <section>
                                            <div class="que_text">
                                                <span>{{ $question->question }}</span></div>
                                            <div class="option_list">
                                                <input type="hidden"
                                                       name="questions[{{ $question->question_id }}]"
                                                       value="null"
                                                       checked="checked"/>
                                                @while($j < count($answers) && $question->question_id == $answers[$j]->question_id)
                                                    <div class="form-check">
                                                        <input style="position:absolute;margin-top:.3rem;margin-left:-1.25rem" type="radio"
                                                               name="questions[{{ $question->question_id }}]"
                                                               id="flexRadioDefault1"
                                                               value="{{ $answers[$j]->answer_id }}">
                                                        <label class="form-check-label option"
                                                               for="flexRadioDefault1">
                                                            {{ $answers[$j]->answer }}
                                                        </label>
                                                        <?php $j++; ?>
                                                    </div>
                                                @endwhile
                                                <?php $i++;?>
                                            </div>
                                        </section>
                                    @endforeach

                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="camera" hidden></div>
    <div id="results" hidden></div>

    <form id="myAwesomeForm" method="post" action="endpoint.php" hidden>
        <input type="text" id="filename" name="image" /> <!-- Filename -->
        <input type="submit" id="submitButton" name="submitButton" /> <!-- Submit -->
    </form>

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
@include('includes.custom_js')
<script>
    enableTabLogging();
    quizDuration = {{ $quiz_duration }} *
    60;
    setInterval(snapshotInterval, 10000);
    var sec = quizDuration,
        countDiv = document.getElementById("timer"),
        secpass,
        countDown = setInterval(function () {
            secpass();
        }, 1000);

    function secpass() {
        var min = Math.floor(sec / 60),
            remSec = sec % 60;
        if (remSec < 10) {
            remSec = '0' + remSec;
        }
        if (min < 10) {
            min = '0' + min;
        }
        countDiv.innerHTML = min + ":" + remSec;
        if (sec > 0) {
            sec = sec - 1;
        } else {
            clearInterval(countDown);
            countDiv.innerHTML = 'countdown done';
            document.getElementById('quiz_form').submit();
        }
    }
</script>
</body>
</html>
