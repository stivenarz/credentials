<style>
    .pr-img{
        display: flex;
        padding-right: 50px;
    }
    .invalid{
        border: solid 1px red;
    }
    .img-password {
        position: relative;
        right: 0;
        width: 30px;
        border-radius: 100%;
    }
</style>
<div class="table-width" @if (!$modal) hidden @endif>

    <!-- Modal -->
    <div class="card">
        <form id="form">
            {{-- TITLE & CLOSE BUTTON --}}
            <div class="card-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> {{ $mTitle }} </h1>
                <button type="button" class="btn-close" wire:click='openModal(false)' id="btnClose"></button>
            </div>
            {{-- CARD BODY --}}
            <div class="card-body" id="formBody">
                <div class="m-auto col-md-12 col-sm-12 px-3 py-3 rounded justify-content-between" id="formElements">
                    <div class="row mb-2">
                        <label for="detail" class="col-md-2 col-form-label text-md-end">Detail:</label>
                        <div class="col-md-10">
                            <input class="form-control @if ($error['detail'] === true) invalid @endif "
                                type="text" name="detail" id="detail" wire:model='detail'
                                placeholder="input the detail for your new credential" autofocus>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="username" class="col-md-2 col-form-label text-md-end">Username:</label>
                        <div class="col-md-10">
                            <input class="form-control {{ $error['username'] == true ? 'invalid' : '' }}"
                                type="text" name="username" id="username" wire:model='username'
                                placeholder="input the username for your new credential" autofocus>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="password" class="col-md-2 col-form-label text-md-end">Password:</label>
                        <div class="col-md-10 d-flex">
                            <input class="form-control @if ($error['password'] == true) invalid @endif"
                            type="{{ $pass == true ? 'text' : 'password' }}" name="password" id="password"
                            wire:model='password' placeholder="input the password for your new credential"
                            autofocus>
                            <a class="img-password" href="#"
                                wire:click='setPass({{ $pass == true ? 'false' : 'true' }})'>
                                <img class="img-width" src="/img/{{ $pass == true ? 'eye-off' : 'eye-on' }}.svg"
                                    alt="See password">
                            </a>
                        </div>
                    </div>
                </div>
                {{-- SESSION STATUS --}}
                <div class="text-center">
                    @include('partials.session_status')
                </div>
            </div>
            {{-- CARD FOOTER --}}
            <div class="modal-footer mb-2">
                <div class="btn-group">
                    <button id="btnSubmit" type="button" class="btn btn-primary" wire:click='save()'>
                        {{ $btnSave }} </button>
                    <button id="btnCancel" type="button" class="btn btn-secondary" wire:click='openModal(false)'>
                        Cancel </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if ($modal)
    <script>
        window.addEventListener("keyup", function(e) {
            if (e.key === "Enter") {
                btnSubmit.click();

                let inputs = Array.from(document.getElementsByClassName('form-control'));
                for (let i = 0; i < inputs.length; i++) {
                    const input = inputs[i];
                    if (input.value.replace(/ /g, '') === ''){
                        input.focus();
                        break;
                    }else{
                        detail.focus();
                    }
                }
            } else if (e.key === "Escape") {
                btnCancel.click();
            }
        });
    </script>
@endif
