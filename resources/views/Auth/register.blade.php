<html>
    <head>
        <title>test</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    </head>

    <form action="" role="form" method="POST" id="register_form">
        <input type="text" name="first_name" id="first_name">
        <input type="text" name="last_name" id="last_name">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <input type="text" name="phone" id="phone">
        <input type="submit" name="submit" value="Submit">
    </form>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        <hr>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook">
                    <i class="fa fa-facebook"></i> 
                    Facebook
                </a>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
var base_url = "{{ url('') }}";
var token = "{{ csrf_token() }}";
$(document).on("submit", "#register_form", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: base_url + "/auth/create-user",
        dataType: "json",
        data: {
            _token: token,
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            phone: $("#phone").val(),
        },
        success: function (res) {
            if (res.result) {
//                    redirect user to dashboard page
            } else {
//                    display error here
            }
        }
    });
});
    </script>
</html>