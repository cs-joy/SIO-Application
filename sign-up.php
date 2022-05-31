<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | SIO App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container my-1">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <h3 style="text-align: center">Sign up</h3>
        </div>
    </div>
    <div class="container my-8">
        <form class="row g-3 needs-validation" action="sign-up.php" method="post" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="firstname" placeholder="e.g: John" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lastname" placeholder="e.g: Doe" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="uname" name="username" placeholder="e.g: john_doe11" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" placeholder="e.g: Networking" name="department" required>
                <div class="invalid-feedback">
                    Please provide a valid department name.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Position</label>
                <input type="text" class="form-control" placeholder="e.g: Software Developer" id="position" name="position" required>
                <!--
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>Software Developer</option>
                    <option>Graphics Desiger</option>
                    <option>Software Architechture</option>
                    <option>Software Debugger</option>
                </select>
                -->
                <div class="invalid-feedback">
                    Please write a valid name of your position
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Phone</label>

                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">+880</span>
                    <input type="text" class="form-control" id="phone" name="phonenumber" required>
                    <div class="invalid-feedback">
                        Please provide a valid phone number.
                    </div>
                </div>
            </div>
            <div class="input-group col-mb-3">
                <input type="email" class="form-control" id="mail" name="email" placeholder="Email" required>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" id="signup" name="signup">Sign up</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function() {
            $('#signup').click(function(e) {
                var valid = this.form.checkValidity();

                if(valid) {
                    var firstname = $('#fname').val();
                    var lastname = $('#lname').val();
                    var username = $('#uname').val();
                    var department = $('#department').val();
                    var position = $('#position').val();
                    var phone = $('#phone').val();
                    var email = $('#mail').val();
                    var password = $('#pass').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'action.php',
                        data: {
                            firstname: firstname,
                            lastname: lastname,
                            username: username,
                            department: department,
                            position: position,
                            phone: phone,
                            email: email,
                            password: password
                        },
                        success: function(data){
                            Swal.fire({
                                'title':'Success',
                                'text': data,
                                'type':'success'
                            })
                            if($.trim(data) == "Successlly Registered!!") {
                                setTimeout('window.location.href = "log-in.php"', 2000);
                                console.log("User are registered Successfully");
                            }
                        },
                        error: function(data){
                            Swal.fire({
                                'title':'Error',
                                'text':'Failed to Create Your Profile',
                                'type':'error'
                            })
                        }
                    });

                } else {
                    console.log("Form validation failed!!");
                }
            })
        })
    </script>
</body>

</html>