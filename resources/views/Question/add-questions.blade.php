@include('admin.layout')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add Questions</strong>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="" role="form" method="POST" id="add_question">

                                    <div style="display: none" id="msg-div">
                                        <div class="alert alert-danger" role="alert">
                                            <span class="badge badge-pill badge-danger">Warning</span> 
                                            <span id="alert-msg"></span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-1">Category</label>
                                        <div>
                                            <select name="category" id="category" class="form-control-sm form-control">
                                                <option value="0">Please select</option>
                                                @foreach($activeCategories as $activeCategory)
                                                <option value="{{ $activeCategory->id }}">{{ $activeCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group has-success">
                                        <label class="control-label mb-1">Question</label>
                                        <textarea name="question" id="question" rows="3" placeholder="Content..." class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-1">Option1</label>
                                        <textarea name="option1" id="option1" rows="2" placeholder="Option 1" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-1">Option2</label>
                                        <textarea name="option2" id="option2" rows="2" placeholder="Option 2" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Option3</label>
                                        <textarea name="option3" id="option3" rows="2" placeholder="Option 3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Option4</label>
                                        <textarea name="option4" id="option4" rows="2" placeholder="Option 4" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-1">Hint</label>
                                        <textarea name="hint" id="hint" rows="2" placeholder="Hint..." class="form-control"></textarea>
                                    </div>
                                    
                                    <div class="form-group" style="background-color: #bbcfe0">
                                        <label class="control-label mb-1">Answer</label>
                                        <input type="radio" value="1" name="answer"> Option 1
                                        <input type="radio" value="2" name="answer"> Option 2
                                        <input type="radio" value="3" name="answer"> Option 3
                                        <input type="radio" value="4" name="answer"> Option 4
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
$(document).on("submit", "#add_question", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: base_url + "/admin/add/post-question",
        dataType: "json",
        data: {
            _token: token,
            category: $("#category").val(),
            question: $("#question").val(),
            option1: $("#option1").val(),
            option2: $("#option2").val(),
            option3: $("#option3").val(),
            option4: $("#option4").val(),
            answer: $('input[name=answer]:checked').val(),
            hint: $("#hint").val()
        },
        success: function (res) {
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