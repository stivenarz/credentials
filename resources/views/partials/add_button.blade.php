<style>
    .div-add {
        max-width: 1000px;
    }

    .button-add {
        position: absolute;
        margin: 0;
        display: flex;
        justify-content: right;
        bottom: 11%;
        right: 5%;
        width: 50px;
        border-radius: 100%;
        z-index: 1;
    }
</style>
<div class="div-add">
    <a href="#" wire:click='create()' id="btnOpenModal" class="">
        <img class="button-add" src="/img/add.svg" alt="">
    </a>
</div>
