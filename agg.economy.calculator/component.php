<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$arResult["E_CALCULATOR"] = array();

if (isset($arParams["AGG_GAS_COST"]) && !empty($arParams["AGG_GAS_COST"]))
	$arResult["E_CALCULATOR"]["AGG_GAS_COST"] = array(
		"CONTENT" => $arParams["AGG_GAS_COST"]
	);

if (isset($arParams["AGG_PROPAN_COST"]) && !empty($arParams["AGG_PROPAN_COST"]))
	$arResult["E_CALCULATOR"]["AGG_PROPAN_COST"] = array(
		"CONTENT" => $arParams["AGG_PROPAN_COST"]
	);

	if (isset($arParams["AGG_CAR_RATE"]) && !empty($arParams["AGG_CAR_RATE"]))
	$arResult["E_CALCULATOR"]["AGG_CAR_RATE"] = array(
		"CONTENT" => $arParams["AGG_CAR_RATE"]
	);

	if (isset($arParams["AGG_CAR_MILEAGE"]) && !empty($arParams["AGG_CAR_MILEAGE"]))
	$arResult["E_CALCULATOR"]["AGG_CAR_MILEAGE"] = array(
		"CONTENT" => $arParams["AGG_CAR_MILEAGE"]
	);

$this->IncludeComponentTemplate();
?>