# Ejemplo de modelado de BD

Ejemplo de un ORM que demuestra una abstracción de conexión con base de datos 
donde se realizan algunas operaciones conexión, selección, consulta y carga de 
datos de prueba.
Además, se crearon pruebas unitarias que buscaban probar el funcionamiento requerido.

## Instalación
1. Clonar repositorio via https.
```bash
https://github.com/tblancog/modelado-db.git
```
2. Entrar al directorio recién creado e instalar dependencias
```bash
cd modelado-db
composer install
```
3. Crear base de MySql con el nombre 'Moodle', las credenciales deben coincidir con las definidas en el archivo src/ORMModel.php (línea 6).
4. Correr el script sql setup.sql para crear la tabla 'users'
5. Ejecutar pruebas de PHPUnit
```bash
./phpunit tests/ORMTest.php
```
Cada una de las pruebas diseñadas contempla las funcionalidades requeridas.

Importante: 
* Es necesario tener las extensiones PHP necesarias para que funcionen las pruebas unitarias.
* Es un comportamiento esperado que la segunda vez que se corran las pruebas unitarias falle la prueba: ORMTest::testPopulateUsers.


