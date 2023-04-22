<div class="table-width m-auto">

    <!-- Modal -->
    <div class="card">
        <div class="">
            <div class="">
                <div class="card-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"> {{ $mTitle }} </h1>
                    <button type="button" class="btn-close"
                        wire:click='openModal(false)' id="btnClose"></button>
                </div>
                <div class="card-body">

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
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary"
                        wire:click='openModal(false)'>Close</button>
                    <button type="button" class="btn btn-primary" wire:click='save(null)'> {{ $btnSave }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
