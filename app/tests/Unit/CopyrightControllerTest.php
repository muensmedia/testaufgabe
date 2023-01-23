<?php

namespace Tests\Unit;

use Tests\TestCase;

class CopyrightControllerTest extends TestCase
{
    public function testCopyrightChanged(): void
    {
        $ref_copyright = "
 ___       _   _  _ _  ___  _  _  __  _   _  ___  __  _   _     __          _ _
| o )__   | \_/ || | || __|| \| |/ _|| \_/ || __||  \| | / \   / _|  _ _ ||| U |
| o \\ V7 | \_/ || U || _| | \\ |\_ \| \_/ || _| | o ) || o | ( |_n|/ \ \|o\   |
|___/ )/  |_| |_||___||___||_|\_||__/|_| |_||___||__/|_||_n_|  \__/L_n_n||_/_n_|
     //
        ";
        $real_copyright = $this->get(route('start'));

        $real_copyright->assertOk();
        $real_copyright->assertHeader("Content-Type");
        $this->assertStringContainsString("text/plain", $real_copyright->headers->get("Content-Type"));
        $real_copyright->assertDontSeeText($ref_copyright);
    }
}
