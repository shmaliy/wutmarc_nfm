<?php $this->headTitle($this->item['title']); ?>
<div class="index-container">
	<div class="left">
		<h1>Калькулятор металла</h1>
		<div style="" id="forms">
			<div id="metal_title">
				<span>Выберите металл</span>
				<select name="metall" id="metall">
					<option value="0">Выберите</option>
					<option value="zinc">Цинк</option>
					<option value="copper">Медь</option>
					<option value="brass">Латунь</option>
					<option value="stainless-steel">Нержавеющая сталь</option>
					<option value="aluminum">Алюминий</option>
					<option value="bronze">Бронза</option>
				</select>
			</div>
			<hr />
			<div id="zinc">
				<span>Выберите сплав цинка</span>
				<select name="zinc" id="zinc">
					<option value="0">Выберите</option>
					<option value="6.92">Ц0</option>
				</select>
			</div>	
			
			<div id="copper">
				<span>Выберите сплав меди</span>
				<select name="copper" id="copper">
					<option value="0">Выберите</option>
					<option value="8.94">M1</option>
					<option value="8.94">M2</option>
					<option value="8.94">M3</option>
				</select>
			</div>	
			
			<div id="brass">
				<span>Выберите сплав латуни</span>
				<select name="brass" id="brass">
					<option value="0">Выберите</option>
					<option value="8.47">Л63</option>
					<option value="8.47">Л68</option>
					<option value="8.45">ЛС59-1</option>
				</select>
			</div>	
			
			<div id="stainless-steel">
				<span>Выберите сплав нержавеющей стали</span>
				<select name="stainless-steel" id="stainless-steel">
					<option value="0">Выберите</option>
					<option value="7.90">AISI 304</option>
					<option value="7.95">AISI 321</option>
				</select>
			</div>	
			
			<div id="aluminum">
				<span>Выберите сплав алюминия</span>
				<select name="aluminum" id="aluminum">
					<option value="0">Выберите</option>
					<option value="2.85">B95</option>
					<option value="2.79">Д16</option>
					<option value="2.79">Д1</option>
					<option value="2.66">АМГ </option>
					<option value="2.72">АМЦ</option>
					<option value="2.7">АД</option>
					<option value="2.7">АД1</option>
					<option value="2.71">А5</option>
					<option value="2.7">ВД1</option>
					<option value="2.75">АК6</option>
					<option value="2.77">АК4</option>
				</select>
			</div>
			
			<div id="bronze">
				<span>Выберите сплав бронзы</span>
				<select id="bronze" name="bronze">
					<option value="0">Выберите</option>
					<option value="0">Выберите</option>
					<option value="8.80">БрОЦС5-5-5</option>
					<option value="7.50">БрАЖ9-4</option>
					<option value="8.80">БрОФ7-0.2</option>
					<option value="8.80">БрОФ4-0.25 </option>
					<option value="8.47">БрКМЦ3-1</option>
					<option value="7.50">БрАЖМц10-3-1.5</option>
					<option value="7.50">БрАМц9-2</option>
					<option value="7.50">БрАЖН10-4-4</option>
					<option value="7.50">БрАЖНМц</option>
					<option value="7.80">БрБ2</option>
				</select>
			</div>			
			<hr />
			
			<div id="prokat_details">
				<span>Тип проката</span>
				<div>
					<span>Листопрокат</span>
					<select id="listoprokat" name="listoprokat">
						<option value="0">Выберите</option>
						<option value="1">Лист</option>
						<option value="2">Плита</option>
						<option value="3">Лента</option>
					</select>
				</div>
				<div>
					<span>Прессоволочение</span>
					<select id="pressovolochenie" name="pressovolochenie">
						<option value="0">Выберите</option>
						<option value="2">Круг</option>
						<option value="5">Квадрат</option>
						<option value="3">Шестигранник</option>
						<option value="4">Труба</option>
						<option value="2">Проволока </option>
					</select>
				</div>
			</div>
			<hr />
			
			<div id="sizes">
				<span>Размеры</span>
				<div id="pr_2">
					<div>
						Диаметр <input id="pr_2_diam" name="pr_2_diam" value="" maxlength="12" onkeyup="">
					</div>
					<div>
						Длина <input id="pr_2_length" name="pr_2_diam" value="" maxlength="12" onkeyup="">
					</div>
				</div>
				<div id="pr_3">
					<div>
						Сечение <input id="pr_3_sech" name="pr_3_diam" value="" maxlength="12" onkeyup="">
					</div>
					<div>
						Длина <input id="pr_3_length" name="pr_3_diam" value="" maxlength="12" onkeyup="">
					</div>
				</div>
				<div id="pr_4">
					<div>
						Диаметр <input id="pr_4_diam" name="pr_4_diam" value="" maxlength="12" onkeyup="">
					</div>
					<div>
						Толщина стенки <input id="pr_4_width" name="pr_4_width" value="" maxlength="12" onkeyup="">
					</div>
					<div>
						Длина <input id="pr_4_length" name="pr_4_diam" value="" maxlength="12" onkeyup="">
					</div>
				</div>
				<div id="pr_5">
					<div>
						Сечение <input id="pr_5_sech" name="pr_5_diam" value="" maxlength="12" onkeyup="">
					</div>
					<div>
						Длина <input id="pr_5_length" name="pr_5_diam" value="" maxlength="12" onkeyup="">
					</div>
				</div>
			</div>
		
		</div>
		
		<div id="calc_container">
		
		
		</div>
		
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
</div>
<script>
(function( $ ) {

	var first_form = $('#metal_title');
	
	var methods = {
		init: function () {
			$('#forms').hide();	
			first_form.clone().appendTo('#calc_container');
		},
	};
	
	$.fn.calculator = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );



$(document).ready(function(){
	$(document).calculator();
});
	
</script>

