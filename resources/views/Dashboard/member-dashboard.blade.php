@include('member.layout')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li class="active">Dashboard | Online Test List</li>
    </ul>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        @foreach($categories as $category)
        <i class="icon-info"></i>
        <a href="{{ url('/member/question/summary/' . $category->name ) }}" style="font-size: 15px;"> 
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
        <a href="#">1. All Category</a>
        <hr>
        <a href="#">2. Engineering</a>
        <hr>
        <a href="#">3. Aptitude</a>
        <hr>
        <a href="#">4. Reasoning</a>
    </div>

</div>

@include('member.footer')              