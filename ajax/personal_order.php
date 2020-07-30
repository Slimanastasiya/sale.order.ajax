<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $USER;

if(CModule::IncludeModule('iblock')) {
    if (!empty($_POST["name"])) {
        $el = new CIBlockElement;

        $PROP = array();
        $PROP['NAME'] = (!empty($_POST["name"]) ? $_POST["name"] : '');
        $PROP['EMAIL'] = (!empty($_POST["email"]) ? $_POST["email"] : '');
        $PROP['PHONE'] = (!empty($_POST["phone"]) ? $_POST["phone"] : '');
        $PROP['CITY'] = (!empty($_POST["city"]) ? $_POST["city"] : '');

        $elData = Array(
            "MODIFIED_BY"    => $USER->GetID(),
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"      => 29,
            "PROPERTY_VALUES"=> $PROP,
            "NAME"           => "{$PROP['NAME']}",
            "ACTIVE"         => "Y",
        );

        $id = $el->Add($elData);

        echo $id;
    } else {
        echo 'error';
    }
}