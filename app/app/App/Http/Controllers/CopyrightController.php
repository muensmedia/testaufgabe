<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class CopyrightController extends Controller
{
    const HEADER = "
.-----. _            .-----.                .-----.
`-. .-':_;           `-. .-'                `-. .-'
  : :  .-. .--.  _____ : : .--.   .--.  _____ : : .--.  .--.
  : :  : :'  ..':_____:: :' .; ; '  ..':_____:: :' .; :' '_.'
  :_;  :_;`.__.'       :_;`.__,_;`.__.'       :_;`.__.'`.__.'
        ";

    // Generated with http://www.network-science.de/ascii/
    const COPYRIGHT = "
 ___       _   _  _ _  ___  _  _  __  _   _  ___  __  _   _     __          _ _
| o )__   | \_/ || | || __|| \| |/ _|| \_/ || __||  \| | / \   / _|  _ _ ||| U |
| o \\ V7 | \_/ || U || _| | \\ |\_ \| \_/ || _| | o ) || o | ( |_n|/ \ \|o\   |
|___/ )/  |_| |_||___||___||_|\_||__/|_| |_||___||__/|_||_n_|  \__/L_n_n||_/_n_|
     //
        ";

    static public function getCopyright(): string
    {
        return self::HEADER . self::COPYRIGHT;
    }

    static public function showCopyright(): Response
    {
        return response( self::getCopyright() )->header('Content-Type', 'text/plain');
    }
}
