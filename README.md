# Volumen de Búsqueda de Palabras en Google

Este proyecto es una aplicación web para obtener el volumen de búsquedas de una palabra clave en Google utilizando la API de búsqueda personalizada de Google.
El procesamiento de la solicitud y la obtención de datos de la API se realiza en un script de Python, mientras que la interfaz de usuario y la ejecución del script son manejadas por Laravel y jQuery.

## Descripción

El sistema permite a los usuarios ingresar una palabra clave y obtener el número de resultados de búsqueda relacionados con esa palabra en Google. Incluye sugerencias automáticas de búsqueda a medida que el usuario escribe utilizando Jquery.

## Componentes

### Frontend

-   **Formulario de Búsqueda**: Permite al usuario ingresar una palabra clave.
-   **Sugerencias de Búsqueda**: Utiliza la API de sugerencias de Google para mostrar sugerencias en tiempo real.
-   **Resultados**: Muestra el volumen de búsquedas para la palabra clave ingresada.

### Backend (Laravel)

-   **Rutas**:
    -   `/`: Endpoint para obtener el volumen de búsqueda, que se encuentra en la vista principal.
-   **Controlador**: `KeywordVolumeController` maneja las solicitudes desde el frontend.
    -   `index()`: Devuelve la vista principal.
    -   `obtenerVolumen()`: Recibe la palabra clave, ejecuta el script de Python y retorna el volumen de búsqueda en formato JSON.

### Script de Python

-   **`get_volume.py`**: Script que utiliza la API de búsqueda personalizada de Google para obtener el número total de resultados de búsqueda para una palabra clave dada.

## Instalación

### Requisitos Previos

-   PHP
-   Composer
-   Python
-   Laravel

### Pasos de Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/endermendoza24/volumen-busqueda-palabras.git
    ```

2. Navega al directorio del proyecto:

    ```bash
    cd repositorio-recien-descargado
    ```

3. Instala las dependencias de PHP:

    ````bash
    composer install

    Actualiza las siguientes variables en el archivo `.env`:
    ```env
    GOOGLE_CUSTOM_SEARCH_API_KEY=TU_API_KEY
    GOOGLE_CUSTOM_SEARCH_ENGINE_ID=TU_SEARCH_ENGINE_ID

    ````

4. Configura tu base de datos en el archivo `.env` y luego ejecuta las migraciones:

    ```bash
    php artisan migrate
    ```

5. Ejecuta el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

6. Navega a `http://localhost:8000` en tu navegador.

## Uso

1. Ingresa una palabra clave en el campo de búsqueda.
2. Selecciona una sugerencia de la lista (opcional).
3. Haz clic en el botón "Buscar".
4. El sistema mostrará el volumen de búsquedas para la palabra clave ingresada.
