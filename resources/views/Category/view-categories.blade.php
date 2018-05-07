@include('admin.layout')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Categories</strong>
            <strong class="card-title" style="float: right;">
                <a href="{{ url('/admin/add/category') }}" >Add Category </a>
            </strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td><a href="{{ url("/admin/edit/category/$category->id") }}">Edit</a></td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>