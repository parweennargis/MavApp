@include('admin.layout')
<div class="col-lg-12">
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="" role="form" method="POST" id="add_category">

                                    <div style="display: none" id="msg-div">
                                        <div class="alert alert-danger" role="alert">
                                            <span class="badge badge-pill badge-danger">Warning</span> 
                                            <span id="alert-msg"></span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group has-success">
                                        <label class="control-label mb-1">Name</label>
                                        <input id="name" value="" name="name" placeholder="Name..." class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label mb-1">Status</label>
                                        <div>
                                            <select name="status" id="status" class="form-control-sm form-control">
                                                <option value="">Please select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var base_url = "{{ url('') }}";
var token = "{{ csrf_token() }}";
$(document).on("submit", "#add_category", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: base_url + "/admin/add/post-category",
        dataType: "json",
        data: {
            _token: token,
            category: $("#name").val(),
            question: $("#status").val()
        },
        success: function (res) {
            console.log(res);
            if (res.result) {
                window.location.href = res.intended;
            } else {
//                    display error here
                $("#msg-div").show();
                $("#alert-msg").text("All fields are required fields");
            }
        }
    });
});
</script>