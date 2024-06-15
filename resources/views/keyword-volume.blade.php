<!DOCTYPE html>
<html>
<head>
    <title>Obtener Volumen de Búsqueda</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Obtener Volumen de Búsqueda</h2>
    <form id="keywordForm">
        @csrf <!-- Agregar token CSRF -->
        <label for="keyword">Palabra Clave:</label><br>
        <input type="text" id="keyword" name="keyword"><br><br>
        <button type="submit">Obtener Volumen</button>
    </form>
    <div id="result"></div>

    <script>
        $('#keywordForm').submit(function(event) {
            event.preventDefault();
            var keyword = $('#keyword').val();
            $.ajax({
                url: "{{ route('get-volume') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { keyword: keyword },
                success: function(response) {
                    $('#result').html('Volumen de Búsqueda: ' + response.volume);
                },
                error: function(xhr) {
                    $('#result').html('Error: ' + xhr.responseJSON.error);
                }
            });
        });
    </script>
</body>
</html>
