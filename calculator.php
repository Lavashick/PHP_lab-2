<?php

include_once 'structures/Stack.php';

class Calculator {
    /** @var Stack */
    private $st_op;
    /** @var Stack */
    private $st_val;

    private function st_oper() {
        if ($this->st_val->size() <= 1) return;
        $a = $this->st_val->pop();
        $b = $this->st_val->pop();
        $s = $this->st_op->pop();

        switch ($s) {
            case '+': $b += $a; break;
            case '-': $b -= $a; break;
            case '*': $b *= $a; break;
            case '/': $b /= $a; break;
        }

        $this->st_val->push($b);
    }

    private function is_point($s) {
        return $s == '.' || $s == ',';
    }

    /**
     * @param $str
     * @return bool
     * @throws Exception
     */
    public function is_correct($str) {
        $brace_stack = new Stack();
        $num = '';
        $is_last_num = false;
        $is_last_op = false;
        $is_op_inc = false;
        $is_num_inc = false;
        $is_last_point = false;
        $last_op = null;
        $last_num = null;

        for ($i = 0; $i < strlen($str); $i++) {
            $c = $str[$i];

            echo $last_op.' '.$last_num.'<br>';
            if (($last_op == ':' || $last_op == '/') && ($last_num == 0 || $c == 0))
                throw new Exception('('.($i).') Деление на ноль');

            if (($num == '' && ($c == '-') && ($str[$i + 1] == '(') && ($i == 0 || $str[$i - 1] == '('))) {
                if ($is_last_num && $num == '')
                    throw new Exception('('.($i + 1).') Неожиданное число');
                $num .= $c;
                continue;
            }

            if (is_numeric($c) || ($num == '' && ($c == '-') && is_numeric($str[$i + 1]) && ($i == 0 || $str[$i - 1] == '('
//                        || $str[$i - 1] == ' '
                    ))) {
                $last_num = $c;
                if ($is_last_num && $num == '')
                    throw new Exception('('.($i + 1).') Неожиданное число');
                $is_last_num = true;
                $is_last_op = false;
                $is_num_inc = true;
                $is_last_point = false;
                $num .= $c;
                continue;
            }

            if ($c == '.' || $c == ',') {
                if ($num == '' || $this->is_point($num[strlen($num) - 1]) || (float)$num != (int)$num)
                    throw new Exception('('.($i + 1).') Неожиданная точка');
                $num .= '.';
                $is_last_point = true;
                continue;
            } else {
                if (!is_numeric($c) && $is_last_point)
                    throw new Exception('('.($i + 1).') Ожидалось число');
                $is_last_point = false;
                $num = '';
            }

            if(!empty($num) && !is_numeric($num))
                throw new Exception('('.($i + 1).') Незавершенное число');

            switch ($c) {
                case ' ':
                    break;
                case '+':case '-':case '*':case '/':case ':':
                    $last_op = $c;
                    $is_op_inc = true;
                    if (!$is_last_num || $is_last_op)
                        throw new Exception('('.($i + 1).') Неожиданный оператор');
                    $is_last_op = true;
                    $is_last_num = false;
                    break;
                case '(':
                    $brace_stack->push($i + 1);
                    break;
                case ')':
                    if ($brace_stack->size() == 0)
                        throw new Exception('('.($i + 1).') Лишняя закрывающая скобка');
                    $brace_stack->pop();
                    break;
                default:
                    throw new Exception('('.($i + 1).') Неизвестный символ');
            }
        }

        if ($this->is_point($num[strlen($num) - 1]))
            throw new Exception('('.(strlen($str)).') Неожиданная точка');

        if ($brace_stack->size() != 0)
            throw new Exception('('.$brace_stack->top().') Отсутствует закрывающая скобка');

        if (!$is_op_inc && (!$is_num_inc || $is_last_op))
            throw new Exception('Отсутствуют операторы и числа');
        if (!$is_op_inc)
            throw new Exception('Отсутствуют операторы');
        if (!$is_num_inc || $is_last_op)
            throw new Exception('Отсутствуют числа');

        return true;
    }

    /**
     * @param $str
     * @return float
     * @throws Exception
     */
    public function calculate($str) {
        try {
            $this->is_correct($str);
        } catch (Exception $e) {
            throw $e;
        }
        $this->st_op = new Stack();
        $this->st_val = new Stack();

        for ($i = 0; $i < strlen($str); $i++) {
            $c = $str[$i];
            if (is_numeric($c)) {
                $val = '';
                while (is_numeric($str[$i]) || $this->is_point($str[$i])) {
                    if ($this->is_point($str[$i]))
                        $val .= '.';
                    else
                        $val .= $str[$i];
                    ++$i;
                }
                --$i;
                $this->st_val->push(floatval($val));
                continue;
            }
            switch ($str[$i]) {
                case '*':
                    while ($this->st_op->size() != 0) {
                        if ($this->st_op->top() == '+' || $this->st_op->top() == '-' || $this->st_op->top() == '(') break;

                        $this->st_oper();
                    }

                    $this->st_op->push($str[$i]);
                    break;

                case '/':case ':':
                    while ($this->st_op->size() != 0) {
                        if ($this->st_op->top() == '+' || $this->st_op->top() == '-' || $this->st_op->top() == '(') break;

                        $this->st_oper();
                    }

                    $this->st_op->push('/');
                    break;

                case '+':
                    while ($this->st_op->size() != 0) {
                        if ($this->st_op->top() == '(') break;

                        $this->st_oper();
                    }

                    $this->st_op->push($str[$i]);
                    break;

                case '-':
                    if ((is_numeric($str[$i + 1]) || $str[$i + 1] == '(') && ($i == 0 || $str[$i - 1] == '(')) {
                        $this->st_op->push('*');
                        $this->st_val->push(-1);
                    } else {
                        while ($this->st_op->size()) {
                            if ($this->st_op->top() == '(') break;

                            $this->st_oper();
                        }
                        $this->st_op->push($c);
                    }
                    break;

                case '(':
                    $this->st_op->push($str[$i]);
                    break;

                case ')':
                    while ($this->st_op->size() != 0) {
                        if ($this->st_op->top() == '(') {
                            $this->st_op->pop();
                            break;
                        }

                        $this->st_oper();
                    }
                    break;

                default: break;
            }
        }

        while ($this->st_op->size())
            $this->st_oper();

        return $this->st_val->top();
    }
}
