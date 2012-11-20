<div id="calculator">
	<div class="plashka-top">
		<div class="title">Калькулятор металла</div>
	</div>
	<div class="plashka-body">
		<div class="result">
			<div class="glass"></div>
			<div class="result-container">
				<span class="kg">кг</span>
				<span id="result">0</span>
				<div class="clear"></div>
			</div>
		</div>
		<div class="operand">
			<div id="metall" class="select form_line">
				<span>Выберите металл (сплав)</span>
				<select id="metal_select" onchange="makeAlloysList(this.value);">
					
				</select>
			</div>
			<div id="alloy" class="select form_line">
				<span>Выберите марку</span>
				<select id="mark_select">
					
				</select>
			</div>
			<div id="product_type" class="radio  form_line">
				<input type="radio" class="radio" name="radio_1" value="1" />
				<label>Листопрокат</label>
				<input type="radio" class="radio" name="radio_1" value="2" />
				<label>Прессоволочение</label>
			</div>
			
			<div id="dimentions" class = "dimentions">
				<div class="title">Укажите размеры</div>
				<div class="element">
					<span class="title">Ширина</span>
					<input name = "width" type="text" >
					<span class="dim">mm</span>
					<div class="clear"></div>
				</div>
				<div class="element">
					<span class="title">Ширина</span>
					<input name = "width" type="text" >
					<span class="dim">mm</span>
					<div class="clear"></div>
				</div>
				<div class="element">
					<span class="title">Ширина</span>
					<input name = "width" type="text" >
					<span class="dim">mm</span>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="plashka-bottom">
		<a href="#" onclick="">Рассчитать</a>
	</div>
</div>

<script>
var metals = {
	"zinc":'Цинк', 
	"copper":'Медь', 
	"brass":'Латунь', 
	"stainless-steel":'Нержавеющая сталь', 
	"aluminum":'Алюминий', 
	"bronze":'Бронза'
};

var marks = {
	"zinc":{
		"6.92":'Ц0'	
	},
	"copper":{
		"8.94":'M1',
		"8.94":'M2',
		"8.94":'M3'
	}, 
	"brass":{
		"8.47":'Л63',
		"8.47":'Л68',
		"8.45":'ЛС59-1'
	}, 
	"stainless-steel":{
		"7.90":'AISI 304',
		"7.95":'AISI 321'
	},
	"aluminum":{
		"2.85":'B95',
		"2.79":'Д16',
		"2.79":'Д1',
		"2.66":'АМГ',
		"2.72":'АМЦ',
		"2.7":'АД',
		"2.7":'АД1',
		"2.71":'А5',
		"2.7":'ВД1',
		"2.75":'АК6',
		"2.77":'АК4'
	},
	"bronze":{
		"8.80":'БрОЦС5-5-5',
		"7.50":'БрАЖ9-4',
		"8.80":'БрОФ7-0.2',
		"8.80":'БрОФ4-0.25',
		"8.47":'БрКМЦ3-1',
		"7.50":'БрАЖМц10-3-1.5',
		"7.50":'БрАМц9-2',
		"7.50":'БрАЖН10-4-4',
		"7.50":'БрАЖНМц',
		"7.80":'БрБ2'
	}
};

function makeAlloysList(metal)
{
	$('#mark_select').removeData();
	var mark = marks[metal];
	console.log(mark);
	for (var key in mark) {
		console.log(mark[key]);
		$('#mark_select').append('<option value="' + key + '">' + mark[key] + '</option>');
	}
	return false;
}

function initCalculator()
{
	var i = 0;
	for (var key in metals) {
		if (i == 0) {
			$('#metal_select').append('<option value="' + key + '">' + metals[key] + '</option>');
			makeAlloysList(key);
		} else {
			$('#metal_select').append('<option value="' + key + '">' + metals[key] + '</option>');
		} 

		i++;
	}
	return false;
}

initCalculator();


