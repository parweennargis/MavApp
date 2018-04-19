@include('admin.layout')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Questions</strong>
            <strong class="card-title" style="float: right;">
                <a href="{{ url('/admin/add/questions') }}" >Add Questions </a>
            </strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Question</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($questions as $question)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $question->name }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->status }}</td>
                        <td><a href="{{ url('/admin/edit/question') }}">Edit</a></td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>