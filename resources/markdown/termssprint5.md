## Sprint 5

Tasques a realitzar

1. Correccions i millores

Corregir els errors detectats en el Sprint 4.

Afegir el camp user_id a la taula de vídeos per identificar l'usuari que els ha afegit.

Modificar el controller, model i helpers corresponents.

Assegurar que els vídeos es guarden amb l'usuari correctament.

Si en modificar el codi algun test d'un sprint anterior falla, corregir-lo.

2. Implementació del CRUD d'usuaris

Crear UsersManageController amb les següents funcions:

testedby

index

store

edit

update

delete

destroy

Crear les funcions index i show a UsersController.

3. Creació de vistes per al CRUD d'usuaris

Només accessibles per usuaris amb permisos adequats.

Vistes necessàries:

resources/views/users/manage/index.blade.php

resources/views/users/manage/create.blade.php

resources/views/users/manage/edit.blade.php

resources/views/users/manage/delete.blade.php

resources/views/users/index.blade.php (llistat i cerca d'usuaris).

Contingut de les vistes:

index.blade.php: Taula CRUD d’usuaris.

create.blade.php: Formulari per crear usuaris (afegir atribut data-qa per facilitar tests).

edit.blade.php: Formulari per editar usuaris.

delete.blade.php: Confirmació d'eliminació d'un usuari.

index.blade.php (llista d’usuaris): Permet buscar usuaris i accedir al seu detall i vídeos.

4. Permisos i seguretat

Crear permisos de gestió d’usuaris per al CRUD a helpers.

Assignar permisos als usuaris superadmin.

5. Tests

UserTest

user_without_permissions_can_see_default_users_page

user_with_permissions_can_see_default_users_page

not_logged_users_cannot_see_default_users_page

user_without_permissions_can_see_user_show_page

user_with_permissions_can_see_user_show_page

not_logged_users_cannot_see_user_show_page

UsersManageControllerTest

loginAsVideoManager

loginAsSuperAdmin

loginAsRegularUser

user_with_permissions_can_see_add_users

user_without_users_manage_create_cannot_see_add_users

user_with_permissions_can_store_users

user_without_permissions_cannot_store_users

user_with_permissions_can_destroy_users

user_without_permissions_cannot_destroy_users

user_with_permissions_can_see_edit_users

user_without_permissions_cannot_see_edit_users

user_with_permissions_can_update_users

user_without_permissions_cannot_update_users

user_with_permissions_can_manage_users

regular_users_cannot_manage_users

guest_users_cannot_manage_users

superadmins_can_manage_users

6. Configuració de rutes

Crear rutes de users/manage per al CRUD d’usuaris amb el seu middleware corresponent.

Crear rutes per a l'índex i show d’usuaris.

Les rutes del CRUD i les de l'índex/show només han d'estar disponibles per a usuaris loguejats.

Assegurar que es pot navegar correctament entre pàgines.

7. Verificacions finals

Afegir a resources/markdown/terms el que s'ha fet al sprint.

Verificar amb Larastan tots els fitxers creats per assegurar la qualitat del codi.

