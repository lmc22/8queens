<?php

/**
 * Project: 8queens
 * User: peterwilkins
 * Date: 10/11/2015
 * Time: 20:17
 * Place eight chess queens on an 8x8 chessboard so that
 * no two queens threaten each other. Thus, a solution
 * requires that no two queens share the same row,
 * column, or diagonal.
 */
include_once 'src/Queens.php';

class QueensTest extends PHPUnit_Framework_TestCase
{

    public function test_emptyGrid()
    {
        $this->assertEquals([
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
            [0, 0, 0, 0, 0, 0, 0, 0,],
        ], makeEmptyGrid());
    }

    public function test_putQueen()
    {
        $grid = makeEmptyGrid();
        $this->assertEquals(true, putQueen($grid, [0, 0]));
    }

    public function test_firstEmptySquare()
    {
        $grid = makeEmptyGrid();
        putQueen($grid, [0, 0]);
        $this->assertEquals([1, 2], firstEmptySquare($grid));
    }

    public function test_lastEmptySquare()
    {
        $grid = makeEmptyGrid();
        putQueen($grid, [0, 0]);
        $this->assertEquals([7, 6], lastEmptySquare($grid));
    }

    public function test_check()
    {
        $grid = makeEmptyGrid();
        $this->assertEquals(false, check([[0, 4],[1,3],[2,5],[3,2],[4,1],[5,6],[6,0],[7,7]], $grid));
        $this->assertEquals(true, check([[0, 2],[1,7],[2,3],[3,6],[4,0],[5,5],[6,1],[7,4]], $grid));
    }
}


