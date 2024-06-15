<!DOCTYPE html>
<html>
<head>
    <title>Obtener Volumen de Búsqueda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">     <!-- cdn para traer bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!--  idem para jquery -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
        }
        #result {
            margin-top: 20px;
        }
        .result-box {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2 class="text-center">Obtener volumen de búsqueda de una palabra clave</h2>
        <form id="keywordForm" class="form-inline justify-content-center">
            @csrf
            <div class="form-group mb-2">
                <label for="keyword" class="sr-only">Palabra clave a buscar:</label>
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ingrese palabra clave">
            </div>
            <button type="submit" class="btn btn-success mb-2 ml-2">Buscar</button>
            <button type="button" id="clearButton" class="btn btn-danger mb-2 ml-2">Limpiar</button>
        </form>
        <div id="result" class="result-box"></div>
    </div>

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
                    $('#result').html('<p>Hay: <strong>' + response.volume + '</strong> búsquedas de la palabra "<strong>' + keyword + '</strong>" en Google.</p>');
                },
                error: function(xhr) {
                    $('#result').html('<p class="text-danger">Error: ' + xhr.responseJSON.error + '</p>');
                }
            });
        });

        $('#clearButton').click(function() {
            $('#keyword').val('');
            $('#result').html('');
        });
    </script>
</body>
</html>
