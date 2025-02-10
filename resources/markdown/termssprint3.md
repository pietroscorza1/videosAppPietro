## Resum del Treball Realitzat

### Correcció d'Errors
- S'han corregit els errors detectats en el segon sprint.

### Instal·lació de Paquets
- S'ha instal·lat el paquet `spatie/laravel-permission` seguint la [documentació oficial](https://spatie.be/docs/laravel-permission/v6/installation-laravel).

### Modificacions a la Base de Dades
- S'ha creat una migració per afegir el camp `super_admin` a la taula d'usuaris.

### Modificacions en el Model d'Usuaris
- S'han afegit les funcions `testedBy()` i `isSuperAdmin()`.

### Creació i Modificació de Funcions
- S'ha actualitzat la funció `create_default_professor` en `helpers` per incloure l'assignació de superadmin al professor.
- S'ha creat la funció `add_personal_team()` per separar la lògica de creació d'equips d'usuaris.
- S'han implementat les següents funcions:
    - `create_regular_user()`
    - `create_video_manager_user()`
    - `create_superadmin_user()`
    - `define_gates()`
    - `create_permissions()`

### Configuració de Permisos i Polítiques
- A `app/Providers/AppServiceProvider`, s'han registrat les polítiques d'autorització i definit les portes d'accés.
- S'han assignat els permisos i els usuaris per defecte (`superadmin`, `regular user` i `video manager`) a `DatabaseSeeder`.

### Publicació de Stubs
- S'han publicat els stubs personalitzats seguint l'exemple de [Laravel News](https://laravel-news.com/customizing-stubs-in-laravel).

### Creació de Tests
- S'ha creat el test `VideosManageControllerTest` a `tests/Feature/Videos`, amb les següents funcions:
    - `user_with_permissions_can_manage_videos()`
    - `regular_users_cannot_manage_videos()`
    - `guest_users_cannot_manage_videos()`
    - `superadmins_can_manage_videos()`
    - `loginAsVideoManager()`
    - `loginAsSuperAdmin()`
    - `loginAsRegularUser()`
- S'ha afegit el test `UserTest` a `tests/Unit` amb la funció `isSuperAdmin()`.

### Documentació i Revisió de Codi
- S'ha documentat l'sprint a `resources/markdown/terms`.
- S'han verificat tots els fitxers creats utilitzant Larastan.

