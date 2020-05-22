<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

$arComponentParameters = array(
	"PARAMETERS" => array(
		"AGG_GAS_COST" => array(
			"NAME" => GetMessage("GAS_COST"),
			"TYPE" => "STRING",
			"DEFAULT" => "27.5",
			"PARENT" => "BASE",
		),
		"AGG_PROPAN_COST" => array(
			"NAME" => GetMessage("PROPAN_COST"),
			"TYPE" => "STRING",
			"DEFAULT" => "11.5",
			"PARENT" => "BASE",
		),
		"AGG_CAR_RATE" => array(
			"NAME" => GetMessage("CAR_RATE"),
			"TYPE" => "STRING",
			"DEFAULT" => "9.5",
			"PARENT" => "BASE",
		),
		"AGG_CAR_MILEAGE" => array(
			"NAME" => GetMessage("CAR_MILEAGE"),
			"TYPE" => "STRING",
			"DEFAULT" => "15000",
			"PARENT" => "BASE",
		),
	),
);
?>