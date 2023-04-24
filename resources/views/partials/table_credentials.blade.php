<div class="table-width m-auto table-height overflow-scroll" @if ($modal) hidden @endif>
    <table class="table table-striped">
        @isset($credentials[0])
            <thead class="table sticky-top">
                <tr>
                    <th class="text-bold text-primary text-bg-light" style="width: 30%">DETAILS</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 30%">USERNAME</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 30%">PASSWORD</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 10%">ACTIONS</th>
                </tr>
                <tr class="table-group-divider">

                </tr>
            </thead>
            <tbody>
                @foreach ($credentials as $credential)
                    <tr>
                        <td class="">{{ $credential->detail }}</td>
                        <td class="">{{ $credential->username }}</td>
                        <td class="">
                            <div class="d-flex justify-content-betweenfy">
                                <div class="col-10">
                                    {{ $credential->id == $ind ? $credential->password : '**********' }}
                                </div>
                                <div class="col-2 text-right">
                                    <a class="" href="#" wire:click="setID( {{ $credential->id }} )"
                                        onclick="hidepassword()" id="btnSee">
                                        <img class="img-width "
                                            src="/img/{{ $credential->id == $ind ? 'eye-off' : 'eye-on' }}.svg"
                                            alt="See">
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="mr-10"
                                    wire:click="edit( {{ $credential->id }} )">
                                    <img class="img-width "
                                    src="/img/edit.svg"
                                    alt="Edit"></a>
                                    <a href="#" class="ml-10"
                                    onclick="confirmDelete({{ $credential->id }})">
                                    <img class="img-width "
                                    src="/img/delete.svg"
                                    alt="Delete"></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <button hidden wire:click='setID(null)' id="setIdNull">reset pass</button>
                        <button id="btnDelete" value="" wire:click="delete( document.getElementById('btnDelete').value )" hidden></button>
            </tbody>
        @else
            <tr>
                <td colspan="3" class="text-center">
                    <h3>not credentials found</h3>
                </td>
            </tr>
        @endisset
    </table>
</div>

<script>
    let timerpassword;
    function hidepassword() {
        clearInterval(timerpassword);
        timerpassword = setInterval(() => {
            document.getElementById("setIdNull").click();
        }, 10000);
    }

    function confirmDelete(id){
        const btnDelete = document.getElementById('btnDelete');
        if (confirm(`¿confirm delete this credential?`)) {
            btnDelete.value = id;
            btnDelete.click();
    }
    }
</script>
