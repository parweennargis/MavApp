@include('member.layout')
<div class="page-header">
    <div class="page-title">
        <h3>Questions <small>Welcome Eugene. 12 hours since last visit</small></h3>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active">Questions</li>
    </ul>
</div>

<div class="col-md-12">
    <div>
        Category Name : {{ $categorydata['name'] }}
        Time : 30mins
        Question : {{ $question['name'] }}
    </div>
    <div>
        Question Option : 
        @foreach($questionOptions as $questionOption)
                <input type="radio" value="{{ $questionOption['id'] }}" >{{ $questionOption['option'] }}
        @endforeach
        
    </div>
</div>


@include('member.footer')
<script>
    $(window).on('beforeunload', function() {
        alert('got');
        // your logic here
    });
</script>
