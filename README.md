🏢 SISTEMA DE GESTIÓN DE VENTAS – VENTAS MERCEDES

Plataforma web para la administración y control de operaciones comerciales

"PHP" (https://img.shields.io/badge/PHP-Desarrollo-777BB4?logo=php&logoColor=white)
"MySQL" (https://img.shields.io/badge/MySQL-Base%20de%20datos-4479A1?logo=mysql&logoColor=white)
"Bootstrap" (https://img.shields.io/badge/Bootstrap-Interfaz-7952B3?logo=bootstrap&logoColor=white)
"Architecture" (https://img.shields.io/badge/Arquitectura-MVC-success)
"Status" (https://img.shields.io/badge/Proyecto-Académico-blue)

---

📌 1. PRESENTACIÓN DEL PROYECTO

VENTAS MERCEDES es un sistema web orientado a la gestión y administración de las principales operaciones de una empresa comercial. Su propósito es facilitar el control de productos, categorías, compras, ventas, clientes, proveedores y usuarios mediante una plataforma centralizada.

El sistema permite organizar la información de las actividades comerciales, mejorar el acceso a los registros y facilitar las tareas administrativas desde una interfaz web.

El proyecto ha sido desarrollado utilizando el patrón arquitectónico Modelo – Vista – Controlador (MVC), que permite separar las responsabilidades del sistema y mantener una estructura organizada, modular y escalable.

🎯 2. OBJETIVOS DEL SISTEMA

Objetivo general

Desarrollar e implementar un sistema web de gestión de ventas que permita administrar de manera organizada los procesos comerciales, facilitando el registro, consulta y control de la información de una empresa.

Objetivos específicos

- Administrar los artículos y sus respectivas categorías.
- Registrar y gestionar las operaciones de compra.
- Mantener organizada la información de proveedores y clientes.
- Registrar y consultar las operaciones de venta.
- Facilitar el control de la información comercial.
- Administrar usuarios, módulos y permisos de acceso.
- Centralizar las operaciones en una sola plataforma.
- Proporcionar una interfaz sencilla y funcional para el usuario.

⚙️ 3. MÓDULOS Y FUNCIONALIDADES

📊 3.1. Panel principal

Permite visualizar el entorno principal del sistema y acceder a los diferentes módulos de gestión.

📦 3.2. Módulo de almacén

Permite administrar los recursos y productos registrados en el sistema.

- Artículos: registro, modificación, consulta y administración de productos.
- Categorías: organización y clasificación de los artículos.

🛒 3.3. Módulo de compras

Facilita la gestión de las operaciones de adquisición de productos.

- Registro de ingresos y compras.
- Administración de proveedores.
- Consulta de información relacionada con las compras.

💰 3.4. Módulo de ventas

Permite gestionar las operaciones comerciales realizadas con los clientes.

- Registro y administración de clientes.
- Registro de ventas.
- Gestión de la información de las operaciones comerciales.

📑 3.5. Módulo de consultas

Permite acceder a información de las operaciones registradas.

- Consulta de compras.
- Consulta de ventas.
- Revisión de registros comerciales.

🔐 3.6. Módulo de accesos y seguridad

Permite administrar el acceso de los usuarios a las funcionalidades del sistema.

- Gestión de usuarios.
- Administración de permisos.
- Administración de módulos.
- Control de accesos.

ℹ️ 3.7. Módulo de información

Incluye las secciones de ayuda y acerca del sistema para facilitar su utilización.

🏗️ 4. ARQUITECTURA DEL SISTEMA

El proyecto utiliza el patrón MVC (Modelo – Vista – Controlador), una arquitectura que separa la aplicación en tres componentes principales:

Componente| Responsabilidad
Modelo| Gestiona los datos y las operaciones con la base de datos.
Vista| Presenta las interfaces con las que interactúa el usuario.
Controlador| Coordina las solicitudes y comunica los modelos con las vistas.

Esta organización permite mantener el código estructurado, facilitar su mantenimiento y mejorar la comprensión de cada módulo.

💻 5. TECNOLOGÍAS UTILIZADAS

Tecnología| Aplicación dentro del proyecto
PHP| Desarrollo de la lógica del sistema.
MySQL| Gestión de la información mediante base de datos.
JavaScript| Funcionalidades e interactividad.
jQuery| Manipulación de elementos de la interfaz.
AJAX| Comunicación asíncrona entre el navegador y el servidor.
Bootstrap| Diseño adaptable de las interfaces.
AdminLTE| Estructura visual del panel administrativo.
DataTables| Organización y visualización de registros.
Font Awesome| Iconografía de la interfaz.

📁 6. ESTRUCTURA DEL PROYECTO

La organización principal de los archivos es la siguiente:

VENTAS-MERCEDES/
│
├── ajax/
│   ├── acceso.php
│   ├── articulo.php
│   ├── categoria.php
│   ├── cliente.php
│   ├── compra.php
│   ├── modulos.php
│   ├── permiso.php
│   ├── proveedor.php
│   ├── usuario.php
│   └── venta.php
│
├── config/
│   ├── Conexion.php
│   ├── global.php
│   └── probar.php
│
├── modelos/
│   ├── acceso.php
│   ├── articulo.php
│   ├── categoria.php
│   ├── cliente.php
│   ├── compra.php
│   ├── consulta.php
│   ├── modulo.php
│   ├── permiso.php
│   ├── proveedor.php
│   ├── usuario.php
│   └── venta.php
│
├── public/
│   ├── bootstrap/
│   ├── css/
│   ├── datatables/
│   ├── dist/
│   └── plugins/
│
├── vistas/
│   ├── acceso/
│   ├── categoria/
│   ├── compras/
│   ├── consultas/
│   ├── ventas/
│   ├── scripts/
│   ├── dashboard.php
│   ├── header.php
│   ├── footer.php
│   ├── login.php
│   ├── listado.php
│   ├── ayuda.php
│   └── acercade.php
│
└── README.md

🚀 7. REQUISITOS PARA LA INSTALACIÓN

Para ejecutar el sistema en un entorno local se requiere:

- Sistema operativo Windows o compatible.
- Servidor local XAMPP.
- Servidor web Apache.
- PHP.
- MySQL o MariaDB.
- Navegador web actualizado.

🛠️ 8. INSTALACIÓN Y CONFIGURACIÓN

1. Instalar XAMPP en el equipo.
2. Iniciar los servicios Apache y MySQL.
3. Descargar o clonar este repositorio.
4. Copiar la carpeta del proyecto dentro del directorio "htdocs".
5. Crear la base de datos correspondiente en phpMyAdmin.
6. Importar el respaldo SQL de la base de datos, si se encuentra disponible.
7. Revisar los parámetros de conexión en "config/Conexion.php" y la configuración general en "config/global.php".
8. Abrir el navegador y acceder a la dirección local correspondiente al proyecto.

Importante: el archivo ZIP del proyecto revisado no incluye un respaldo SQL. Para instalar el sistema en otro equipo será necesario contar también con la base de datos y configurar correctamente su conexión.

🔒 9. SEGURIDAD Y ADMINISTRACIÓN

El sistema cuenta con un módulo de administración de usuarios, módulos y permisos para organizar el acceso a las funcionalidades disponibles.

La configuración de las credenciales y permisos debe realizarse de acuerdo con el entorno donde se implemente el proyecto.

📈 10. BENEFICIOS DEL SISTEMA

- Centralización de la información comercial.
- Organización de productos y categorías.
- Administración de compras y ventas.
- Gestión de clientes y proveedores.
- Acceso organizado a los registros.
- Separación de responsabilidades mediante MVC.
- Facilidad para realizar futuras mejoras y ampliaciones.

🔮 11. POSIBLES MEJORAS FUTURAS

Como parte de la evolución del proyecto, se pueden considerar las siguientes mejoras:

- Implementación de reportes estadísticos.
- Generación de comprobantes en PDF.
- Incorporación de gráficos de ventas.
- Alertas de productos con bajo stock.
- Copias de seguridad automáticas.
- Mejoras adicionales en la seguridad.
- Adaptación de la interfaz para dispositivos móviles.

👩‍💻 12. INFORMACIÓN DEL PROYECTO

Nombre: Sistema de Gestión de Ventas – VENTAS MERCEDES
Tipo: Aplicación web de gestión comercial.
Arquitectura: Modelo – Vista – Controlador (MVC).
Lenguaje principal: PHP.
Base de datos: MySQL.
Repositorio: VENTAS-MERCEDES.

---

📌 VENTAS MERCEDES

Tecnología, organización y control para una mejor gestión comercial.
