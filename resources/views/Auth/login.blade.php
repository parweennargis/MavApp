<html>
    <head>
        <title>test</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    </head>

    <form action="" role="form" method="POST" id="login_form">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Submit">
    </form>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        <hr>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
var base_url = "{{ url('') }}";
var token = "{{ csrf_token() }}";
$(document).on("submit", "#login_form", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: base_url + "/auth/login-user",
        dataType: "json",
        data: {
            _token: token,
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function (res) {
            if (res.result) {
//                    redirect user to dashboard page
                window.location.href = res.intended;
            } else {
//                    display error here
            }
        }
    });
});
    </script>
</html>