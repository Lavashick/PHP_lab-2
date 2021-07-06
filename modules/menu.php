<?php
$nav = [
    [
        "title" => "Просмотр",
        "key" => "p",
        "value" => "viewer",
        "sub" => [
            [
                "title" => "По-умолчанию",
                "key" => "sort",
                "value" => "byid"
            ],
            [
                "title" => "По фамилии",
                "key" => "sort",
                "value" => "fam"
            ]
        ]
    ],
    [
        "title" => "Добавление записи",
        "key" => "p",
        "value" => "add"
    ],
    [
        "title" => "Редактирование записи",
        "key" => "p",
        "value" => "edit"
    ],
    [
        "title" => "Удаление записи",
        "key" => "p",
        "value" => "delete"
    ]
];

$flag = false;
foreach ($nav as $item) {
    if ($item['key'] == 'p' && $item['value'] == $_GET['p']) {
        $flag = true;
        break;
    }
}
if(!$flag) $_GET['p'] = 'viewer';

if (!$_GET['page']) $_GET['page'] = 1;

function get_nav($data, $href) {
    $ul = '<ul class="navbar-nav mt-2">';
    foreach ($data as $val) {
        $li = '<li class="nav-item ml-4">';
        $is_selected = $_GET[$val['key']] == $val['value'];
        $btn_type = $is_selected ? 'danger' : 'primary';
        $n_href = $href.((substr($href, -1) === '/' || $href === '') ? '?' : '&');
        $n_href .= $val['key'] . '=' . $val['value'];
        if ($val['value'] == 'viewer')
            $n_href .= '&page='.($_GET['page'] ? $_GET['page'] : '1');
        $li .= '<a class="btn btn-' . $btn_type . '" href="' . $n_href . '" role="button">' . $val['title'] . '</a>';

        if ($val['sub'])
            $li .= get_nav($val['sub'], $n_href);

        $ul .= $li.'</li>';
    }
    return $ul.'</ul>';
}
?>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <?php echo get_nav($nav, '') ?>
    </div>
</nav>
