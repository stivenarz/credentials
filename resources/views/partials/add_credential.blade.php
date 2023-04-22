<div class="m-1">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        data-bs-keyboard="false" wire:click='openModal(true)' id="btnOpenModal">+</button>
    {{-- <button type="button" class="btn btn-primary" onclick="OpenModal(true)" wire:click='openModal(true)'>Add new</button> --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"> {{ $mTitle }} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='openModal(true)' id="btnClose"></button>
                </div>
                <div class="modal-body">

                    <div class="m-auto col-md-12 px-3 py-3 rounded justify-content-between">
                        <div class="row mb-2">
                            <label for="detail" class="col-md-2 col-form-label text-md-end">Detail:</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="detail" id="detail" wire:model='detail'
                                    placeholder="input the detail for your new credential">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="username" class="col-md-2 col-form-label text-md-end">Username:</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="username" id="username" wire:model='username'
                                    placeholder="input the username for your new credential">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="password" class="col-md-2 col-form-label text-md-end">Password:</label>
                            <div class="col-md-10 d-flex">
                                <input class="form-control" type="password" name="password" id="password" wire:model='password'
                                    placeholder="input the password for your new credential">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click='openModal(true)'>Close</button>
                    <button type="button" class="btn btn-primary" onclick="Save()"> {{ $btnSave }} </button>
                </div>
            </div>
        </div>
    </div>
</div>
