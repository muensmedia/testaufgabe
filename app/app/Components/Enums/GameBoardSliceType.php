<?php

namespace Components\Enums;

enum GameBoardSliceType
{
    case Row;
    case Column;
    case MainDiagonal;
    case AntiDiagonal;
}
