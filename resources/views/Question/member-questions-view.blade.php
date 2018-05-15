@include('member.layout')
<link rel="stylesheet" href="{{ URL::asset('assets/sms/jquery.countdownTimer.css') }}">
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active">Questions</li>
    </ul>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        Category Name : {{ $categorydata['name'] }}
    </div>
    <div class="col-md-6">
        Time : 30mins
    </div>


    <hr>
    <div class="col-md-12">
        Question : <span id="questionTitle">{{ $question['question'] }}</span>
        <hr>
        <form action="" role="form" method="POST" id="user_question_form">
            <input type="text" class="hidden" id="questionId" value="{{ $question['id'] }}" >
            <input type="text" class="hidden" id="categoryId" value="{{ $categorydata['id'] }}" >
            Question Option : 
            <div id="question_option">
                @foreach($questionOptions as $questionOption)
                    <input type="radio" value="{{ $questionOption['id'] }}" name="question_option">  {{ $questionOption['option'] }}
                @endforeach
            </div>
            
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                </button>
            </div>
        </form>

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
                if (res.result) {
                    $("#categoryId").val(categoryId);
                    $("#questionTitle").text(res.msg.question);
                    $("#question_option").html("");
                    $.each(res.msg.questionOptions, function(index, tag) {
                        $('#question_option').append (
                            '<input type="radio" value="' + tag['id'] + '" name="question_option"> ' + tag['option'] + ' '
                        );
                    });
                } else {
                    alert('error here');
//                    display error here
                    
                }
            }
        });
    });
</script>
