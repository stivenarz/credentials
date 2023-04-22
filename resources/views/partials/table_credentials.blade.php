<div class="table-width m-auto">
    <div class="" style="padding: 0px 10px">
        <table class="table table-bordered">
            <thead class="table">
                <tr class="">
                    <div class="d-flex justify-content-between">
                        <h3>{{ auth()->user()->name }}'s credentials</h3>
                        {{-- @include('partials.add_credential') --}}
                        <button type="button" class="btn btn-primary" wire:click='openModal(true)' id="btnOpenModal">Add
                            new</button>
                    </div>
                </tr>
            </thead>
            @isset($credentials[0])
                <thead class="table">
                    <tr>
                        <th class="text-bold text-primary" style="width: 30%">DETAILS</th>
                        <th class="text-bold text-primary" style="width: 30%">USERNAME</th>
                        <th class="text-bold text-primary" style="width: 40%">PASSWORD</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($credentials as $credential)
                        <tr>
                            <td class="cels-table">{{ $credential->detail }}</td>
                            <td class="cels-table">{{ $credential->username }}</td>
                            <td class="cels-table" key='{{ $credential->id }}'>
                                <div class="btn-group d-flex justify-content-between">
                                    {{ $credential->id == $ind ? $credential->password : '*****' }}
                                    <div class="btn-group">
                                        <button id="id" class="btn btn-success"
                                            wire:click="setID( {{ $credential->id }} )"
                                            onclick="hidepassword()">See</button>
                                        <button id="" class="btn btn-primary"
                                            wire:click="edit( {{ $credential->id }} )">Edit</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <button hidden wire:click='setID(null)' id="setIdNull">reset pass</button>
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
    let timerpassword;

    function hidepassword() {
        clearInterval(timerpassword);
        timerpassword = setInterval(() => {
            document.getElementById('setIdNull').click();
        }, 10000);
    }
</script>
