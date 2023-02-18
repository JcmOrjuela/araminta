Araminta
Araminta es un framework desarrollado con PHP puro basado en el patron de diseño MVC que tiene un sistema de rutas basado en una ruta relativa y la relación entre el controlador y el método a ejecutar. Además, cuenta con un sistema para renderizar vistas, las cuales se encuentran guardadas en la carpeta "public/views".

Requisitos
Para instalar el proyecto, es necesario contar con PHP 7 o superior. En el directorio "configs" se encuentra el archivo de configuraciones para las variables de entorno "enviroment.php", donde se deben ajustar las siguientes constantes:

"ROOT": la ruta raíz donde se localiza el proyecto.
"PROJECT_NAME": el nombre del proyecto.
Las constantes para la conexión a la base de datos.
También, en la carpeta "configs" se encuentra el archivo "migration.sql", el cual contiene las secuencias DDL y DML para crear la base de datos, las tablas y algunos registros faker.

Creación de nuevas rutas
Para crear una nueva ruta, se debe dirigir al archivo "routes/web.php" y declarar la ruta según el verbo HTTP que se desee implementar. El framework está limitado a los verbos GET, POST, DELETE y PUT.

Licencia
El framework "Araminta" es de código abierto y se encuentra bajo la licencia MIT. Esto significa que cualquier persona puede usar, copiar, modificar, fusionar, publicar, distribuir, sublicenciar y / o vender copias del software. Se proporciona tal como está, sin garantía de ningún tipo, expresa o implícita.