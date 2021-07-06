<?php

include 'services/db_service.php';

show_contacts($_GET['sort'], $_GET['page']);

function create_table($page_number, $contacts, $max_elements_on_page) {
    $ret = '<table class="table"><thead><tr>';
    $ret .= '<th>№</th>
             <th>Фамилия</th>
             <th>Имя</th>
             <th>Отчество</th>
             <th>Пол</th>
             <th>Дата рождения</th>
             <th>Почта</th>
             <th>Телефон</th>
             <th>Адрес</th>
             <th>Комментарий</th>';
    $ret .= '</tr></thead><tbody>';

    $from = ($page_number - 1) * $max_elements_on_page;
    for ($i = $from; $i < count($contacts) && $from + $max_elements_on_page > $i; $i++) {
        $contact = $contacts[$i];
        $ret.='<tr>
                   <th>'.($i + 1).'</th>
                   <td>'.$contact->surname.'</td>
                   <td>'.$contact->first_name.'</td>
                   <td>'.$contact->patronymic.'</td> 
                   <td>'.(($contact->gender == 'male') ? 'м' : 'ж').'</td>
                   <td>'.$contact->birth_date.'</td>
                   <td>'.$contact->email.'</td>
                   <td>'.$contact->phone_number.'</td>
                   <td>'.$contact->address.'</td> 
                   <td>'.$contact->comment.'</td>
               </tr>';
    }
    return $ret.'</tbody></table>';
}

function create_pagination($page_number, $pages_count, $sort_type) {
    $max_buttons = 2;
    $extreme_buttons = 1;
    $html = '<ul class="pagination justify-content-center">';
    $html .= '  <li class="page-item'.(($page_number == 1) ? ' disabled' : '').'">
                    <a class="page-link" href="/?p=viewer&page='.($page_number - 1).'&sort='.$sort_type.'" tabindex="-1">Previous</a>
                </li>';
    $flag = false;
    for ($i = 1; $i <= $pages_count; $i++) {
        if ($i > $extreme_buttons && $i < $pages_count - $extreme_buttons + 1 && abs($i - $page_number) > $max_buttons) {
            $flag = true;
            continue;
        }
        if ($flag) {
            $html .= '<li class="page-item disabled"><a class="page-link">...</a></li>';
            $flag = false;
        }
        $href ='/?p=viewer&page='.$i.'&sort='.$sort_type;
        $html .= '<li class="page-item'.(($i == $page_number) ? ' active' : '').'">
                    <a class="page-link" href="'.$href.'">'.$i.'</a>
                  </li>';
    }
    $html .= '
    <li class="page-item'.(($page_number == $pages_count) ? ' disabled' : '').'">
      <a class="page-link" href="/?p=viewer&page='.($page_number + 1).'&sort='.$sort_type.'">Next</a>
    </li>';
    return $html.'</ul>';
}


function show_contacts($sort_type, $page) {
    $max_elements_on_page = 10;
    $db = new db_service();
    $contacts = $db->get_contacts();

    if (!is_array($contacts)) {
        echo '<h4 style="color:red">'.$contacts.'</h4>';
        return;
    }

    if (count($contacts) == 0) {
        echo '<h4>Данные отсутствует</h4>';
        return;
    }

    if ($sort_type == 'fam')
        usort($contacts, function($a, $b) {return strcmp($a->surname, $b->surname);});

    $rows_count = count($contacts);
    $pages_count = ceil($rows_count / $max_elements_on_page); // вычисляем общее количество страниц

    if( $page > $pages_count ) // если указана страница больше максимальной
        $page = $pages_count;
    if( $page < 0 || !is_numeric($page) )
        $page = 1;

    $ret = create_table($page, $contacts, $max_elements_on_page);

    if( $pages_count > 1 )
        $ret .= create_pagination($page, $pages_count, $sort_type);

    echo $ret;
}
