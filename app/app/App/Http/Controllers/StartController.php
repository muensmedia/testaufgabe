<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function start(Request $request): string
    {
        $header = "
.-----. _            .-----.                .-----.
`-. .-':_;           `-. .-'                `-. .-'
  : :  .-. .--.  _____ : : .--.   .--.  _____ : : .--.  .--.
  : :  : :'  ..':_____:: :' .; ; '  ..':_____:: :' .; :' '_.'
  :_;  :_;`.__.'       :_;`.__,_;`.__.'       :_;`.__.'`.__.'
        ";

        $copyright = "
 ___       _   _  _ _  ___  _  _  __  _   _  ___  __  _   _     __          _ _
| o )__   | \_/ || | || __|| \| |/ _|| \_/ || __||  \| | / \   / _|  _ _ ||| U |
| o \\ V7 | \_/ || U || _| | \\ |\_ \| \_/ || _| | o ) || o | ( |_n|/ \ \|o\   |
|___/ )/  |_| |_||___||___||_|\_||__/|_| |_||___||__/|_||_n_|  \__/L_n_n||_/_n_|
     //
        ";

        return "${header} ${copyright}";
    }
}
