# Dotclear 2 plugin

[![Release](https://img.shields.io/github/v/release/franck-paul/bigfoot)](https://github.com/franck-paul/bigfoot/releases)
[![Date](https://img.shields.io/github/release-date/franck-paul/bigfoot)](https://github.com/franck-paul/bigfoot/releases)
[![Issues](https://img.shields.io/github/issues/franck-paul/bigfoot)](https://github.com/franck-paul/bigfoot/issues)
[![Dotaddict](https://img.shields.io/badge/dotaddict-official-green.svg)](https://plugins.dotaddict.org/dc2/details/bigfoot)
[![License](https://img.shields.io/github/license/franck-paul/bigfoot)](https://github.com/franck-paul/bigfoot/blob/master/LICENSE)

[Source](http://www.bigfootjs.com/)

Communément appelé <q>le plugin, tu sais les trois petits points</q> par certaines et certains :-)

Le support de ce plugin se fait sur [le dépôt Github](https://github.com/franck-paul/bigfoot), où vous pouvez ouvrir des [tickets](https://github.com/franck-paul/bigfoot/issues) si nécessaire.

## Présentation

Sa fonction est de présenter les notes de bas de page des billets et des pages de façon légèrement différente.

Habituellement un billet avec des notes de bas de page se présente comme suit :

<div class="attach-image" markdown="1">
![Copie d'écran d'un billet comportant des notes de bas de page.](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-off.jpg?raw=true)
</div>

Voilà son équivalent textuel :

<pre>
Il s’agit de montrer le système de note proposé par le mode wiki<sup>[1]</sup> d’édition des billets et des pages.  
Les notes ainsi insérées apparaissent en fin d’article, précédées par un titre<sup>[2]</sup>.

<ins>Notes</ins>

[1] C’est une fonction qui n’existe que dans ce mode d’édition  
[2] Lequel titre est par défaut balisé avec un <h4\>
</pre>

Un texte, avec des **appels de note**, ici des numéros consécutifs encadrés par des crochets droits, qui pointent vers la note de bas de page correspondante, puis en bas de billet (ou de page) la **liste des notes** elles aussi numérotées de la même façon et comportant un lien qui permet de revenir à l'appel de note correspondant (l'aspect visuel peut différer en fonction de la syntaxe utilisée pour éditer le billet ou la page, mais le principe reste le même).

## Réglages

Une fois installé, le plugin possède quelques réglages, accessibles dans les **paramètres du blog** (c'est donc à régler pour chacun des blogs que vous avez) :

<div class="attach-image" markdown="1">
![Copie d'écran des réglages du plugin bigfoot](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-settings.jpg?raw=true)
</div>

Avec dans l'ordre :

* La case à cocher pour **activer** le plugin pour le blog.
* Un sélecteur qui permet de définir le **style visuel** des appels de note :
  * **Défaut** : sélectionne l'aspect par défaut (trois petits points).
  * **Pied de page** : sélectionne l'aspect par défaut (trois petits points) et permet d'afficher le contenu de la note en bas de la fenêtre plutôt que juste au dessous ou au dessus de l'appel de note.
  * **Numérique** : sélectionne l'aspect numérique où les trois petits points sont remplacés par le numéro de la note.
* Une case à cocher qui permet d'activer l'affichage du contenu de la note au **survol** de la souris en plus du clic sur l'appel de note.
* Une case à cocher qui permet d'activer la prise en charge des notes de bas de page **uniquement** dans le contexte **d'un billet ou d'une page seule**.

    <p class="information" markdown="1">
    Cette dernière option peut être utile avec des thèmes affichant partiellement le contenu des billets dans les contextes où il y en a plusieurs (page d'accueil, archive mensuelle, catégorie, …), et dans ce cas l'appel de note présent dans l'extrait (ou le début tronqué du billet) peut se retrouver sans note correspondante en bas du billet.
    </p>

## Exemples

Voilà le même billet que ci-dessus avec le **réglage par défaut** :

<div class="attach-image" markdown="1">
![Copie d'écran d'un billet comportant des notes de bas de page, les appels de note sont représentés par trois petits points.](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-std.jpg?raw=true)
</div>

Et lorsqu'on **clique** sur l'appel de note :

<div class="attach-image" markdown="1">
![Copie d'écran d'un billet comportant des notes de bas de page. Un appel de note est activé et le contenu de celle-ci est affichée juste en dessous.](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-click.jpg?raw=true)
</div>

Avec le style **pied de page** le contenu de la note est affichée en bas à gauche de la fenêtre :

<div class="attach-image" markdown="1">
![Copie d'écran du contenu d'une note de bas de page affiché en bas à gauche de la fenêtre.](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-bottom.jpg?raw=true)
</div>

Et avec le style **numérique**, le billet se présente comme suit :

<div class="attach-image" markdown="1">
![Copie d'écran d'un billet comportant des notes de bas de page. Les appels de note sont numérotés.](https://github.com/franck-paul/bigfoot/blob/main/doc/bigfoot-number.jpg?raw=true)
</div>
