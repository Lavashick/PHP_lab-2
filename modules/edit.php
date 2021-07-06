<?php
include 'services/db_service.php';
$db = new db_service();

$is_error_sent = false;

if ($_POST['is_hidden']) {
    $contact = new Contact([]);

    $contact->id = $_POST['id'];
    $contact->surname = $_POST['surname'];
    $contact->first_name = $_POST['first_name'];
    $contact->patronymic = $_POST['patronymic'];

    $contact->gender = $_POST['gender'];
    $contact->birth_date = $_POST['birth_date'];

    $contact->email = $_POST['email'];
    $contact->phone_number = $_POST['phone'];

    $contact->address = $_POST['address'];
    $contact->comment = $_POST['comment'];

    $is_created = $db->update_contact($contact);

    if (is_bool($is_created) && $is_created) {
        echo '<h4 style="color:green">'.'Контакт успешно изменен'.'</h4>';
    } else {
        if ($is_created)
            echo '<h4 style="color:red">'.$is_created.'</h4>';
        else
            echo '<h4 style="color:red">Произошла ошибка</h4>';
    }
}

$contacts = $db->get_contacts();
if (!is_array($contacts) && !$is_error_sent) {
    $is_error_sent = true;
    echo '<h4 style="color: red">'.$contacts.'</h4>';
}

$selected_contact = null;

if (is_array($contacts)) {
    usort($contacts, function($a, $b) {return strcmp($a->surname.$a->first_name, $b->surname.$b->first_name);});
    $id = $_GET['id'];
    echo '<ul>';
    for ($i = 0; $i < count($contacts); $i++) {
        $contact = $contacts[$i];
        $text = $contact->surname . ' ' .
                mb_substr($contact->first_name, 0, 1) . '. ' .
                mb_substr($contact->patronymic, 0, 1) . '.';
        $li = '<li>';
        if ($id == $contact->id) {
            $selected_contact = $contact;
            $li .= '<span style="color:red">'.$text.'</span>';
        } else {
            $href = '?p=edit&id='.$contact->id;
            $li .= '<a href="'.$href.'">'.$text.'</a>';
        }
        $li .= '</li>';
        echo $li;
    }
    echo '</ul>';
}
?>

<form class="form" action="?p=edit" method="post">
    <input type="hidden" value="true" name="is_hidden">
    <?php if ($selected_contact != null)
        echo '<input type="hidden" value="'.$selected_contact->id.'" name="id">';
    ?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputSurname">Фамилия</label>
            <input type="text" class="form-control" id="inputSurname" placeholder="Иванов" name="surname"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->surname.'"' ?>
                   required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputFirstName">Имя</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="Иван" name="first_name"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->first_name.'"' ?>
                   required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPatronymic">Отчество</label>
            <input type="text" class="form-control" id="inputPatronymic" placeholder="Иванович" name="patronymic"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->patronymic.'"' ?>
                   required>
        </div>
    </div>
    <div class="form-group" aria-required="true">
        <label for="radioGender" class="mr-2">Пол</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="radioGenderMale" value="male" required
                <?php if ($selected_contact != null && $selected_contact->gender == 'male') echo ' checked' ?>>
            <label class="form-check-label" for="radioGenderMale">М</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="radioGenderFemale" value="female"
                <?php if ($selected_contact != null && $selected_contact->gender == 'female') echo ' checked' ?>>
            <label class="form-check-label" for="radioGenderFemale">Ж</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputMail">Почта</label>
            <input type="email" class="form-control" id="inputMail" placeholder="example@mail.ru" name="email"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->email.'"' ?>
                   required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPhone">Телефон</label>
            <input type="text" class="form-control" id="inputPhone" placeholder="+7(999)999-99-99" name="phone"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->phone_number.'"' ?>
                   pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Адрес</label>
        <textarea class="form-control" id="inputAddress" name="address" rows="3" required><?php if ($selected_contact != null) echo $selected_contact->address ?></textarea>
    </div>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Дата рождения</label>
        <div class="col-10">
            <input class="form-control" type="date" id="example-date-input" name="birth_date"
                <?php if ($selected_contact != null) echo 'value="'.$selected_contact->birth_date.'"' ?>
                   required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputComment">Дополнительный комментарий</label>
        <textarea class="form-control" id="inputComment" name="comment" rows="3"><?php if ($selected_contact != null) echo $selected_contact->comment ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Изменить</button>
</form>
