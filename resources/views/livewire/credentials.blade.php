<div class="">
    @if ($modal)
        @include('partials.new_credential')
    @else
        @include('partials.table_credentials')
    @endif
</div>

<script>
    let timerlogout;

    function logOut() {
        clearInterval(timerlogout);
        timerlogout = setInterval(() => {
                document.getElementById('logout_session').click();
            }, 60000);
    }
    
    logOut();

    const app = document.getElementById('app');

    app.addEventListener("mousemove", function(){
        logOut()
    })

    app.addEventListener("keyup", function(){
        logOut()
    })
</script>