SISTEMA DE GESTIÓN DE VENTAS – VENTAS MERCEDES

Aplicación web para la administración y control de operaciones comerciales

---

1. Descripción del proyecto

El Sistema de Gestión de Ventas – VENTAS MERCEDES es una aplicación web desarrollada para facilitar la administración de las operaciones comerciales de una empresa. Su finalidad es centralizar la información y proporcionar herramientas para gestionar productos, categorías, compras, ventas, clientes, proveedores y usuarios.

El sistema permite organizar los procesos administrativos mediante una plataforma web que facilita el registro, consulta y gestión de información.

Para su desarrollo se utiliza la arquitectura Modelo–Vista–Controlador (MVC), que permite separar la lógica del negocio, la presentación de información y el procesamiento de solicitudes.

2. Objetivos

Objetivo general

Desarrollar un sistema web que permita administrar y controlar las principales operaciones comerciales de una empresa, optimizando la organización de la información y facilitando las actividades administrativas.

Objetivos específicos

- Gestionar los artículos y las categorías de productos.
- Registrar y administrar las operaciones de compra.
- Gestionar la información de clientes y proveedores.
- Registrar y consultar las operaciones de venta.
- Organizar la información comercial en una plataforma centralizada.
- Administrar los usuarios y sus respectivos permisos.
- Facilitar el acceso a los diferentes módulos del sistema.

3. Módulos del sistema

3.1. Panel principal

Proporciona el acceso general a las diferentes funcionalidades y módulos de la aplicación.

3.2. Almacén

Permite administrar los productos y organizar su clasificación.

- Artículos: administración de los productos registrados.
- Categorías: clasificación y organización de los artículos.

3.3. Compras

Permite gestionar las operaciones de adquisición de productos y la información relacionada con los proveedores.

3.4. Ventas

Permite administrar las operaciones comerciales realizadas con los clientes y registrar la información correspondiente a las ventas.

3.5. Consultas

Facilita la revisión de los registros y la información relacionada con las operaciones de compras y ventas.

3.6. Administración y seguridad

Incluye funcionalidades para gestionar los usuarios, módulos y permisos de acceso al sistema.

3.7. Ayuda y acerca de

Contiene información complementaria para orientar al usuario sobre el sistema.

4. Arquitectura del sistema

El proyecto utiliza el patrón arquitectónico Modelo–Vista–Controlador (MVC), que organiza la aplicación en tres componentes principales:

Componente| Descripción
Modelo| Gestiona los datos y las operaciones relacionadas con la base de datos.
Vista| Presenta las interfaces y los elementos visuales del sistema.
Controlador| Procesa las solicitudes y coordina la comunicación entre modelos y vistas.

Esta arquitectura permite mantener una estructura organizada, facilita el mantenimiento del código y permite realizar futuras ampliaciones.

5. Tecnologías utilizadas

Tecnología| Descripción
PHP| Lenguaje utilizado para desarrollar la lógica del servidor.
MySQL| Sistema de gestión de base de datos.
JavaScript| Implementación de funcionalidades interactivas.
jQuery| Manipulación de elementos de la interfaz.
AJAX| Comunicación asíncrona entre el cliente y el servidor.
Bootstrap| Desarrollo de interfaces web adaptables.
AdminLTE| Estructura visual del panel administrativo.
DataTables| Organización y presentación de registros.
Font Awesome| Recursos gráficos e iconografía.

6. Estructura del proyecto

El proyecto se encuentra organizado en diferentes directorios, de acuerdo con las responsabilidades de cada componente.

VENTAS-MERCEDES/
│
├── ajax/
│   └── Procesamiento de solicitudes
│
├── config/
│   └── Configuración y conexión
│
├── modelos/
│   └── Lógica y operaciones de datos
│
├── vistas/
│   └── Interfaces y módulos
│
├── public/
│   └── Recursos estáticos
│
├── acceso.php
├── articulo.php
├── categoria.php
├── cliente.php
├── compra.php
├── proveedor.php
├── usuario.php
├── venta.php
│
└── README.md

7. Requisitos del sistema

Para ejecutar la aplicación en un entorno local se requiere:

- Sistema operativo Windows o compatible.
- XAMPP.
- Servidor web Apache.
- PHP.
- MySQL o MariaDB.
- Navegador web actualizado.

8. Instalación y configuración

1. Instalar XAMPP en el equipo.
2. Iniciar los servicios Apache y MySQL.
3. Descargar el proyecto desde este repositorio.
4. Extraer la carpeta del proyecto dentro del directorio "htdocs".
5. Acceder a phpMyAdmin y crear la base de datos correspondiente.
6. Importar el respaldo SQL de la base de datos, si se encuentra disponible.
7. Revisar los parámetros de conexión en los archivos de configuración ubicados en "config/".
8. Abrir el navegador y acceder a la dirección local correspondiente al proyecto.

Nota: Para ejecutar el sistema correctamente es necesario contar con la base de datos correspondiente. El archivo ZIP compartido no incluye un respaldo SQL, por lo que este debe obtenerse por separado.

9. Beneficios del sistema

- Centralización de la información comercial.
- Organización de los registros de productos.
- Administración de compras y ventas.
- Gestión de clientes y proveedores.
- Control de usuarios y permisos.
- Separación de responsabilidades mediante arquitectura MVC.
- Facilidad de mantenimiento y ampliación.

10. Mejoras futuras

Entre las posibles mejoras que pueden incorporarse al sistema se encuentran:

- Generación de reportes estadísticos.
- Implementación de comprobantes de venta en PDF.
- Incorporación de gráficos de rendimiento comercial.
- Alertas de productos con bajo inventario.
- Implementación de copias de seguridad.
- Optimización de la seguridad y validación de datos.
- Adaptación de la interfaz a dispositivos móviles.

11. Información del proyecto

Campo| Información
Nombre del proyecto| Sistema de Gestión de Ventas – VENTAS MERCEDES
Tipo de aplicación| Aplicación web
Arquitectura| Modelo–Vista–Controlador (MVC)
Lenguaje principal| PHP
Base de datos| MySQL
Entorno de desarrollo local| XAMPP

---

VENTAS MERCEDES

Sistema web orientado a la organización, administración y control de las operaciones comerciales.
