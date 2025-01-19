# Guia del projecte (Primer Sprint)

1. Inicialització del projecte
   El projecte es va iniciar amb Laravel i Jetstream, una eina que ens proporciona un sistema d'autenticació i gestió d'usuaris robust. Jetstream és útil per desenvolupar aplicacions amb autenticació i gestió d'equips de manera ràpida.

Testos realitzats:
Es van implementar proves unitàries per verificar que els usuaris i equips es creaven correctament a la base de dades.
# Guia del projecte (Segon Sprint)
En el segon sprint, el focus es va traslladar a la gestió de vídeos i la creació d'un sistema per visualitzar aquests vídeos en l'aplicació.

1. Migració de la taula "videos"
   Es va crear la migració per a la taula videos, que conté els següents camps:


2. Creació de Layout
   Es va dissenyar un layout per a l'aplicació amb les següents característiques:

Header: Conté els enllaços i informació general.
Footer: Inclou la informació addicional de l'aplicació.

A més, es va crear la view per visualitzar el vídeo, la qual permet mostrar el contingut del vídeo de manera efectiva a l'usuari.

3. Testos per verificar la visualització dels vídeos
   Es van crear tests per assegurar-se que el vídeo es visualitza correctament en les diferents formats de data de publicació.
   Es va implementar un test per verificar que un usuari pugui accedir correctament a un vídeo existent.
   També es va crear un test per assegurar que un usuari no pugui accedir a un vídeo que no existeix o que ha estat eliminat.
   

### Resultats dels testos:
   Els testos es van passar correctament, assegurant que el sistema gestionés de manera apropiada l'accés als vídeos.
   El sistema va demostrar ser fiable per visualitzar vídeos i gestionar els accessos d'usuaris.
   Conclusió
   Durant aquest primer i segon sprint, s'han aconseguit els següents objectius:

Desenvolupament d'una estructura d'usuaris i equips funcional.
Creació de la taula "videos" i implementació de funcionalitats per gestionar vídeos.
Desenvolupament d'una vista per a visualitzar els vídeos.
