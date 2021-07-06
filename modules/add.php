<?php

include 'models/contact.php';
include 'services/db_service.php';

$db = new db_service();

$is_created = null;

if ($_POST['is_hidden']) {
    $contact = new Contact([]);

    $contact->surname = $_POST['surname'];
    $contact->first_name = $_POST['first_name'];
    $contact->patronymic = $_POST['patronymic'];

    $contact->gender = $_POST['gender'];
    $contact->birth_date = $_POST['birth_date'];

    $contact->email = $_POST['email'];
    $contact->phone_number = $_POST['phone'];

    $contact->address = $_POST['address'];
    $contact->comment = $_POST['comment'];

    $is_created = $db->create_new_contact($contact);

    if (is_bool($is_created) && $is_created) {
        echo '<h4 style="color:green">'.'Контакт успешно создан'.'</h4>';
    } else {
        if ($is_created)
            echo '<h4 style="color:red">'.$is_created.'</h4>';
        else
            echo '<h4 style="color:red">Произошла ошибка</h4>';
    }
}

?>

<form class="form" action="?p=add" method="post">
    <input type="hidden" value="true" name="is_hidden">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputSurname">Фамилия</label>
            <input type="text" class="form-control" id="inputSurname" placeholder="Иванов" name="surname" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputFirstName">Имя</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="Иван" name="first_name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPatronymic">Отчество</label>
            <input type="text" class="form-control" id="inputPatronymic" placeholder="Иванович" name="patronymic" required>
        </div>
    </div>
    <div class="form-group">
        <label for="radioGender" class="mr-2">Пол</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="radioGenderMale" value="male" required>
            <label class="form-check-label" for="radioGenderMale">М</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="radioGenderFemale" value="female">
            <label class="form-check-label" for="radioGenderFemale">Ж</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputMail">Почта</label>
            <input type="email" class="form-control" id="inputMail" placeholder="example@mail.ru" name="email" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPhone">Телефон</label>
            <input type="text" class="form-control" id="inputPhone" placeholder="+7(999)999-99-99" name="phone" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Адрес</label>
        <textarea class="form-control" id="inputAddress" name="address" rows="3" required></textarea>
    </div>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Дата рождения</label>
        <div class="col-10">
            <input class="form-control" type="date" id="example-date-input" name="birth_date" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputComment">Дополнительный комментарий</label>
        <textarea class="form-control" id="inputComment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
