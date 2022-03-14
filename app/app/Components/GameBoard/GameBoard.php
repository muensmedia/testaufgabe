<?php

namespace Components\GameBoard;

use Components\Enums\GamePlayer;
use Illuminate\Support\Facades\Storage;
use Components\Enums\GameBoardSliceType;
use Components\Enums\GameMark;
use Exception;
use Throwable;

class GameBoard
{
    // Board size
    const TTT_SIZE = 3;

    // File name for serialization
    const TTT_GAME = 'tic-tac-toe';

    // Board data storage
    private array $board;

    // Last player
    private ?GamePlayer $last_player = null;

    private function __construct()
    {
        // Start with an empty board
        $this->clear();
    }

    /**
     * Checks position validity and throws an exception in case of an invalid position
     * @param int $x X position
     * @param int $y Y position
     * @return void
     * @throws Exception
     */
    private function validatePosition(int $x, int $y): void
    {
        if ($x < 0 || $x >= self::TTT_SIZE) throw new Exception("Invalid X position: $x");
        if ($y < 0 || $y >= self::TTT_SIZE) throw new Exception("Invalid Y position: $y");
    }

    /**
     * Returns the content of a given space
     * @param int $x
     * @param int $y
     * @return GameMark
     * @throws Exception
     */
    public function getSpace(int $x, int $y): GameMark
    {
        $this->validatePosition($x,$y);
        return $this->board[ $y * self::TTT_SIZE + $x ];
    }

    /**
     * Sets the content of a given space
     * @param int $x
     * @param int $y
     * @param GameMark $mark
     * @return void
     * @throws Exception
     */
    public function setSpace(int $x, int $y, GameMark $mark)
    {
        $this->validatePosition($x,$y);
        $this->last_player = $mark->player();
        $this->board[ $y * self::TTT_SIZE + $x ] = $mark;
    }

    /**
     * Returns an entire row
     * @throws Exception
     */
    public function getRow(int $row ): GameBoardSlice
    {
        return new GameBoardSlice( $this, GameBoardSliceType::Row, self::TTT_SIZE, $row );
    }

    /**
     * Return all rows
     * @return GameBoardSlice[]
     * @throws Exception
     */
    public function getRows(): array
    {
        $array = [];

        for ($i = 0; $i < self::TTT_SIZE; $i++) {
            $array[] = $this->getRow($i);
        }
        return $array;
    }

    /**
     * Returns an entire column
     * @throws Exception
     */
    public function getColumn(int $col ): GameBoardSlice
    {
        return new GameBoardSlice( $this, GameBoardSliceType::Column, self::TTT_SIZE, $col );
    }

    /**
     * Return all rows
     * @return GameBoardSlice[]
     * @throws Exception
     */
    public function getColumns(): array
    {
        $array = [];

        for ($i = 0; $i < self::TTT_SIZE; $i++) {
            $array[] = $this->getColumn($i);
        }
        return $array;
    }

    /**
     * Returns the main diagonal
     * @throws Exception
     */
    public function getMainDiagonal(): GameBoardSlice {
        return new GameBoardSlice( $this, GameBoardSliceType::MainDiagonal, self::TTT_SIZE );
    }

    /**
     * Returns the anti diagonal
     * @throws Exception
     */
    public function getAntiDiagonal(): GameBoardSlice
    {
        return new GameBoardSlice( $this, GameBoardSliceType::AntiDiagonal, self::TTT_SIZE );
    }

    /**
     * Loads a previously saved GameBoard or returns a new one of no previous save exists
     * @return GameBoard
     */
    static function load(): GameBoard
    {
        // Start with NULL
        $data = null;

        // If a game board file exists...
        if ( Storage::disk('local')->exists(self::TTT_GAME . "_" . self::TTT_SIZE ) ) {

            // Attempt to load it
            try
            {
                // Deserialize data, only allow GameBord class
                $data = unserialize( Storage::disk('local')->get( self::TTT_GAME . "_" . self::TTT_SIZE ), [
                    'allowed_classes' => [self::class]
                ] );

                // Make sure the resulting data is actually a GameBoard, otherwise throw Exception
                if ( !is_a( $data, self::class ) )
                    throw new Exception('Unable to unserialize.');

            }
            catch (Throwable $e)
            {
                // In case deserialization goes wrong, reset data to null
                $data = null;
            }
        }

        // Return deserialized data if it exists, otherwise create a new GameBoard
        return $data ?? new GameBoard();
    }

    /**
     * Returns the player that did the last action
     * @return ?GamePlayer
     */
    public function getLastPlayer(): ?GamePlayer
    {
        return $this->last_player;
    }

    /**
     * Clears the GameBoard
     * @return void
     */
    function clear(): void
    {
        // Create a square empty board based on TTT_SIZE
        $this->board = array_fill(0, self::TTT_SIZE * self::TTT_SIZE, GameMark::None);
        // reset last player
        $this->last_player = null;
    }

    /**
     * Saves the GameBoard
     * @return void
     */
    function save(): void
    {
        Storage::disk('local')->put(self::TTT_GAME . "_" . self::TTT_SIZE, serialize( $this ) );
    }

    /**
     * Is there still some space left on the game board?
     * @return bool
     * @throws Exception
     */
    public function spaceIsLeft() {
        return in_array(GameMark::None, $this->board, true);
    }

    /**
     * Draws the game board
     * @return string
     */
    public function draw(): string
    {
        $gameBoardString = '   ';

        // draw the first row with the column numbers
        for ($i = 0; $i < self::TTT_SIZE; $i++) {
            $gameBoardString .= "$i  ";
        }

        $gameBoardString .= "\n";

        // iterate over all rows
        foreach ($this->getRows() as $rowNumber => $row) {

            // draw the row number in each row
            $gameBoardString .= $rowNumber . ' ';

            // get all spaces inside of the row
            foreach ($row->getSpaces() as $columnNumber => $space) {

                if ($columnNumber !== 0) {
                    $gameBoardString .= '|';
                }

                // if the row is the last row and the game mark is "none", draw spaces instead of underscores
                if (($rowNumber === self::TTT_SIZE - 1) && ($space === GameMark::None)) {
                    $gameBoardString .= '  ';
                } else {
                    $gameBoardString .= $space->char();
                }
            }

            // close the row
            $gameBoardString .= "\n";
        }

        return $gameBoardString;
    }
}
