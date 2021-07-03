<?php

class AnalysisResult
{
    var $symbol_amount = 0; // кол-во символов
    var $letter_amount = 0; // кол-во букв в тексте
    var $word_amount = 0; // кол-во слов
    var $lower_amount = 0; // кол-во строчных букв
    var $upper_amount = 0; // кол-во заглавных букв
    var $prep_mark_amount = 0; // кол-во знаков препинания
    var $digit_amount = 0; // кол-во цифр
    var $letters = []; // список всех букв
    var $words = []; // список всех слов

    function start($text)
    {
        $this->symbol_amount = strlen($text);
        $word = ''; // текущее слово
        for ($i = 0; $i < strlen($text); $i++) // перебираем все символы текста
        {
            if ($this->isDigit($text[$i])) // если встретилась цифра
                $this->digit_amount++; // увеличиваем счетчик цифр
            if ($this->isLower($text[$i]))
                $this->lower_amount++;
            if ($this->isPrepMark($text[$i]))
                $this->prep_mark_amount++;
            if ($this->isUpper($text[$i]))
                $this->upper_amount++;

            $lower_symbol = mb_strtolower($text[$i], 'cp1251');
            if ($this->isLetter($lower_symbol)) {
                $this->letter_amount++;
                if (isset($this->letters[$lower_symbol]))
                    $this->letters[$lower_symbol]++;
                else
                    $this->letters[$lower_symbol] = 1;
            }


            if (!$this->isLetter($lower_symbol) || $i == strlen($text) - 1) {
                if ($this->isDigit($lower_symbol))
                    continue;
                if ($i == strlen($text) - 1)
                    $word .= $lower_symbol; //добавляем в текущее слово новый символ
                if ($word) // если есть текущее слово
                {
                    $this->word_amount++;
                    // если текущее слово сохранено в списке слов
                    if (isset($this->words[$word]))
                        $this->words[$word]++; // увеличиваем число его повторов
                    else
                        $this->words[$word] = 1; // первый повтор слова
                }
                $word = ''; // сбрасываем текущее слово
            } else
                $word .= $lower_symbol; //добавляем в текущее слово новый символ
        }
    }

    function isNumber($data)
    {
        return $data <= '9' && $data >= '0';
    }

    function isLetter($data)
    {
        $l_text = iconv("cp1251", "utf-8", $data);
        return $l_text >= 'a' && $l_text <= 'z'
            || $l_text >= 'а' && $l_text <= 'я'
            || $l_text >= 'A' && $l_text <= 'Z'
            || $l_text >= 'А' && $l_text <= 'Я';
    }

    function isPrepMark($data)
    {
        return !$this->isLetter($data) && $data !== ' ' && !$this->isDigit($data);
    }

    function isLower($data)
    {
        $l_text = mb_strtolower($data, 'cp1251');
        return $this->isLetter($data) && $l_text === $data;
    }

    function isUpper($data)
    {
        $l_text = mb_strtoupper($data, 'cp1251');
        return $this->isLetter($data) && $l_text === $data;
    }

    function isDigit($data)
    {
        return $data <= '9' && $data >= '0';
    }
}