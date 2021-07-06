<?php
include 'services/db_service.php';
$db = new db_service();

$is_error_sent = false;

if ($_GET['id']) {
    $id = $_GET['id'];
    $surname = $_GET['surname'];
    $is_deleted = $db->remove_contact_by_id($id);
    if (!is_bool($is_deleted) && !$is_error_sent) {
        $is_error_sent = true;
        echo '<h4 style="color: red">'.$is_deleted.'</h4>';
    } else {
        echo '<h4 style="color: green">Запись с фамилией '.$surname.' удалена</h4>';
    }
}

$contacts = $db->get_contacts();
if (!is_array($contacts) && !$is_error_sent) {
    $is_error_sent = true;
    echo '<h4 style="color: red">'.$contacts.'</h4>';
}
if (is_array($contacts)) {
    echo '<ul>';
    for ($i = 0; $i < count($contacts); $i++) {
        $contact = $contacts[$i];
        echo '<li><a href="?p=delete&id='.$contact->id.'&surname='.$contact->surname.'">' .
            $contact->surname . ' ' .
            mb_substr($contact->first_name, 0, 1) . '. ' .
            mb_substr($contact->patronymic, 0, 1) . '.' . '
    </a></li>';
    }
    echo '</ul>';
}
