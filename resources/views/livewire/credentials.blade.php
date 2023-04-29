{{-- <div class="app-header">
        <h3>{{ auth()->user()->name }}'s credentials</h3>
</div> --}}
<div class="app-container" id="app-container">
    @if ($modal)
        @include('partials.new_credential')
    @elseif(!$modal)

        <div class="header-content" id="header-content">
            @include('partials.search')
        </div>
        <div class="body-content" id="body-content">
            @include('partials.table_credentials')
        </div>
        <div class="footer-content" id="footer-content">
            @include('partials.add_button')
        </div>

    @endif

    <script>
        FormatDivTable();
        HidePassEcept();
    </script>
</div>
