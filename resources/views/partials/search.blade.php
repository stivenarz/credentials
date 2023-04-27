{{-- BUTTON SEARCH --}}
<div class="btn-group rounded col-4" id="divsearch">
    <input type="search" class="form-control" placeholder="Search" id="inputsearch"
        wire:model='search' onchange="" autofocus />
</div>
<script>
    const inputsearch = document.getElementById('inputsearch');
</script>