<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
{{--                    <img src="../../AnywherePariksha/public/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">--}}
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
{{--									{{ $user->name }}--}}
                                    Username
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="index.html">
                        <i class="fas fa-home fas fa-home"></i>
                        <p>Dashboard</p>
{{--                        <span class="badge badge-count">5</span>--}}
                    </a>
                </li>
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Quiz</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('create_quiz_view')}}">
                                    <span class="sub-item">Create Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('create_quiz_question')}}">
                                    <span class="sub-item">Add Questions to Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('assign_quiz_to_student') }}">
                                    <span class="sub-item">Assign Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/gridsystem.html">
                                    <span class="sub-item">View All Quizzes</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-users"></i>
                        <p>Students</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('view_all_students') }}">
                                    <span class="sub-item">View All Students</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#results">
                        <i class="fas fa-users"></i>
                        <p>Results</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="results">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="" role="button" data-toggle="modal" data-target="#select_quiz_modal">
                                    <span class="sub-item" >Generate Results</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#logs">
                        <i class="fas fa-layer-group"></i>
                        <p>Logs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="logs">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('quiz_logs_index')}}">
                                    <span class="sub-item">Verify Logs</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>

