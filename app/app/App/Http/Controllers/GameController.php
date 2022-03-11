<?php

namespace App\Http\Controllers;

use Components\GameBoard\GameBoard;
use Illuminate\Http\Response;

class GameController extends Controller
{
    /**
     * @param int $x The x position entered by the player
     * @param int $y The y position entered by the player
     * @return Response
     */
    public function play(int $x, int $y) {

        // Loading the game board
        $game = GameBoard::load();

        // TODO TASK 3 - Let the player make their move
        // Here, you need to code the logic that allows a player to make a move.

        // Saving the game board and output it to the player
        $game->save();
        return response('GAME BOARD')->header('Content-Type', 'text/plain');
    }
}
