<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Sugerida - Google</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            margin: 20px;
             font-family: "Poppins", sans-serif;
        }
        .container {
            max-width: 600px;
        }
        .container h2{
            padding:50px;
            font-weight: 800;
             font-style: normal;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            background-color: #eeeee4;
        }
        .lista-sugrencias {
            list-style-type: none;
            padding: 0;
            margin: 0;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: absolute;
            width: calc(100% - 20px);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none; /*  inicialmente oculto */
        }
        .lista-sugrencias li {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .lista-sugrencias li:hover {
            background-color: #f0f0f0;
        }
        .form-group {
            position: relative;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Volumen de búsqueda de una palabra en Google. </h2>
        <form id="keywordForm" class="form-inline justify-content-center">
            <div class="form-group mb-2">
                <label for="palabra" class="sr-only">Palabra clave a buscar:</label>
                <input type="text" class="form-control" id="palabra" name="palabra" placeholder="Ingrese palabra clave">
                <ul class="lista-sugrencias" id="listaSugerencias"></ul>
            </div>
            <button type="submit" class="btn btn-success mb-2 ml-2">Buscar</button>
            <button type="button" id="limpiarPalabra" class="btn btn-danger mb-2 ml-2">Limpiar</button>
        </form>
        <div id="result"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Manejar entrada en el campo de búsqueda
            $('#palabra').on('input', function() {
                var palabra = $(this).val().trim();
                if (palabra === '') {
                    $('#listaSugerencias').hide(); //  Oculta la lista de sugerencias si el campo está vacío
                    return;
                }

                $.ajax({
                    url: "https://suggestqueries.google.com/complete/search",
                    type: 'GET',
                    dataType: 'jsonp',
                    data: {
                        client: 'firefox',
                        q: palabra
                    },
                    success: function(response) {
                        var suggestions = response[1];

                        var html = '';
                        suggestions.forEach(function(suggestion) {
                            html += '<li>' + suggestion + '</li>';
                        });

                        $('#listaSugerencias').html(html).show(); //  Muestra la lista de sugerencias
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ', error);
                    }
                });
            });

            $('#listaSugerencias').on('click', 'li', function() {
                var selectedKeyword = $(this).text();
                $('#palabra').val(selectedKeyword);
                $('#listaSugerencias').hide(); //  Oculta la lista de sugerencias después de seleccionar una opción
            });

            
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#listaSugerencias').length && !$(e.target).is('#palabra')) {
                    $('#listaSugerencias').hide(); // Ocultar el cuadro de sugerencias
                }
            });

            //  Manejar clic en el botón de limpiar
            $('#limpiarPalabra').on('click', function() {
                $('#palabra').val(''); // Limpiar el campo de búsqueda
                $('#result').empty().hide(); // Limpiar y ocultar el resultado
                $('#listaSugerencias').hide(); // Ocultar la lista de sugerencias
            });

            //  Manejar envío del formulario
            $('#keywordForm').submit(function(event) {
                event.preventDefault();
                var palabra = $('#palabra').val().trim();
                if (palabra === '') {
                    alert('Por favor ingrese una palabra clave.');
                    return;
                }

                $.ajax({
                    url: "https://www.googleapis.com/customsearch/v1",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        key: 'AIzaSyBJv9TW_gPGabwybg6ampfqlUBiS0VOJSI',
                        cx: 'f7715df71e5bf4246',
                        q: palabra
                    },
                    success: function(response) {
                        var totalResults = response.searchInformation.totalResults;
                        var message = 'El volumen de búsquedas en Google, para la palabra "<strong>' + palabra + '</strong>", es de: <strong>' + totalResults + '</strong>';
                        $('#result').html('<p>' + message + '</p>').css('background-color', '#edf2f0').show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ', error);
                    }
                });
            });
        });
    </script>
</body>
</html>
