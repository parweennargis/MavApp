@include('member.layout')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active"><a href="#" >{{ $categorydata['name']}}</a> | Online {{ $categorydata['name']}} Test</li>
    </ul>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        @foreach($categories as $category)
        <i class="icon-info"></i>
        <a href="{{ url('/member/question/' . $category->id ) }}" style="font-size: 15px;"> 
            {{ $category->name }}
        </a>
        <br>
        Number of questions : <b>20</b> | Time : <b>20 minutes</b>
        <hr>
        @endforeach
    </div>
    <div class="col-md-2">

    </div>
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
//    $("#cancel").click(function () {
//        alert('You dont want to proceed further??');
//    });
</script>
