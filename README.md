# 🌟 Volumen de Búsqueda de Palabras en Google 🌟

Este proyecto es una aplicación web que permite al usuario ingresar una palabra clave y obtener el volumen de búsquedas de dicha palabra, utilizando la API de búsqueda de Google. El procesamiento de la solicitud y la obtención de datos de la API se realiza en un script de Python, mientras que la interfaz de usuario y la ejecución del script son manejadas por Laravel y jQuery.

## 📋 Descripción

El sistema permite a los usuarios ingresar una palabra clave y obtener el número de resultados de búsqueda relacionados con esa palabra en Google. Incluye sugerencias automáticas de búsqueda a medida que el usuario escribe. 🖊️🔍

## 🧩 Componentes

### 🌐 Frontend

-   **Formulario de Búsqueda**: Aquí puedes ingresar tu palabra clave.
-   **Sugerencias de Búsqueda**: Utiliza la API de Google para mostrar sugerencias en tiempo real.
-   **Resultados**: Muestra el volumen de búsquedas para la palabra clave ingresada.

### 🔧 Backend (Laravel)

-   **Rutas**:
    -   `/obtener-volumen`: Endpoint para obtener el volumen de búsqueda.
-   **Controlador**: `KeywordVolumeController` maneja las solicitudes desde el frontend.
    -   `index()`: Devuelve la vista principal.
    -   `obtenerVolumen()`: Recibe la palabra clave, ejecuta el script de Python y retorna el volumen de búsqueda en formato JSON.

### 🐍 Script de Python

-   **`get_volume.py`**: Este script utiliza la API de búsqueda personalizada de Google para obtener el número total de resultados de búsqueda para una palabra clave dada.

## 🚀 Instalación

### 📌 Requisitos Previos

-   Xampp
-   PHP (Al instalar Xampp se instala PHP)
-   Composer
-   Python
-   Laravel

### 🛠️ Pasos de Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/endermendoza24/volumen-busqueda-palabras.git
    ```

2. Navega al directorio del proyecto:

    ```bash
    cd carpeta-donde-lo-clonó/
    ```

3. Verifica que PHP esté instalado:

    ```bash
    php -v
    ```

4. Verifica que Composer esté instalado:

    ```bash
    composer -v
    ```

5. Instala las dependencias de Composer:

    ```bash
    composer install
    ```

6. Ejecuta el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

7. Navega a la dirección proporcionada por el servidor en tu navegador:
    ```plaintext
    http://127.0.0.1:8000/
    ```

## 📖 Uso

1. Ingresa una palabra clave en el campo de búsqueda.
2. Selecciona una sugerencia de la lista (opcional).
3. Haz clic en el botón "Buscar".
4. El sistema mostrará el volumen de búsquedas para la palabra clave ingresada.
5. Limpia el campo de búsqueda y los resultados con el botón "Limpiar" (opcional).

---

## Proyecto de Búsqueda de Palabras Clave

### Interfaz de Usuario (Frontend)

-   [x] Crear una página web utilizando Blade templates de Laravel.
-   [x] Incluir un formulario donde el usuario pueda ingresar una palabra clave.
-   [x] Utilizar jQuery para manejar el envío del formulario y mostrar los resultados de manera dinámica.

### Backend

-   [x] Configurar Laravel para recibir la solicitud del formulario.
-   [x] Crear un controlador en Laravel que maneje la lógica del backend.
-   [x] Implementar un endpoint que llame a un script de Python para procesar la solicitud.

### Script en Python

-   [x] Escribir un script en Python que utilice la API de Google para obtener el volumen de búsqueda de la palabra clave proporcionada.
-   [x] El script debe recibir la palabra clave como argumento, realizar la solicitud a la API de Google y devolver el resultado en formato JSON.

### Integración

-   [x] Configurar Laravel para ejecutar el script de Python y recibir el resultado.
-   [x] Mostrar el resultado en la página web utilizando jQuery para actualizar la interfaz de usuario de manera dinámica.

**Elaborado por Endersson Alonso Mendoza Muñoz**
**15 de junio de 2024**
