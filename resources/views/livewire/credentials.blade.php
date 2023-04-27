{{-- <div class="app-header">
        <h3>{{ auth()->user()->name }}'s credentials</h3>
</div> --}}

@if ($modal)
    @include('partials.new_credential')
@elseif(!$modal)
    <div class="d-flex justify-content-between sticky-top">
        @include('partials.search')
        <button type="button" class="btn btn-primary" wire:click='create()' id="btnOpenModal">Add_new</button>
    </div>
    @include('partials.table_credentials')
@endif

<script>
    // HeightDiv();
    HidePassEcept();
</script>
