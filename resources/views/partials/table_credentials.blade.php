<style>
    .div-table {
        margin: 1px;
        overflow: auto;
    }
    .sticky-table{
        background-color: aliceblue;
        position: sticky;
        top: 0px;
        left: 0;
        z-index: 1;
    }
    .propeties-table{
        max-width: 1000px;
        margin: 1px;
        margin: 0 auto 80px auto;
        z-index: -2;
    }
</style>

    <div class="div-table" id="div-table" @if ($modal) hidden @endif>
        <table class="table table-striped propeties-table " id="table-credentials">
            @isset($credentials[0])
                <tr class="sticky-table">
                    <th class="text-bold text-primary text-bg-light" style="width: 30%">DETAILS</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 20%">USERNAME</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 30%">PASSWORD</th>
                    <th class="text-bold text-primary text-bg-light" style="width: 20%">ACTIONS</th>
                </tr>
                <tr class="table-group-divider">
                </tr>
                @foreach ($credentials as $index => $credential)
                    <tr class="">
                        <td class="">{{ $credential->detail }}</td>
                        <td class="">{{ $credential->username }}</td>
                        <td class="">
                            <div class="d-flex justify-content-between">
                                <div class="col-10" id="password-{{ $credential->id }}" name="password">
                                    {{ $credential->id == $ind ? $credential->password : '**********' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="#" onclick="GetPass({{ $credential->id }})" id="btnSee-{{ $credential->id }}"
                                    name="btnSee" key="{{ $credential->id }}">
                                    <img class="img-width " src="/img/eye-on.svg" alt="See"
                                        id="img-BtnSee-{{ $credential->id }}">
                                </a>
                                <a href="#" class="mr-10" wire:click="edit({{ $credential->id }})">
                                    <img class="img-width " src="/img/edit.svg" alt="Edit"></a>
                                <a href="#" class="ml-10" onclick="confirmDelete({{ $credential->id }})">
                                    <img class="img-width " src="/img/delete.svg" alt="Delete"></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <button hidden wire:click='setID(null)' id="setIdNull" >reset_pass</button>
                <button hidden id="btnDelete" value=""
                    wire:click="delete(document.getElementById('btnDelete').value)">Delete</button>
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
    const credentials = <?php echo $credentials; ?>;
    let passed = [];
    let timerpassword;
    const btnsee = document.getElementsByName('btnSee');
    const divpassword = document.getElementsByName('password');

    function GetPass(id = null) {
        if (passed.find((data) => {
                return data == id
            })) {
            HidePassEcept(id);
            HidePassAuto(false);
        } else {
            HidePassEcept();
            ShowPass(id);
            HidePassAuto(true);
        }
    }

    function HidePassEcept(id = null) {
        passed = passed.filter((filter) => {

            document.getElementById(`password-${filter}`).innerText = '**********';
            document.getElementById(`img-BtnSee-${filter}`).src = '/img/eye-on.svg';
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
        passed.push(id);
    }

    function HidePassAuto(on) {
        clearTimerPassword();
        if(on){
            timerpassword = setInterval(() => {
                document.getElementById("setIdNull").click();
                clearTimerPassword();
                passed = [];
            }, 10000);
        }
    }

    function clearTimerPassword() {
        clearInterval(timerpassword);
    }

    function confirmDelete(id) {
        const btnDelete = document.getElementById('btnDelete');
        if (confirm(`¿confirm delete this credential?`)) {
            btnDelete.value = id;
            btnDelete.click();
            FormatDivTable();
        }
    }
   
    function FormatDivTable() {
    let hcontent = window.innerHeight*0.75;
    document.getElementById('div-table').style.height = `${hcontent}px`;
}
    HidePassEcept();
</script>
