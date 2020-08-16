@if(session()->has('message'))
    <div class="form-group col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message')  }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif