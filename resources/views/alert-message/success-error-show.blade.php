@if(session()->has('error') && !session()->get('error'))
    <div class="alert alert-success alert-dismissible mb-2" role="alert">
        <div class="d-flex align-items-center">
            <i class="bx bx-like"></i>
            <span>
                {{ session()->get('message') }}
            </span>
        </div>
    </div>
@endif
    
@if(session()->has('error') && session()->get('error'))
    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <div class="d-flex align-items-center">
            <i class="bx bx-error"></i>
            <span>
                {{ session()->get('message') }}
            </span>
        </div>
    </div>
@endif

