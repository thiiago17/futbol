# WEB DE FUTBOL

-Los archivos de configuracion son ejemplos genericos, en caso de querer utilizar seriamente la web hay que modificar datos como base_url, encryption_key, la conexion a la base de datos, etc.

-El archivo SQL contiene las tablas basicas para el funcionamiento de la web.

-Se puede ver la pagina sin iniciar sesion pero para usar algunas funciones hay que iniciar. Hay 2 usuarios creados, admin y usuario, y ademas en ingresar se puede crear un usuario.

-El admin va a tener acceso a la seccion "resultados" en el perfil. Ahi puede agregar resultados de partidos y borrarlos. Esto va a repercutir en la tabla de primera division ubicada en la seccion "tablas" del navbar y se va a actualizar automaticamente. Y por otro lado en la seccion "resultados" del navbar tambien se van a listar todos los resultados. Los resultados que agregue el admin van a ser visibles para todos los usuarios.

-Otras opciones disponibles en el perfil para todos los usuarios son cambiar contraseña y equipo favorito. En equipo favorito se puede seleccionar un equipo, lo cual hace que en la seccion del navbar "tu equipo" se muestren unicamente los resultados del equipo seleccionado. En caso de entrar a "tu equipo" sin tener un equipo seleccionado se va a indicar en pantalla, y si el equipo no tiene partidos jugados, tambien lo va a indicar.
