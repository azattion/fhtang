<?php

function build_triangle(int $n): string
{
    $level = (int)sqrt($n);

    if ($level * $level != $n) {
        return 'Невозможно построить треугольник' . PHP_EOL;
    }

    $current_number = 1;
    $max_width = 2 * $level - 1;

    $output = '';
    for ($i = 1; $i <= $level; $i++) {
        $numbers_in_row = 2 * $i - 1;
        $spaces = ($max_width - $numbers_in_row) / 2;

        $output .= str_repeat(' ', $spaces);

        $row_numbers = [];
        for ($j = 0; $j < $numbers_in_row; $j++) {
            $row_numbers[] = $current_number++;
        }

        $output .= implode(' ', $row_numbers) . PHP_EOL;
    }

    return $output;
}

if (php_sapi_name() === "cli") {

    if (empty($argv[1])) {
        echo 'Использование: php triangle_cli.php <целое_число>';
        exit(1);
    }

    echo build_triangle((int)$argv[1]);
    exit(1);
}

if (isset($_SERVER['REQUEST_METHOD'])) {

    if (empty($_GET['n'])) {
        echo 'Использование: ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?n=<целое_число>';
        exit(1);
    }

    echo '<pre style="text-align: center">';
    echo build_triangle((int)$_GET['n']);
    echo '</pre>';

    exit(1);
}






