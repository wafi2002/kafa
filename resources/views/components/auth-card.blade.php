
@section('main-class', 'bg-secondary bg-opacity-10')

@push('styles')
<style>
    .login-button {
        align-items: center;
        appearance: none;
        background-color: #f2ef16;
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, rgb(209, 209, 13) 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        font-family: 'Poppins', sans-serif;
        height: 48px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-inline: 20%;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .login-button:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .login-button:hover {
        box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, rgb(209, 209, 13) 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .login-button:active {
        box-shadow: rgb(209, 209, 13) 0 3px 7px inset;
        transform: translateY(2px);
    }
</style>
@endpush

<!-- Content -->
@section('content')
<div class="px-4 py-3">
    <div class="d-flex justify-content-start">
        <img src="{{ asset('images/logo.png') }}" alt="logo" width="200px">
    </div>
</div>
<div class="d-flex justify-content-center align-items-center">
    <div class="card mx-auto shadow-sm p-4" style="width: 30%;">
        <div>
            <div class="container d-flex flex-column py-3 px-3">
                <h6 class="text-secondary" style="font-family: 'Poppins', sans-serif; font-weight: 400;">
                    Please enter your details
                </h6>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700;">
                    {{ $title }}
                </h2>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>