<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$this->setFrameMode(true);
$this->addExternalJs("/local/components/autogasglobal/agg.economy.calculator/vue.min.js");

if (is_array($arResult["E_CALCULATOR"]) && !empty($arResult["E_CALCULATOR"]))
{
?>

<section class="calculator_section">
	<div class="grid-container economy-calculator" id="calc-app">
		<div class="grid-x first-row">
			<div class="cell calc-item small-12 large-4">
				<h2 class="headline">Скільки ви можете зекономити?</h2>
			</div>
			<div class="cell small-12 medium-6 large-4 calc-item">
				<h3>Витрата автомобіля</h3>
				<div class="slidecontainer">
		<input step="0.5" type="range" min="7" max="25" :value="rashod" class="economy-slider" id="rashod" @input="changeRashod">
					</div>
					<div class="slider-data">
						{{ rashod }} л/100км
					</div>
				</div>
				<div class="cell small-12 medium-6 large-4 calc-item">
					<h3>Річний пробіг автомобіля</h3>
					<div class="slidecontainer">
		<input step="1000" type="range" min="10000" max="50000" v-model="probeg" class="economy-slider" id="probeg" @input="changeBenzin">
					</div>
					<div class="slider-data">
						{{ probeg }} км
					</div>
				</div>
			</div>

			<div class="grid-x second-row">
				<div class="cell small-12 medium-6 large-4 calc-item show-for-medium">
					<h3>Вартість бензину</h3>
					<div class="slidecontainer">
		<input step="0.1" type="range" min="25" max="35" :value="benzinPrice" class="economy-slider" @input="changeCostBenzin" id="probeg">
					</div>
					<div class="slider-data">
						{{ benzinPrice }} грн/л
					</div>
					<div class="info-data">
						Вартість за рік {{ benzinCost }} грн
					</div>
				</div>
				<div class="cell small-12 medium-6 large-4 calc-item">
					<h3><span class="show-for-medium">Вартість газу</span><span class="hide-for-medium">Газ</span></h3>
					<div class="slidecontainer show-for-medium">
		<input step="0.1" type="range" min="10" max="15" :value="gasPrice" class="economy-slider" id="probeg" @input="changeGas">
				</div>
				<div class="slider-data show-for-medium">
					{{ gasPrice }} грн/л
				</div>
				<div class="info-data show-for-medium">
					Вартість за рік {{ gasCost }} грн
				</div>
				<div class="economy-data">
					<div class="data-sub">
						Економія на рік
					</div>
					<div class="data">
						{{ gasEconomy }} грн
					</div>
				</div>
			</div>
			<div class="cell small-12 large-4 calc-item">
				<h3>Газ + бензин</h3>
				<div class="consumption show-for-medium">
					<p>
						Витрата пропану {{ gpRashodPropana }} л/100 км
					</p>
					<p>
						Витрата бензину {{ gpRashodBenzina }} л/100 км
					</p>
				</div>
				<div class="info-data show-for-medium">
					Вартість за рік {{ gasBenzCost }} грн
				</div>
				<div class="economy-data">
					<div class="data-sub">
						Економія на рік
					</div>
					<div class="data">
						{{ gasBenzEconomy }} грн
					</div>
				</div>
			</div>
		</div>
	</div>
 </section> <br>
<?
$rashodBenzinaGod = $arResult["E_CALCULATOR"]["AGG_CAR_MILEAGE"]["CONTENT"]*$arResult["E_CALCULATOR"]["AGG_CAR_RATE"]["CONTENT"]/100;
$rashodGasGod = $rashodBenzinaGod*1.2;

?>
    <script>
        new Vue({
            el: "#calc-app",
            data: {
                rashod: <?=$arResult["E_CALCULATOR"]["AGG_CAR_RATE"]["CONTENT"]?>,
                probeg: <?=$arResult["E_CALCULATOR"]["AGG_CAR_MILEAGE"]["CONTENT"]?>,
                benzinPrice: <?=$arResult["E_CALCULATOR"]["AGG_GAS_COST"]["CONTENT"]?>,
                gasPrice: <?=$arResult["E_CALCULATOR"]["AGG_PROPAN_COST"]["CONTENT"]?>,
                rashodBenzinaGod: <?=$rashodBenzinaGod?>,
                benzinCost: <?=round($arResult["E_CALCULATOR"]["AGG_GAS_COST"]["CONTENT"]*$rashodBenzinaGod)?>,
                rashodGasGod: <?=$rashodGasGod?>,
                gasCost: <?=round($arResult["E_CALCULATOR"]["AGG_PROPAN_COST"]["CONTENT"]*$rashodGasGod)?>,
                gasBenzCost: <?=round(($arResult["E_CALCULATOR"]["AGG_CAR_RATE"]["CONTENT"]*0.85*$arResult["E_CALCULATOR"]["AGG_PROPAN_COST"]["CONTENT"]+$arResult["E_CALCULATOR"]["AGG_CAR_RATE"]["CONTENT"]*0.2*$arResult["E_CALCULATOR"]["AGG_GAS_COST"]["CONTENT"])/100*$arResult["E_CALCULATOR"]["AGG_CAR_MILEAGE"]["CONTENT"])?>,
            },
            methods: {
                changeLitrovGod() {
					this.rashodBenzinaGod = this.probeg*this.rashod/100;
				},
				changeLitrovGasGod() {
					this.rashodGasGod = this.rashodBenzinaGod*1.2;
				},
				changeBenzinCost(){
					this.benzinCost = Math.round(this.benzinPrice*this.rashodBenzinaGod);
				},
				changeGasCost(){
					this.gasCost = Math.round(this.gasPrice*this.rashodGasGod);
				},
				changeGasBenzCost(){
					this.gasBenzCost = Math.round((this.rashod*0.85*this.gasPrice + this.rashod*0.2*this.benzinPrice)/100*this.probeg);
				},
				changeBenzinPrice($event) {
					let temp = ($event.target.value * 1);
					if (Math.trunc(temp) == temp){
					this.benzinPrice = (temp*1).toFixed(1);
					} else {
					this.benzinPrice = temp;
					}
				},
				changeGasPrice($event) {
					let temp = ($event.target.value * 1);
					if (Math.trunc(temp) == temp){
					this.gasPrice = (temp*1).toFixed(1);
					} else {
					this.gasPrice = temp;
					}
				},
				changeCarСonsumption($event) {
					let temp = ($event.target.value * 1);
					if (Math.trunc(temp) == temp){
					this.rashod = (temp*1).toFixed(1);
					} else {
					this.rashod = temp;
					}
				},
				changeRashod($event) {
					this.changeCarСonsumption($event);
					this.changeLitrovGod();
					this.changeBenzinCost();
					this.changeLitrovGasGod();
					this.changeGasCost();
					this.changeGasBenzCost();
				},
				changeBenzin() {
					this.changeLitrovGod();
					this.changeBenzinCost();
					this.changeLitrovGasGod();
					this.changeGasCost();
					this.changeGasBenzCost();
				},
				changeCostBenzin($event) {
					this.changeBenzinPrice($event);
					this.changeBenzinCost();
					this.changeGasBenzCost();
				},
				changeGas($event) {
					this.changeGasPrice($event);
					this.changeGasCost();
					this.changeGasBenzCost();
				}
            },
            computed:{
                gasEconomy() {
                return Math.round(this.benzinCost - this.gasCost);
                },
                gpRashodBenzina() {
                return (this.rashod*0.2).toFixed(2);
                },
                gpRashodPropana() {
                return (this.rashod*0.85).toFixed(2);
                },
                gasBenzEconomy() {
                return Math.round(this.benzinCost - this.gasBenzCost);
                },
            }
    });
    </script>

<?
unset($rashodBenzinaGod, $rashodGasGod);
}
?>