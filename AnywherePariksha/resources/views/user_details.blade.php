<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="../../AnywherePariksha/public/assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->

    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: [
                    {{asset("assets/css/fonts.css")}}]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/azzara.min.css")}}">
</head>
<body class="login">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Fill details to begin test</h3>
        <form action="/register" method="POST">
            @csrf
            <div class="login-form">
                <div class="form-group">
                    <label for="fullname" class="placeholder"><b>Fullname</b></label>
                    <input id="fullname" name="name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <input id="password" name="password" type="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="contact" class="placeholder"><b>Contact</b></label>
                    <input id="contact" name="contact" type="number" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="gender" class="placeholder"><b>Gender</b></label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dob" class="placeholder"><b>Date of birth</b></label>
                    <input id="dob" name="dob" type="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="id_card" class="placeholder"><b>ID Card</b></label>
                    <input type="file" name="id_card" class="form-control" id="id_card" >
                </div>
                <div class="form-group">
                    <label for="user_photo" class="placeholder"><b>Take a photo from webcam</b></label>
                    <div class="position-relative">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Open webcam
                        </button>
                    </div>
                </div>
                <div class="row form-sub m-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                        <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
                    </div>
                </div>
                <div class="row form-action">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-primary w-100 fw-bold">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>


@include('modals.camera_modal')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
@include('includes.custom_js')


</body>
</html>