$(function(){
	initCustomForms();
});

// custom forms init
function initCustomForms() {
	$('select').customSelect();
	$('input:radio').customRadio();
	$('input:checkbox').customCheckbox();
}

// custom forms plugin
;(function(jQuery){
	// custom checkboxes module
	jQuery.fn.customCheckbox = function(_options){
		var _options = jQuery.extend({
			checkboxStructure: '<div></div>',
			checkboxDisabled: 'disabled',
			checkboxDefault: 'checkboxArea',
			checkboxChecked: 'checkboxAreaChecked',
			filterClass:'default'
		}, _options);
		return this.each(function(){
			var checkbox = jQuery(this);
			if(!checkbox.hasClass('outtaHere') && checkbox.is(':checkbox') && !checkbox.hasClass(_options.filterClass)){
				var replaced = jQuery(_options.checkboxStructure);
				this._replaced = replaced;
				if(checkbox.is(':disabled')) replaced.addClass(_options.checkboxDisabled);
				else if(checkbox.is(':checked')) replaced.addClass(_options.checkboxChecked);
				else replaced.addClass(_options.checkboxDefault);

				replaced.click(function(){
					if(checkbox.is(':checked')) checkbox.removeAttr('checked');
					else checkbox.attr('checked', 'checked');
					changeCheckbox(checkbox);
				});
				checkbox.click(function(){
                    changeCheckbox(checkbox);
                    if(!checkbox.is(':checked')) checkbox.removeAttr('checked');
					else checkbox.attr('checked', 'checked');
				});
				checkbox.click(function(){
					changeCheckbox(checkbox);
				});
				replaced.insertBefore(checkbox);
				checkbox.addClass('outtaHere');
			}
		});
		function changeCheckbox(_this){
			_this.change();
			if(_this.is(':checked')) _this.get(0)._replaced.removeClass().addClass(_options.checkboxChecked);
			else _this.get(0)._replaced.removeClass().addClass(_options.checkboxDefault);
		}
	}

	// custom radios module
	jQuery.fn.customRadio = function(_options){
		var _options = jQuery.extend({
			radioStructure: '<div></div>',
			radioDisabled: 'disabled',
			radioDefault: 'radioArea',
			radioChecked: 'radioAreaChecked',
			filterClass:'default'
		}, _options);
		return this.each(function(){
			var radio = jQuery(this);
			if(!radio.hasClass('outtaHere') && radio.is(':radio') && !radio.hasClass(_options.filterClass)){
				var replaced = jQuery(_options.radioStructure);
				this._replaced = replaced;
				if(radio.is(':disabled')) replaced.addClass(_options.radioDisabled);
				else if(radio.is(':checked')) replaced.addClass(_options.radioChecked);
				else replaced.addClass(_options.radioDefault);
				replaced.click(function(){
					if(jQuery(this).hasClass(_options.radioDefault)){
						radio.attr('checked', 'checked');
						changeRadio(radio.get(0));
					}
				});
				radio.click(function(){
					if(!jQuery(this).hasClass(_options.radioDefault)){
						radio.attr('checked', 'checked');
						changeRadio(radio.get(0));
					}
				});
				radio.click(function(){
					changeRadio(this);
				});
				replaced.insertBefore(radio);
				radio.addClass('outtaHere');
			}
		});
		function changeRadio(_this){
			jQuery(_this).change();
			jQuery('input:radio[name='+jQuery(_this).attr("name")+']').not(_this).each(function(){
				if(this._replaced && !jQuery(this).is(':disabled')) this._replaced.removeClass().addClass(_options.radioDefault);
                $(this).removeAttr('checked');
			});
			_this._replaced.removeClass().addClass(_options.radioChecked);
		}
	}

	// custom selects module
	jQuery.fn.customSelect = function(_options) {
		var _options = jQuery.extend({
			selectStructure: '<div class="selectArea"><span class="left"></span><span class="center"></span><a href="#" class="selectButton"></a><div class="disabled"></div></div>',
			hideOnMouseOut: false,
			copyClass: true,
			selectText: '.center',
			selectBtn: '.selectButton',
			selectDisabled: '.disabled',
			optStructure: '<div class="optionsDivVisible"><div class="select-center"><ul></ul></div></div>',
			optList: 'ul',
			filterClass:'default'
		}, _options);
		return this.each(function() {
			var select = jQuery(this);
			if(!select.hasClass('outtaHere') && !select.hasClass(_options.filterClass)) {
				if(select.is(':visible')) {
					var hideOnMouseOut = _options.hideOnMouseOut;
					var copyClass = _options.copyClass;
					var replaced = jQuery(_options.selectStructure);
					var selectText = replaced.find(_options.selectText);
					var selectBtn = replaced.find(_options.selectBtn);
					var selectDisabled = replaced.find(_options.selectDisabled).hide();
					var optHolder = jQuery(_options.optStructure);
					var optList = optHolder.find(_options.optList);
					if(copyClass) optHolder.addClass('drop-'+select.attr('class'));

					if(select.attr('disabled')) selectDisabled.show();
					select.find('option').each(function(){
						var selOpt = jQuery(this);
						var _opt = jQuery('<li><a href="#">' + selOpt.html() + '</a></li>');
						if(selOpt.attr('selected')) {
							selectText.html(selOpt.html());
							_opt.addClass('selected');
						}
						_opt.children('a').click(function() {
							optList.find('li').removeClass('selected');
							select.find('option').removeAttr('selected');
							jQuery(this).parent().addClass('selected');
							selOpt.attr('selected', 'selected');
							selectText.html(selOpt.html());
							select.change();
							optHolder.hide();
							return false;
						});
						optList.append(_opt);
					});
					replaced.width(select.outerWidth());
					replaced.insertBefore(select);
					optHolder.css({
						width: select.outerWidth(),
						display: 'none',
						position: 'absolute'
					});
					jQuery(document.body).append(optHolder);

					var optTimer;
					replaced.hover(function() {
						if(optTimer) clearTimeout(optTimer);
					}, function() {
						if(hideOnMouseOut) {
							optTimer = setTimeout(function() {
								optHolder.hide();
							}, 200);
						}
					});
					optHolder.hover(function(){
						if(optTimer) clearTimeout(optTimer);
					}, function() {
						if(hideOnMouseOut) {
							optTimer = setTimeout(function() {
								optHolder.hide();
							}, 200);
						}
					});
					selectBtn.click(function() {
						if(optHolder.is(':visible')) {
							optHolder.hide();
						}
						else{
							if(_activeDrop) _activeDrop.hide();
							optHolder.find('ul').css({height:'auto', overflow:'hidden'});
							optHolder.css({
								top: replaced.offset().top + replaced.outerHeight(),
								left: replaced.offset().left,
								display: 'block'
							});
							//if(optHolder.find('ul').height() > 200) optHolder.find('ul').css({height:200, overflow:'auto'});
							_activeDrop = optHolder;
						}
						return false;
					});
					replaced.addClass(select.attr('class'));
					select.addClass('outtaHere');
				}
			}
		});
	}

	// event handler on DOM ready
	var _activeDrop;
	jQuery(function(){
		jQuery('body').click(hideOptionsClick)
		jQuery(window).resize(hideOptions)
	});
	function hideOptions() {
		if(_activeDrop && _activeDrop.length) {
			_activeDrop.hide();
			_activeDrop = null;
		}
	}
	function hideOptionsClick(e) {
		if(_activeDrop && _activeDrop.length) {
			var f = false;
			jQuery(e.target).parents().each(function(){
				if(this == _activeDrop) f=true;
			});
			if(!f) {
				_activeDrop.hide();
				_activeDrop = null;
			}
		}
	}
})(jQuery);
</script>