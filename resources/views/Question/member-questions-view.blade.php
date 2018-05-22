@include('member.layout')
<!--<link rel="stylesheet" href="{{ URL::asset('assets/sms/jquery.countdownTimer.css') }}">-->
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active"><a href="#">{{ $categorydata['name'] }}</a> | Questions | Time : 30mins</li>
    </ul>
</div>

<!--<div class="col-md-12">-->



<!--<hr>-->
<div class="col-md-12">
    <div class="col-md-8" style="line-height: 24px;font-size: 15px;font-weight: 600;">
        {{ $memberStepId }} : <span id="questionTitle">{{ $question['question'] }}</span>
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
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <b>Instructions</b>
        <br>
        test
        <hr>
        test
        <hr>
        test
    </div>

</div>


@include('member.footer')
<script>
    var base_url = "{{ url('') }}";
    var token = "{{ csrf_token() }}";
    $(document).on("submit", "#user_question_form", function (e) {
        e.preventDefault();

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
                if (res.result && res.next) {
                    console.log('1');
                    $("#categoryId").val(categoryId);
                    $("#questionTitle").text(res.msg.question);
                    $("#question_option").html("");
                    $.each(res.msg.questionOptions, function (index, tag) {
                        $('#question_option').append(
                                '<li><input type="radio" value="' + tag['id'] + '" name="question_option"> ' + tag['option'] + '</li> '
                                );
                    });
                } else if (res.result && res.next === false) {
                console.log('2');
                    $("#payment-button-amount").html('Done');
                } else {
                console.log('3');
                    alert('error here');
//                    display error here

                }
            }
        });
    });
</script>
