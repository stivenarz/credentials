<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    {{-- <link rel="stylesheet" href="../css/prueba.css"> --}}
    @vite(['resources/css/prueba.css', 'resources/js/app.js'])
</head>
<body>
    <div id="root" class="root">
        <div id="navigation" class="navigation">
            navigation
        </div>
        <div id="body" class="body">
            body
        </div>
        <div id="footer" class="footer">
            footer
        </div>
    </div>
</body>
</html>
<script>
    window.addEventListener('resize', () => {
        HeightDiv()
    });
    function HeightDiv() {
        var vHeight = `${window.innerHeight}px`;
        document.getElementById('root').style.height = vHeight;
    }
    HeightDiv();
</script>