# Catering
1. Descargar archivo
2. Copiar la carpeta catering en www de tu wampp o en htdocs en XAMPP
3. Ir a la carpeta catering->aplication->config->config.php
- 3.1 Cambiar puerto 8080 por el que usas en: $config['base_url'] = 'http://localhost:8080/catering/';
4. Ir a la carpeta catering->aplication->config->database.php
- 4.1 Buscar:
```
      $db['default'] = array(
        'dsn'	=> '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'alquiler',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
      );
 ```
 - Cambiar username y password despues de la flecha por el username y password que usas en tu wampp o xampp. Asignar el nombre de la BD en el apartado de database.
 5. Ir a la carpeta catering->bd
 - 5.1 Exportar alquiler.sql a tu base de datos.
 6. Ingresar en el navegador : http://localhost:puerto puesto por ti segun el que usas/catering/
 
 7. Visualiza la pagina
 
 CONTENIDO
 ```
 carpeta catering->aplication->controllers->Principal.php (llamadas de las vistas, implementacion de logeo etc)
                                         ->models->Bases.php (queries a la BD)
                                         ->views-> (Contenido de las vistas)
 
 carpeta catering->bd->creencias.sql (copia respaldo BD)
 carpeta catering->css->style.css (hoja de estilo de la pagina)
 carpeta catering->img (carpeta donde se alojan las imagenes)
 
  carpeta views:
    categorias.php (muestra la tabla CRUD de categorias)
    detalle_servicio.php (primera vista para formulario para añadir servicios o productos)
    edita_detalle_servicio.php(editar un producto agregado al servicio)
    encabezadoPrincipal.php (barra de navegación)
    footer.php (footer de la pagina)
    header.php (header de la pagina)
    ingresa_servicio.php (vista para agregar "registrar" un servicio)
    principal.php (vista de la pagina principal)
    productos.php (vista donde muestra la tabla CRUD de productos)
    servicios.php (formulario para agregar "registrar" un servicio)
    staff.php (vista donde muestra la tabla CRUD del staff)
    usuarios.php (vista donde muestra la tabla CRUD de los usuarios)
```
    NOTA**: PUEDES IR AÑADIENDO MAS VISTAS Y PARA VERLAS TE TIENES QUE MOVER ENTRE CONTROLLERS, MODELS Y VIEWS 

Grocery CRUD
=============
Grocery CRUD is a PHP and Codeigniter Framework library that creates a full functional CRUD system without the need to customise JavaScript or CSS.

For more information, visit http://www.grocerycrud.com