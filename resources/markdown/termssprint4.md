# Resum del 4t Sprint

## Correcció d'errors
Es revisaran i corregiran els errors del 3r sprint, especialment assegurant que els permisos dels usuaris permetin accedir correctament a la ruta `/videosmanage`.

## Implementació del `videosManageController`
S'ha creat el controlador `videosManageController` amb les funcions següents:
- `testedby()`
- `index()`
- `store()`
- `show()`
- `edit()`
- `update()`
- `delete()`
- `destroy()`

També s'ha afegit la funció `index()` al `videosController`.

## Creació i gestió de vídeos
- S'ha verificat que hi hagi tres vídeos creats a `helpers` i afegits al `databaseSeeder`.
- S'han creat les vistes per al CRUD de vídeos amb accés restringit per permisos:
    - `resources/views/videos/manage/index.blade.php`
    - `resources/views/videos/manage/create.blade.php`
    - `resources/views/videos/manage/edit.blade.php`
    - `resources/views/videos/manage/delete.blade.php`
- A la vista `index.blade.php`, s'ha afegit la taula del CRUD.
- A `create.blade.php`, s'ha implementat un formulari amb l'atribut `data-qa` per facilitar els testos.
- S'ha creat la vista `resources/views/videos/index.blade.php` per mostrar tots els vídeos i enllaçar al seu detall (`show`).

## Tests
S'han afegit les següents proves per validar els permisos i la gestió de vídeos:

### `VideoTest`
- `user_without_permissions_can_see_default_videos_page()`
- `user_with_permissions_can_see_default_videos_page()`
- `not_logged_users_can_see_default_videos_page()`

### `VideosManageControllerTest`
- `loginAsVideoManager()`
- `loginAsSuperAdmin()`
- `loginAsRegularUser()`
- `user_with_permissions_can_see_add_videos()`
- `user_without_videos_manage_create_cannot_see_add_videos()`
- `user_with_permissions_can_store_videos()`
- `user_without_permissions_cannot_store_videos()`
- `user_with_permissions_can_destroy_videos()`
- `user_without_permissions_cannot_destroy_videos()`
- `user_with_permissions_can_see_edit_videos()`
- `user_without_permissions_cannot_see_edit_videos()`
- `user_with_permissions_can_update_videos()`
- `user_without_permissions_cannot_update_videos()`
- `user_with_permissions_can_manage_videos()`
- `regular_users_cannot_manage_videos()`
- `guest_users_cannot_manage_videos()`
- `superadmins_can_manage_videos()`

## Rutes
S'han definit les rutes del CRUD de `videos/manage` amb el middleware corresponent.
- Les rutes del CRUD només apareixen quan l'usuari està loguejat.
- La ruta d'índex és accessible tant per a usuaris loguejats com per a no loguejats.

