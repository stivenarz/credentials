<style>
    .div-search{
        display: flex;
        /* z-index: -10; */
    }
    .img-search {
        position: relative;
        left: -245px;
        width: 20px;
        border-radius: 100%;
    }
    .input-search{
        display: flex;
        left: 0;
        padding-left: 30px;
        max-width: 250px; 
    }
</style>
<div class="div-search">
    <input type="search" class="form-control input-search" placeholder="Search" id="inputsearch" wire:model='search'
    autofocus />
    <img class="img-search" src="/img/search.svg" alt="">
</div>
