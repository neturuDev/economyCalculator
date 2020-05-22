<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("ECONOMY_CALCULATOR_TITLE"),
	"DESCRIPTION" => GetMessage("ECONOMY_CALCULATOR_DESCR"),
	"ICON" => "/images/user_authform.gif",
	"PATH" => array(
		"ID" => GetMessage("ECONOMY_CALCULATOR"),
		"CHILD" => array(
			"ID" => "economy-calculator",
			"NAME" => GetMessage("ECONOMY_CALCULATOR_TITLE")
		)
	),
);
?>