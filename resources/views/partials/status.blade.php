@if (session('status'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('statusOk'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('statusOk') }}
                </div>
            </div>
        </div>
    </div>
@endif
