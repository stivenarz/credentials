<div class="">

    <div class=" m-1">
        <div class="table-width m-auto  ">
            <div class="d-flex justify-content-between">
                <h3>{{ auth()->user()->name }}'s credentials</h3>
                @if ( !$credential )
                <button type="button" class="btn btn-primary" wire:click='create()' id="btnOpenModal">Add new</button>
                @endif
            </div>
        </div>
    </div>

    @include('partials.new_credential')
    @include('partials.table_credentials')
    
    <footer>
        <div class="text-center text-secondary">
            copyright 2023 | by SNARZ
        </div>
    </footer>
</div>