# Apprenticeship Challenge for future Computer Science Expert Subject Area: Software Development
This Challenge needs to be solved, if you want to snatch yourself an apprenticeship at [MÜNSMEDIA GmbH](https://muensmedia.de) as an Computer Science Expert Subject Area: Software Development. 👾 🤖 😎

## Tic-Tac-Toe
[Tic-Tac-Toe](https://de.wikipedia.org/wiki/Tic-Tac-Toe), noughts and crosses, or Xs and Os is a paper-and-pencil game for two players, that you're probably already familiar with.

## Gameplay / How it works
The game board consists of 9 empty spaces, aligned in a three-by-three grid.
Players alternately place the marks (:x:) and (:o:) in one of the empty spaces.

The player who succeeds in placing three of their marks in a horizontal, vertical, or diagonal row is the winner.
When no winner has been decided after all 9 spaces have been filled, the game ends in a draw.

### Example: Player X has won
![X hat gewonnen](https://wikimedia.org/api/rest_v1/media/math/render/svg/595038905e2e65568a90ec43d36a9c2a537c1d0a)

### Exapmle: Draw
![Unentschieden](https://wikimedia.org/api/rest_v1/media/math/render/svg/5ba8a4fc55e4259c807ef326b28088e6e46d5e42)

# Your Tasks

## 1.) Complete this Struktogramm

A Nassi-Shneiderman-Diagram or **Struktogramm** is a Diagram to show Program drafts as a Method for structural Programing.

A Struktogramm contains the following structural blocks, that are nested inside or combined with each other:

### Process
![](https://upload.wikimedia.org/wikipedia/commons/a/a2/Process_Block2.jpg)

Every Process (or Chain of Commands), a Program should do, are written inside a rectangle Block.

### If-Case
![](https://upload.wikimedia.org/wikipedia/commons/7/79/Two-Way_Branch.jpg)

If the Condition is met (true), Instruction 1 will run.

If the Condition isn't met (false), Instruction 2 will run. Instruction Blocks can also have multiple Instructions.

### Loop with exit condition (While-Loop)
![](https://upload.wikimedia.org/wikipedia/commons/b/be/Test_Last.jpg)

It needs at least one loop, because the Repeat condition is checked **after** one loop. If this is true, the loop continues.

### Complete Struktogram for Tic-Tac-Toe Game

We started creating a Struktogram for the Tic-Tac-Toe Game, but your future trainer Malte isn't sure about the contents from the parts `(1), (2), (3), (4), (5), (6), (7)`.

*Solve this Task and put your Solution into your E-Mail, that you will send to us.*

![tic-tac-toe-struktogramm](./docs/tic-tac-toe-struktogramm.jpg)

## 2.) Getting ready to code
Now that you know how Tic-Tac-Toe works, we want to code it.
Dont worry. No matter if you dont have eny programming experience or just a bit, we will get there together 😉
We want to see and work together on Your sourcecode. To freely share sourcecode, we are using the platform GitHub.

### Please do the following steps
- [ ] You [already own a Github-Account](https://github.com/login)  **or** you [create yourself a free GitHub-Account](https://github.com/join)
- [ ] After signing in at GitHub.com:
- [ ] Kopiere unseren Quellcode in Deinen GitHub-Account. Dazu musst Du nur den [folgenden Link klicken](https://github.com/muensmedia/testaufgabe/generate).
  - **Bitte stelle die Sichtbarkeit des neue Repositories - wie voreingestellt - auf `Public`.**
- [ ] Im neu erstellten GitHub-Repository scrollst Du herunter, bis Du diese Anleitung siehst.
- [ ] Du machst nun an dieser Stelle aus Deinem soeben erstellten Repository weiter.
- [ ] [Du öffnest Gitpod](https://gitpod.io/workspaces)
- [ ] Klicke `Continue with GitHub`, wähle `Authorize gitpod-io` und melde Dich mit Deinen GitHub-Zugangsdaten an.
- [ ] Stelle sicher, dass Du nun auf der Seite https://gitpod.io/workspaces bist.
- [ ] Erstelle durch einen Klick auf `New Workspace` eine neue Programmierumgebung.
- [ ] Wähle im sich öffnenden Dialog die Adresse Deines eben erstellten Repository aus.
- Die Arbeitsumgebung GitPod öffnet sich.
- [ ] **Wähle `Dont wait for prebuild`**
- Gitpod öffnet sich, *das kann bis zu 5 Minuten dauern 😳. Gedulde Dich.*
- [ ] Öffne **in der Zwischenzeit** https://gitpod.io/integrations
- [ ] Klicke in der Zeile `GitHub github.com` hinten auf die `drei Punkte` und dann auf `Edit Permissions`
- [ ] Wähle dann zusätzlich `public_repo` und `repo` aus und speichere mit mit `Update permissions`
- [ ] Bestätige die Änderung mit `Authorize gitpod-io` und ggf. Deinem Passwort
- [ ] Öffne dort nun diese Anleitung. Klicke dazu mit einem Rechtsklick auf die Datei `REDAME.md` und dann auf `Open Preview`.
- [ ] Fahre mit der Anleitung in Deiner Gitpod-Programmierumgebung fort.

## 3.) Change Copyright
Your Tic-Tac-Toe Webapp consists of a Frontend and Backend Part.  
As Frontend, we use a Tool called `Swagger`, so we can try out API's with a graphical Interface.
Swagger is already open, as you open GitPod's Web-IDE.
As Backend, we use a [PHP-App](https://www.php.net/manual/en/), based on the Framework [Laravel](https://laravel.com/docs/9.x).  

We have prepared a function, that displays this Game's Copyright. ©️

**Try this API-Method for display the Game's Copyright:**
- [ ] In Swagger, click on `/copyright`.
- [ ] Click on the Button `Try it out`.
- [ ] Send this Request by clicking on `Execute`.
- You can see the answer with the current Copyright at `Response body`.

✍🏼 **Change Copyright:**  
- [ ] Open File [app/app/App/Http/Controllers/CopyrightController.php](app/app/App/Http/Controllers/CopyrightController.php) in Gitpod.
- [ ] At Line `18` the Copyright is saved as a string.
- [ ] Use the ASCII Generator linked in `CopyrightController.php` to create your personal Copyright.
- [ ] Replace our Copyright `By MÜNSMEDIA GmbH` by your own Copyright.
- [ ] Try your new Copyright with Swagger!
- [ ] You need to save your changes, also named - **commit** (next section).

#### ✅ Create Commit:
  - On the left Side, click on Tab `Source Control` or you can press the keys <kbd>Strg</kbd>+<kbd>Shift</kbd>+<kbd>G</kbd> together.
  - Above, you can type a message, to describe your changes as detailed and meaningful as possible. **Please write your message in English, even if you are a native german speaker**.
  - Save your message with <kbd>Strg</kbd><kbd>⏎</kbd>
  - At the next Dialog, click on `Yes`, to add all your changes to your Commit.
  - **Click on the Button `Sync changes`**, to upload your changes to GitHub. Confirm with `OK`.
  - 🎉 You have done your first Git-Commit! 🎊

## 4.) Methode /play schreiben
Noch kannst Du nicht gegen den vom MÜNSMEDIA-Team programmierten Bot spielen.  
Es fehlt noch die Logik, was bei einem Aufruf der `/play`-API-Route passieren soll.

### Struktogramm für einen Spielzug
Anbei das Struktogramm für einen Spielzug von Dir mit der Methode `play()`.

![](./docs/struktogramm-spielzug.jpg)

**To-do:**
- [ ] Schau Dir in Ruhe das Struktogramm für einen Spielzug von Dir an!
  - Die von Dir noch zu implementierenden Teile des Spielzugs haben wir im Struktogramm farblich hervorgehoben.
- [ ] In der Datei [app/app/App/Http/Controllers/GameController.php](app/app/App/Http/Controllers/GameController.php) in der Methode `play()` - Zeile 144 fehlt noch die Logik.
  - Bitte ergänze die fehlende Logik, wir haben Dir Hilfestellungen in Form von Kommentaren im Quelltext hinterlassen.
- [ ] Teste Deinen Spielzug in Swagger, die Funktion heißt dort ebenfalls `/play`.
- [ ] **❌ Um den Spielstand zurückzusetzen, gibt es im Swagger die Methode `DELETE /board`**
- [ ] ✅ Erstelle einen Commit (siehe oben `Commit erstellen`)
- [ ] 🔁 Klicke den Button `Sync changes` um Deine Änderungen auf GitHub hochzuladen.

## 5.) Der 🤖 spielt - /play-bot
Wir haben bereits einen 🤖 (Bot) geschrieben, gegen den Du spielen kannst.  
Öffne dazu Swagger und verwende im Wechsel (Du beginnst) die `/play`-API-Route und die `/play-bot`-API-Route.

## 6.) Cheaten verboten - <kbd>↑</kbd><kbd>↑</kbd><kbd>↓</kbd><kbd>↓</kbd><kbd>←</kbd><kbd>→</kbd><kbd>←</kbd><kbd>→</kbd><kbd>B</kbd><kbd>A</kbd>
Aktuell kannst Du oder der Bot noch mehrmals hintereinander spielen, obwohl ihr nicht an der Reihe seid.  
So macht das natürlich keinen Spaß 😞! 

**To-do:**
- [ ] In der Datei [app/app/App/Http/Controllers/GameController.php](app/app/App/Http/Controllers/GameController.php) in der Methode `isAllowedToPlay()` - Zeile 121 fehlt noch die Logik.
  - Bitte ergänze die fehlende Logik, wir haben Dir Hilfestellungen in Form von Kommentaren im Quelltext hinterlassen.
- [ ] Teste deine Änderung in Swagger ausführlich
- [ ] ✅ Erstelle einen Commit (siehe oben `Commit erstellen`)
- [ ] 🔁 Klicke den Button `Sync changes` um Deine Änderungen auf GitHub hochzuladen.

## 7.) Wer hat gewonnen? 🏆
Aktuell kann das Spiel noch keinen Gewinner ausgeben.  
Es ist an Dir das zu ändern.

**To-do:**
- [ ] In der Datei [app/app/App/Http/Controllers/GameController.php](app/app/App/Http/Controllers/GameController.php) in der Methode `whoHasWon()` - Zeile 104 fehlt noch die Logik.
  - Bitte ergänze die fehlende Logik, wir haben Dir Hilfestellungen in Form von Kommentaren im Quelltext hinterlassen.
- [ ] Teste deine Änderung in Swagger ausführlich
- [ ] ✅ Erstelle einen Commit (siehe oben `Commit erstellen`)
- [ ] 🔁 Klicke den Button `Sync changes` um Deine Änderungen auf GitHub hochzuladen.

## Zusatzaufgaben
Dir hat das alles großen Spaß gemacht und Du willst noch mehr, kein Problem 😈!

### 8.) Methode someoneHasWon() verschönern ✨
Die Method `someoneHasWon()` in der Datei [app/app/App/Http/Controllers/GameController.php](app/app/App/Http/Controllers/GameController.php) ist ziemlich hässlich.  
Kannst Du die Methode durch den Einsatz von Schleifen deutlich vereinfachen?  
Dazu kann es hilfreich sein, wenn Du Dir die **public-Methoden** des `$game` anschaust:
[app/app/Components/GameBoard/GameBoard.php](app/app/Components/GameBoard/GameBoard.php)


**To-do:**
- [ ] Verschönere die Methode `someoneHasWon()`
- [ ] Teste deine Änderung in Swagger ausführlich
- [ ] ✅ Erstelle einen Commit (siehe oben `Commit erstellen`)
- [ ] 🔁 Klicke den Button `Sync changes` um Deine Änderungen auf GitHub hochzuladen.

### 9.) 4x4 Tic-Tac-Toe 😈
Überlege Dir, was Du verändern müsstest, damit wir ein 4x4 Tic-Tac-Toe spielen können.  
Schau dir dazu auch die Klasse [app/app/Components/GameBoard/GameBoard.php](app/app/Components/GameBoard/GameBoard.php) genauer an.

**To-do:**
- [ ] Versuche ein 4x4 Tic-Tac-Toe lauffähig zu bekommen
  - Insbesondere Zusatzaufgabe 7.) wird dazu notwendig sein.
- [ ] Teste deine Änderung in Swagger ausführlich
- [ ] ✅ Erstelle einen Commit (siehe oben `Commit erstellen`)
- [ ] 🔁 Klicke den Button `Sync changes` um Deine Änderungen auf GitHub hochzuladen.

# ➡ Wie geht es weiter?
Sende uns die Lösung zu Aufgabe 1 sowie den Link zu Deinem Github-Repository per E-Mail, sobald Du fertig bist.  
Wir werden Deine Lösung auswerten und Dich zu einem persönlichen Kennenlerngespräch einladen, sofern Du unter die besten 5 Bewerber*innen kommst.

Wir freuen uns auf Dich!
