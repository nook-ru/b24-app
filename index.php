<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Тест");

$grid_options = new Bitrix\Main\Grid\Options('test-grid');
$sort = $grid_options->GetSorting(['sort' => ['ID' => 'DESC'], 'vars' => ['by' => 'by', 'order' => 'order']]);
$nav_params = $grid_options->GetNavParams();

$nav = new Bitrix\Main\UI\PageNavigation('test-grid');
$nav->allowAllRecords(true)
    ->setPageSize($nav_params['nPageSize'])
    ->initFromUri();

$list = [
    ['data' => [
        'ID' => 1,
        'DATE' => ConvertTimeStamp(),
        'AMOUNT' => 123.11,
    ]],
    ['data' => [
        'ID' => 2,
        'DATE' => ConvertTimeStamp(),
        'AMOUNT' => 234.11,
    ]],
    ['data' => [
        'ID' => 3,
        'DATE' => ConvertTimeStamp(),
        'AMOUNT' => 345.11,
    ]],
];

?>
<? $APPLICATION->IncludeComponent(
    'bitrix:main.ui.grid',
    '',
    [
        'GRID_ID' => "test-grid",
        'COLUMNS' => [
            ['id' => 'ID', 'name' => 'ID', 'sort' => 'ID', 'default' => true], 
            ['id' => 'DATE', 'name' => 'Дата', 'sort' => 'DATE', 'default' => true], 
            ['id' => 'AMOUNT', 'name' => 'Сумма', 'sort' => 'AMOUNT', 'default' => true], 
        ], 
        'ROWS' => $list,
        'NAV_OBJECT' => $nav, 
        "ALLOW_PIN_HEADER" => true,
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        'AJAX_ID' => \CAjax::getComponentID('bitrix:main.ui.grid', '.default', ''),
        'AJAX_LOADER' => null,
        'SHOW_CHECK_ALL_CHECKBOXES' => true,
        'SHOW_ROW_ACTIONS_MENU'     => true,
        'SHOW_GRID_SETTINGS_MENU'   => true,
        'SHOW_SELECTED_COUNTER'     => true,
        'SHOW_TOTAL_COUNTER'        => true,
        'SHOW_PAGESIZE'             => true,
        'SHOW_ACTION_PANEL'         => true,
        'SHOW_ROW_CHECKBOXES'       => true,
        'PAGE_SIZES' => [
            ['NAME' => '10', 'VALUE' => '10'],
            ['NAME' => '20', 'VALUE' => '20'],
            ['NAME' => '30', 'VALUE' => '30'],
            ['NAME' => '50', 'VALUE' => '50'],
        ],
    ],
    null,
    ['HIDE_ICONS' => 'Y',]
); ?>

<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>
