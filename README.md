# La Nacion - Bonvivir

## Indice

- [La Nacion - Bonvivir](#la-nacion---bonvivir)
  - [Indice](#indice)
    - [Setup con Docker](#setup-con-docker)
    - [Setup sin Docker](#setup-sin-docker)

### Setup con Docker

> Debe estar corriendo Docker antes de iniciar el Setup

> En Windows puede ejecutar el archivo [`bonvivir/src/run-app.bat`](./src/run-app.bat) y pasar al paso 3

1. Posicionarse sobre la carpeta [`bonvivir/src`](./src)
2. Ejecutar `./run-app.sh`
3. Elegir Ambiente que desea levantar (dev/test/prod)
4. En caso de que no tenga el archivo de ambiente creado, el asistente le preguntara si desea crearlo; escriba `yes` y presione `enter`
5. A continuacion le preguntara el valor que desea asignar a las variables de ambiente. Si alguna de las variables tiene un valor por defecto, este aparecera entre parentesis y sera seleccionable dejando el texto vacio y presionando `enter`
6. En caso de que alguna variable sea requerida y no tenga valor por defecto se le volvera a preguntar que valor desea asignar resaltando que la variable es requerida
7. Para poder generar la actualización de la base de datos tenemos que crear la table EFHistory con la siguiente query
   `CREATE TABLE __EFMigrationsHistory ( MigrationId nvarchar(150) NOT NULL, ProductVersion nvarchar(32) NOT NULL, PRIMARY KEY (MigrationId) );`
8. Exportamos el connection string, pero con nuestro local host como db.
9. Actualizamos la base de datos con `dotnet ef database update`

### Setup sin Docker

1. Instalar Visual Studio Community 2017.
2. Actualizar Visual Studio Community 2017 (v15.9.5) en caso de tenerlo instalado, algunas versiones pueden no servir.
3. Instalar VSCode `https://code.visualstudio.com/`
4. Instalar Git `https://git-scm.com/`
5. Instalar Node (mínimo v10) `https://nodejs.org/en/download/`
6. Instalar Yarn `https://yarnpkg.com/lang/en/` (si tienen npm/node pueden hacer `npm install -g yarn` en su lugar)
7. Actualizar Net Core SDK a su versión 2.2.
8. Instalar WorkBench by MySQL.
9. Pararse en la carpeta de Bonvivir.WebApi o en el combo de target del PCM seleccionar Bonvivir.WebApi y `nuget restore` o si estás usando VS Code `dotnet restore`
10. Correr Update database en PCM: `Update-Database` o si estás usando VS Code: `dotnet ef database update`, habiendo generado la tabla del paso 7 (Setup con Docker)
