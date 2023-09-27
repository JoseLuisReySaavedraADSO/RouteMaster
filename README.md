# Aplicación web de Gestión de Rutas

Este repositorio contiene la documentación para la aplicación web de gestión de rutas, desarrollada como parte del Reto Senasoft.

## Introducción

La aplicación web tiene como objetivo facilitar la obtención de rutas óptimas, mejorando el proceso de encontrar la ruta más eficiente. Proporciona diversas funcionalidades, que incluyen inicio de sesión, registro de usuarios, validación de ubicaciones, creación y visualización de rutas, conexión de puntos y cálculo de la ruta más eficiente. La aplicación se enfoca en mejorar la selección de rutas considerando varios factores, como el costo de conexión entre ubicaciones.

## Requerimientos Funcionales

### Carga de Datos

- La aplicación permite la carga de datos de prueba desde un archivo JSON.
- Los datos cargados incluyen información sobre ubicaciones geográficas.
- Se especifican las conexiones entre ubicaciones y el punto de origen de la ruta.

### Creación de Rutas

- Los usuarios pueden crear puntos especificando coordenadas (X, Y).
- La aplicación permite la conexión bidireccional entre puntos con la especificación de un peso o costo asociado.
- Los usuarios pueden seleccionar un punto de origen para iniciar la ruta.
- La aplicación calcula la ruta más eficiente teniendo en cuenta los costos de conexión y los demás puntos de entrega.

### Almacenamiento de Datos

- La aplicación guarda todas las ubicaciones y rutas en una base de datos para futuras modificaciones.
- Proporciona la capacidad de modificar y eliminar ubicaciones almacenadas.

## Requerimientos No Funcionales

### Usabilidad

- La interfaz de usuario se diseñó para ser intuitiva y fácil de usar.
- Los usuarios pueden cargar datos y crear rutas sin dificultad.
- Los usuarios deberan verificar su correo para poder continuar a usar la web.

### Rendimiento

- La aplicación ofrece una respuesta rápida en el cálculo de rutas y otras operaciones.

## Funcionalidad

- La aplicación cuenta con 3 rutas a las que se podra acceder para leer los archivos json:
http://routemaster.test/prueba | esta ruta nos va a servir para que la web lea el primer archivo propuesto en el reto.
http://routemaster.test/basico | esta ruta nos va a servir para que la web lea el archivo "basico.json" propuesto en el reto.
http://routemaster.test/medio  | esta ruta nos va a servir para que la web lea el archivo "medio.json" propuesto en el reto.

