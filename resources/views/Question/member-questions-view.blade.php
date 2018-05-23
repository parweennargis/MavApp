@include('member.layout')
<link rel="stylesheet" href="{{ URL::asset('member/css/jquery.countdownTimer.css') }}">
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active"><a href="#">{{ $categorydata['name'] }}</a> | Questions  
        <span id="timer" style="margin-left: 360px;"></span>
        </li>
    </ul>
</div>

<div class="col-md-12">
    <div class="col-md-8" id="question-div" style="line-height: 24px;font-size: 15px;font-weight: 600;">
        <div class="alert alert-danger fade in block" id="error-div" style="display: none">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span id="error-span"></span>
        </div>
        <span id="stepId">{{ $memberStepId }}</span> : <span id="questionTitle">{{ $question['question'] }}</span>
        <hr>

        <form action="" role="form" method="POST" id="user_question_form">
            <input type="text" class="hidden" id="questionId" value="{{ $question['id'] }}" >
            <input type="text" class="hidden" id="categoryId" value="{{ $categorydata['id'] }}" >
            <ul id="question_option">
                @foreach($questionOptions as $questionOption)
                <li>
                    <input type="radio" value="{{ $questionOption['id'] }}" name="question_option">  {{ $questionOption['option'] }}
                </li>
                @endforeach
            </ul>
            <hr>
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-7" id="thank-div" style="display: none">
        Thank You
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <div class="instruction-main-div">
            <h4>Instructions</h4>
            <ul>
                <li>
                    Time alloted: 30 mins
                </li>
                <li>
                    Each question carry 1 mark, no negative marks.
                </li>
                <li>
                    Click the 'Submit Test' button given in the bottom of this page to Submit your answers.
                </li>
                <li>
                    Test will be submitted automatically if the time expired.
                </li>
                <li>
                    Don't refresh the page.
                </li>
            </ul>
        </div>
    </div>

</div>

@include('member.footer')
<script>
    var base_url = "{{ url('') }}";
    var token = "{{ csrf_token() }}";
    $(document).on("submit", "#user_question_form", function (e) {
        e.preventDefault();
        var optionValue = $('input[name=question_option]:checked').val();
        if (!optionValue) {
            $("#error-div").show();
            $("#error-span").html('Please choose one from the following option');
            return;
        }

        var categoryId = $("#categoryId").val();
        $.ajax({
            method: "POST",
            url: base_url + "/member/add/post-question",
            dataType: "json",
            data: {
                _token: token,
                questionId: $("#questionId").val(),
                categoryId: categoryId,
                option: $('input[name=question_option]:checked').val()
            },
            success: function (res) {
                console.log(res);
                if (res.result && res.next) {
                    $("#error-div").hide();
                    $("#categoryId").val(categoryId);
                    $("#questionTitle").text(res.msg.question);
                    $("#stepId").text(res.msg.stepId);
                    $("#question_option").html("");
                    $.each(res.msg.questionOptions, function (index, tag) {
                        $('#question_option').append(
                            '<li><input type="radio" value="' + tag['id'] + '" name="question_option"> ' + tag['option'] + '</li> '
                        );
                    });
                } else if (res.result && res.next === false) {
                    $("#question-div").hide();
                    $("#timer").hide();
                    $("#thank-div").show();
                } else {
                    console.log('3');
                    alert('error here');
//                    display error here

                }
            }
        });
    });

    jQuery(function () {
        jQuery("#timer").countdowntimer({
            minutes: 30,
            seconds: 0,
            size: "sm"
        });
    });
</script>
