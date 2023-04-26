<div class="">

    <div class=" m-1">
        <div class="col-sm-12 col-md-12 row table-width m-auto">
            <div class="col-12">
                <h3>{{ auth()->user()->name }}'s credentials</h3>
            </div>

            <div class="d-flex justify-content-between col-12">
                {{-- <a href=""></a> --}}
                @if (!$credential)
                    {{-- BUTTON SEARCH --}}
                    @include('partials.search')
                    {{-- BUTTON NEW CREDENTIAL --}}
                    <div class="ml-4">
                        <button type="button" class="btn btn-primary" wire:click='create()' id="btnOpenModal">Add
                            new</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div>
        @if ($modal)
            @include('partials.new_credential')
        @else
            @include('partials.table_credentials')
            <script>
                HeightDiv();
            </script>
        @endif
    </div>

</div>

