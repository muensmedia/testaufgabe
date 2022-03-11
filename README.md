# Tic-Tac-Toe
[Tic-Tac-Toe](https://de.wikipedia.org/wiki/Tic-Tac-Toe) oder Drei gewinnt, ist ein einfaches Zweipersonen-Strategiespiel, das du bestimmt schon selber gespielt hast.

## Spielablauf
Das Spielfeld besteht aus neun Felder, die quadratisch (3x3) angeordnet sind.
Die Spieler markieren abwechselnd eines der noch freien Felder mit einem Kreuz (:x:) bzw. Kringel (:o:).

Gewonnen hat, wer drei :x: bzw. :o: in einer Zeile, Spalte oder Diagonale – auch Mühle genannt – gekennzeichnet hat. Sind alle Felder belegt und keiner der Spieler hat gewonnen, so endet das Spiel unentschieden.

### X hat gewonnen
![X hat gewonnen](https://wikimedia.org/api/rest_v1/media/math/render/svg/595038905e2e65568a90ec43d36a9c2a537c1d0a)

### Unentschieden
![Unentschieden](https://wikimedia.org/api/rest_v1/media/math/render/svg/5ba8a4fc55e4259c807ef326b28088e6e46d5e42)

# Deine Aufgaben

## 1.) Vervollständige das Struktorgramm
Ein Nassi-Shneiderman-Diagramm oder auch **Struktogramm** ist ein Diagrammtyp zur Darstellung von Programmentwürfen im Rahmen der Methode der strukturierten Programmierung.  
Ein Struktogramm besteht immer aus den nachfolgenden Strukturblöcken, die ineinander geschachtelt oder miteinander kombiniert werden können:
### Anweisung
![](https://upload.wikimedia.org/wikipedia/commons/1/1e/LineareAnw.png)  
Jede Anweisung (Befehlsfolge), die das Programm abarbeiten soll, wird in einen rechteckigen Strukturblock geschrieben.
### Fallunterscheidung
![](https://upload.wikimedia.org/wikipedia/commons/7/73/ZweifAusw.png)  
Wenn die Bedingung zutreffend (wahr) ist, wird der Anweisungsblock 1 durchlaufen.
Trifft die Bedingung nicht zu (falsch), wird der Anweisungsblock 2 durchlaufen (if then else). Ein Anweisungsblock kann aus einer oder mehreren Anweisungen bestehen.
### Schleife mit Ausgangsbedingung
![](https://upload.wikimedia.org/wikipedia/commons/d/da/FussgesteuerteSchleife.png)  
Der Schleifenkörper (Anweisungsblock 1) wird mindestens einmal durchlaufen, auch wenn die Bedingung von Anfang an nicht zutreffend (falsch) war!  
Die Bedingung, ob Anwendungsblock 1 erneut wiederholt werden soll, wird erst nach dem Durchlauf (dem Ausführen von Anwendungsblock 1) geprüft. Daraus ergibt sich, dass Anwendungsblock 1 mindestens einmal durchlaufen werden muss.

### Struktogramm Tic-Tac-Toe vervollständigen
Wir haben begonnen ein Struktogramm für das Spiel Tic-Tac-Toe zu erstellen.  
An einigen Stellen `(1), (2), (3), (4), (5), (6), (7)` war sich dein zukünftiger Ausbilder Malte nicht sicher. **Kannst du ihm helfen?**

*Bitte notiere deine Lösungen und füge diese bei Fertigstellung in deine E-Mail an uns ein.*

![tic-tac-toe-struktogramm](./docs/tic-tac-toe-struktogramm.jpg)