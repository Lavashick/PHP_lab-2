<?php

include_once 'models/contact.php';

class db_service
{
    static private $host = 'std-mysql.ist.mospolytech.ru';
    static private $username = 'std_846_php';
    static private $password = 'fhFwt135mK';
    static private $database = 'std_846_php';

    static private $contacts_table = 'contacts';

    private $mysqli;

    private function create_contact_sql_array(Contact $contact) {
        $sql = '';
        $sql .= (($contact->id) ? $contact->id : 'null').', ';
        $sql .= '\''.$contact->first_name.'\''.', ';
        $sql .= '\''.$contact->surname.'\''.', ';
        $sql .= '\''.$contact->patronymic.'\''.', ';
        $sql .= '\''.$contact->gender.'\''.', ';
        $sql .= '\''.$contact->birth_date.'\''.', ';
        $sql .= '\''.$contact->phone_number.'\''.', ';
        $sql .= '\''.$contact->address.'\''.', ';
        $sql .= '\''.$contact->email.'\''.', ';
        $sql .= '\''.$contact->comment.'\'';
        return $sql;
    }

    public function __construct() {
        $this->mysqli = mysqli_connect(db_service::$host, db_service::$username, db_service::$password, db_service::$database);
        mysqli_set_charset($this->mysqli, "utf8");
    }

    public function get_contacts() {
        if( !$this->mysqli )
            return 'Ошибка подключения к БД: ' . mysqli_connect_error();

        $sql_res = $this->mysqli->query('SELECT * FROM '.db_service::$contacts_table);
        $contacts = [];
        while ($row = mysqli_fetch_assoc($sql_res))
            array_push($contacts, new Contact($row));
        return $contacts;
    }

    public function remove_contact_by_id($id) {
        if( !$this->mysqli )
            return 'Ошибка подключения к БД: ' . mysqli_connect_error();
        return $this->mysqli->query('DELETE FROM '.db_service::$contacts_table.' WHERE id='.$id);
    }

    public function create_new_contact($contact) {
        if( !$this->mysqli )
            return 'Ошибка подключения к БД: ' . mysqli_connect_error();

        $contact_info = $this->create_contact_sql_array($contact);
        return $this->mysqli->query('INSERT INTO '.db_service::$contacts_table.' VALUES ('.$contact_info.')');
    }

    public function update_contact($contact) {
        if( !$this->mysqli )
            return 'Ошибка подключения к БД: ' . mysqli_connect_error();

        return $this->mysqli->query('UPDATE '.db_service::$contacts_table.' SET
            first_name = \''.$contact->first_name.'\',
            surname = \''.$contact->surname.'\',
            patronymic = \''.$contact->patronymic.'\',
            gender = \''.$contact->gender.'\',
            birth_date = \''.$contact->birth_date.'\',
            phone_number = \''.$contact->phone_number.'\',
            address = \''.$contact->address.'\',
            email = \''.$contact->email.'\',
            comment = \''.$contact->comment.'\'
            WHERE id = '.$contact->id
        );
    }
}
