<?php
function makeEmptyGrid()
{
    $grid = [];
    for ($i = 0; $i<8; $i++) {
        for ($j = 0; $j<8; $j++) {
            $grid[$i][$j] = 0;
        }
    }
    return $grid;
}
function resetGrid(&$grid)
{
    for ($i = 0; $i<8; $i++) {
        for ($j = 0; $j<8; $j++) {
            $grid[$i][$j] = 0;
        }
    }
}
function putQueen(&$grid, $coord)
{
    $x = $coord[0];
    $y = $coord[1];
    if ($grid[$x][$y] == 1) {
        return false;
    }
    for ($i = 0; $i<8; $i++) {
        for ($j = 0; $j<8; $j++) {
            if ($i == $x ||
                $j == $y ||
                $i - $j == $x - $y ||
                $i + $j == $x + $y) {
                $grid[$i][$j] = 1;
            }
        }
    }
    return true;
}
function check($queens, &$grid)
{
    resetGrid($grid);
    foreach($queens as $queen){
        if(!(putQueen($grid, $queen))){
            return false;
        }
    }
    return true;
}
function solve()
{
    $grid = makeEmptyGrid();
    $list = [0,1,2,3,4,5,6,7];
    $tries = 0;
    $solutions = 0;
    foreach (permutations($list) as $permutation) {
        $queens = [];
        for ($i = 0; $i<8; $i++) {
            $queens[] = [$i, $permutation[$i]];
        }
        if(check($queens, $grid)){
            printSolution($queens);
            $solutions++;
        }
        else {
            $tries++;
        }
    }
    //print_r($solutions);
    echo 'permutations tried: ' . $tries . '. solutions found: ' . $solutions;
}

function permutations(array $elements)
{
    if (count($elements) <= 1) {
        yield $elements;
    } else {
        foreach (permutations(array_slice($elements, 1)) as $permutation) {
            foreach (range(0, count($elements) - 1) as $i) {
                yield array_merge(
                    array_slice($permutation, 0, $i),
                    [$elements[0]],
                    array_slice($permutation, $i)
                );
            }
        }
    }
}

//solve();

function printSolution($queens){
    foreach ($queens as $queen) {
        $pos = $queen[1];
        echo str_repeat('O  ', $pos) . 'X  ' . str_repeat('O  ', 7 - $pos) . PHP_EOL;
    }
    echo PHP_EOL;
}





function firstEmptySquare($grid)
{
    for ($i = 0; $i<8; $i++) {
        for ($j = 0; $j<8; $j++) {
            if ($grid[$i][$j] == 0) {
                return [$i, $j];
            }
        }
    }

    return false;
}


function lastEmptySquare($grid)
{
    for ($i = 7; $i>=0; $i--) {
        for ($j = 7; $j>=0; $j--) {
            if ($grid[$i][$j] == 0) {
                return [$i, $j];
            }
        }
    }

    return false;
}
