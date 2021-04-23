<?php
    $tables = [
        "C1*C2*C3#C4*C5*C6",
        "C2*C3*C4#",
        "##",
        "",
        "C5*C6*C7#C8##C9*C10#",
        "C6*C7*C8#C9*C10*C11#C12*C13*C14",
        "C7*C8*C9#C10*C11*C12",
        "C8*C9*C10#C11*C12*C13",
        "C9*C10*C11#C12*C13*C14",
        "C10*C11*C12#C13*C14*C15",
        "C11*C12*C13#C14*C15*C16"
    ];

    $columns_num = 3;

    function getTR($data, $columns_num) {
        if ($columns_num == 0) return 'Неправильное число колонок';

        $arr = explode( '*', $data);
        if (count($arr) == 1 && $arr[0] == '')
            return '<tr><td class="light">В строке нет ячеек</td></tr>';

        $ret = '';
        
        for ($i = 0; $i < $columns_num; $i++)
            if ($arr[$i] != '') {
                $ret .= '<td>' . $arr[$i] . '</td>';
            } else
                $ret .= '<td></td>';
        return '<tr>'.$ret.'</tr>';
    }

    function getTable($data, $columns_num) {
        $arr = explode( '#', $data);
        if (count($arr) == 1 && $arr[0] == '')
            return '<p class="light">В таблице нет строк</p>';
        $ret = '';
        $count = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $t = getTR($arr[$i], $columns_num);
            if ($t != '<tr><td class="light">В строке нет ячеек</td></tr>') {
                $count++;
            }
            $ret .= $t;
        }

        if ($count == 0)
            return '<p class="light">В таблице нет строк с ячейками</p>';
        else
        return '
        <table class="mb-5">
            <tbody>'.$ret.'</tbody>
        </table>';
    }
    ?>