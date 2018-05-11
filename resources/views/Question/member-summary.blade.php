@include('member.layout')
<div class="page-header">
    <div class="page-title">
        <h3>Question Summary <small>Welcome Eugene. 12 hours since last visit</small></h3>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active">Question Summary</li>
    </ul>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <ul class="info-blocks">
            <li class="bg-success">
                <div class="top-info">
                    <span style="font-size: 15px;font-weight: bold;">Category Name</span>
                </div>
                <span style="font-size: 22px;color: black;font-weight: bold;">{{ $categorydata['name'] }}</span>
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <ul class="info-blocks">
            <li class="bg-success">
                <div class="top-info">
                    <span style="font-size: 15px;font-weight: bold;">Total Time</span>
                </div>
                <span style="font-size: 22px;color: black;font-weight: bold;">30 mins</span>
            </li>
        </ul>
    </div>
</div>

<div>
    <ul class="info-blocks">
        <li class="bg-warning">
            <div class="top-info">
                <span style="font-size: 15px;font-weight: bold;">Total Questions</span>
            </div>
            <a href="#" id="cancel"><i class="icon-cancel"></i></a>
            <a href="{{ url('/member/question/'. $categorydata['name']) }}"><i class="icon-checkmark"></i></a>
            <span style="font-size: 22px;color: black;font-weight: bold;">{{ $questionCount }}</span>
        </li>
    </ul>
</div>

@include('member.footer')
<script>
    $("#cancel").click(function () {
        alert('You dont want to proceed further??');
    });
</script>
