# Genshin Guide API (Backend)

## Descripción del Proyecto

El backend de Genshin Guide es una API construida con Laravel 11 para gestionar la información de Genshin Impact. Proporciona datos estructurados sobre personajes, artefactos y equipos, permitiendo integraciones fáciles con el frontend y la aplicación móvil.

## Tecnologías Utilizadas

- **Laravel 11**: Framework PHP para gestionar la lógica del servidor y la API.
- **Filament 3.2**: Para crear un panel de administración intuitivo.
- **MySQL**: Base de datos para almacenar información estructurada.
- **WSL (Linux)**: Entorno de desarrollo para Laravel.
- **XAMPP**: Para gestionar Apache y MySQL en Windows.
- **Docker**: Usado para contenerizar servicios durante el desarrollo o despliegue.

## Funcionalidades Principales

### API REST

1. **Personajes**: Endpoints para consultar información detallada de personajes, incluyendo roles y habilidades.
2. **Artefactos**: Proporciona información sobre sets de artefactos y sus bonos.
3. **Equipos**: Gestiona configuraciones de equipos y sus sinergias.

### Base de Datos

- **Migraciones**: Tablas bien estructuradas para personajes, artefactos y equipos.
- **Seeders**: Scripts automatizados para poblar la base de datos con datos iniciales desde archivos JSON.

### Tests

- **PHPUnit**: Se incluyen pruebas unitarias y de integración para garantizar la estabilidad de la API.
- **Cobertura de Tests**: Validación de la lógica de personajes, artefactos y equipos.

**Nota**: Los tests pueden fallar en la primera ejecución. Para asegurarse de que todo está correcto, ejecute uno por uno los tests fallidos para identificar posibles problemas:

```bash
php artisan test --filter NombreDelTestFallido
```

Para ejecutar todos los tests:

```bash
php artisan test
```

## Estructura del Proyecto

### Directorios Principales

- **`/app/Http/Controllers`**: Controladores de la API que gestionan las solicitudes y respuestas.
- **`/database/migrations`**: Migraciones de base de datos.
- **`/database/seeders`**: Seeders para datos iniciales.
- **`/routes/api.php`**: Definición de las rutas de la API.
- **`/tests`**: Directorio que contiene las pruebas unitarias y de integración.
- **`/storage/app/public`** :  Carpeta donde debe colocarse el contenido de la carpeta `datos.example`.

## Configuración e Instalación

### Requisitos Previos

- **PHP >= 8.2**
- **Composer**
- **MySQL**
- **Node.js** (para construir recursos estáticos)
- **Docker** (opcional para desarrollo containerizado).

### Pasos

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/Miriam1201/API-Genshin.git
   ```
2. Instalar dependencias:
   ```bash
   composer install
   npm install
   ```
3. Construir recursos estáticos:
   ```bash
   npm run build
   ```
4. Configurar variables de entorno:
   Copiar el archivo `.env.example` a `.env` y ajustar los valores necesarios.
5. Copiar los datos example al storage:
   ```bash
    cp -r datos.example/* storage/app/public/
   ```
6. Migrar la base de datos:
   ```bash
   php artisan migrate --seed
   ```
7. Colocar la carpeta `datos.example` en `storage/app/public` y crear el enlace simbólico al almacenamiento:
   ```bash
   php artisan storage:link
   ```
8. Iniciar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Contribución

Se agradecen contribuciones al proyecto. Para comenzar:

1. Realizar un fork del repositorio.
2. Crear una rama para tu función o corrección:
   ```bash
   git checkout -b feature/nueva-funcion
   ```
3. Enviar un pull request.

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](LICENSE).

---

Gestiona y explora los datos del mundo de Genshin Impact con la API de Genshin Guide.

