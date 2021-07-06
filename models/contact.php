<?php

class Contact {
    var $id;
    var $first_name;
    var $surname;
    var $patronymic;
    var $gender;
    var $birth_date;
    var $phone_number;
    var $address;
    var $email;
    var $comment;

    public function __construct($dict) {
        $this->id = $dict['id'];
        $this->first_name = $dict['first_name'];
        $this->surname = $dict['surname'];
        $this->patronymic = $dict['patronymic'];
        $this->gender = $dict['gender'];
        $this->birth_date = $dict['birth_date'];
        $this->phone_number = $dict['phone_number'];
        $this->address = $dict['address'];
        $this->email = $dict['email'];
        $this->comment = $dict['comment'];
    }

    public function get_array() {
        if ($this->id)
            return [
                $this->id,
                $this->first_name,
                $this->surname,
                $this->patronymic,
                $this->gender,
                $this->birth_date,
                $this->phone_number,
                $this->address,
                $this->email,
                $this->comment
            ];
        return [
            $this->first_name,
            $this->surname,
            $this->patronymic,
            $this->gender,
            $this->birth_date,
            $this->phone_number,
            $this->address,
            $this->email,
            $this->comment
        ];
    }
}
