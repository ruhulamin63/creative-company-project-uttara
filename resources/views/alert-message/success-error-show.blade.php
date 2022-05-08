{{-- @if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert">
        {{ session($key ?? 'status') }}
    </div>
@endif --}}


@if(session()->has('error') && !session()->get('error'))
    <div class="alert alert-success alert-dismissible mb-2" role="alert">
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button> --}}
        <div class="d-flex align-items-center">
            <i class="bx bx-like"></i>
            <span>
                {{ session()->get('msg') }}
            </span>
        </div>
    </div>
    @endif
    
    @if(session()->has('error') && session()->get('error'))
    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button> --}}
        <div class="d-flex align-items-center">
            <i class="bx bx-error"></i>
            <span>
                {{ session()->get('msg') }}
            </span>
        </div>
    </div>
@endif
