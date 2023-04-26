<div class="h-content" id="divcontent" @if ($modal) hidden @endif>
    <div class="table-width table-height m-auto overflow-auto" id="div-table">
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
                <tbody id="tableBody">
                    @foreach ($credentials as $index => $credential)
                        <tr>
                            <td class="">{{ $credential->detail }}</td>
                            <td class="">{{ $credential->username }}</td>
                            <td>
                                <div class="d-flex justify-content-betweenfy">
                                    <div class="col-10" id="password-{{ $credential->id }}" name="password">
                                        {{ $credential->id == $ind ? $credential->password : '**********' }}
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="#" onclick="GetPass({{ $credential->id }})"
                                            id="btnSee-{{ $credential->id }}" name="btnSee" key="{{ $credential->id }}">
                                            <img class="img-width " src="/img/eye-on.svg" alt="See"
                                                id="img-BtnSee-{{ $credential->id }}">
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="mr-10" wire:click="edit( {{ $credential->id }} )">
                                        <img class="img-width " src="/img/edit.svg" alt="Edit"></a>
                                    <a href="#" class="ml-10" onclick="confirmDelete({{ $credential->id }})">
                                        <img class="img-width " src="/img/delete.svg" alt="Delete"></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <button hidden wire:click='setID(null)' id="setIdNull" onclick="reset()">reset
                        pass</button>
                    <button hidden id="heightdiv" onclick="HeightDiv()">reset height div</button>
                    <button id="btnDelete" value="" wire:click="delete( document.getElementById('btnDelete').value )"
                        hidden></button>
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
</div>

<script>
    const credentials = <?php echo $credentials; ?>;
    let passed = [];
    let timerpassword;
    const btnsee = document.getElementsByName('btnSee');
    const divpassword = document.getElementsByName('password');

    function reset() {
        document.getElementById('heightdiv').click();
        clearTimerPassword();
    }

    function GetPass(id = null) {
        if (passed.find((data) => {
                return data == id
            })) {
            HidePassEcept(id);
        } else {
            HidePassEcept();
            ShowPass(id);
        }
    }

    function HidePassEcept(id = null) {
        passed = passed.filter((filter) => {

            document.getElementById(`password-${filter}`).innerText = '**********';
            document.getElementById(`img-BtnSee-${filter}`).src = '/img/eye-on.svg';
            // document.getElementById(`BtnSee-${filter}`).key = id;
            if (id && id !== filter) {
                return filter
            } else {
                passed = [];
            }
        })
    }

    function ShowPass(id = null) {
        if (!id) {
            return
        }
        let credential = credentials.find((data) => {
            return data.id == id;
        })
        document.getElementById(`password-${id}`).innerText = credential.password;
        document.getElementById(`img-BtnSee-${id}`).src = '/img/eye-off.svg';
        // document.getElementById(`BtnSee-${id}`).key = '098';
        passed.push(id);
    }

    function HidePassAuto() {
        clearTimerPassword();
        timerpassword = setInterval(() => {
            document.getElementById("setIdNull").click();
            clearTimerPassword();
        }, 10000);
    }

    function clearTimerPassword() {
        clearInterval(timerpassword);
    }

    function confirmDelete(id) {
        const btnDelete = document.getElementById('btnDelete');
        if (confirm(`¿confirm delete this credential?`)) {
            btnDelete.value = id;
            btnDelete.click();
        }
    }

    window.addEventListener('resize', () => {
        HeightDiv()
    });

    function HeightDiv() {
        var vHeight = `${window.innerHeight - 230}px`;
        document.getElementById('div-table').style.height = vHeight;
    }
</script>
