<div id="calculator">
	<div class="plashka-top">
		<div class="title"><?php echo CALCULATOR_TITLE;?></div>
	</div>
	<div class="plashka-body">
		<div class="result">
			<div class="glass"></div>
			<div class="result-container">
				<span class="kg"><?php echo CALCULATOR_KG; ?></span>
				<span id="result">0</span>
				<div class="clear"></div>
			</div>
		</div>
		<div class="operand">
			<div id="metall" class="select form_line">
				<span><?php echo CALCULATOR_SELECT_METAL; ?></span>
				<select id="metal_select" onchange="makeAlloysList(this.value);">
					
				</select>
			</div>
			<div id="alloy" class="select form_line">
				<span><?php echo CALCULATOR_SELECT_MARK; ?></span>
				<select id="mark_select">
					
				</select>
			</div>
			<div id="product_type" class="radio">
				<input type="radio" class="radio_item" name="product_type" value="listoprokat" onchange="makeTypesList(this.value);" />
				<label><?php echo CALCULATOR_SELECT_LISTOPROKAT; ?></label>
				<input type="radio" class="radio_item" name="product_type" value="pressovolochenie" onchange="makeTypesList(this.value);" />
				<label><?php echo CALCULATOR_SELECT_PRESSOVOLOCHENIE; ?></label>
				<div class="clear"></div>
				<div class="product_type_select">
					<span><?php echo CALCULATOR_PROKAT_TYPE; ?></span>
					<select id="product_type_select" onchange="makeDimentions(this.value);">
						
					</select>
				</div>
			</div>
			
			<div id="dimentions" class = "dimentions">
				<div class="title"><?php echo CALCULATOR_SET_DIMENTIONS; ?></div>
				<div id="dimentions-container">
					
				</div>
			</div>
		</div>
	</div>
	<div class="plashka-bottom">
		<a href="#" onclick="calculate(); return false;"><?php echo CALCULATOR_CALCULATE; ?></a>
	</div>
</div>

<script>
var metals = {
	"zinc":'<?php echo CALCULATOR_METALLS_ZINK; ?>', 
	"copper":'<?php echo CALCULATOR_METALLS_COPPER; ?>', 
	"brass":'<?php echo CALCULATOR_METALLS_BRASS; ?>', 
	"stainless-steel":'<?php echo CALCULATOR_METALLS_STAINLESS_STEEL; ?>', 
	"aluminum":'<?php echo CALCULATOR_METALLS_ALUBINIUM; ?>', 
	"bronze":'<?php echo CALCULATOR_METALLS_BRONZE; ?>'
};

var marks = {
	"zinc":{
		"0-6.92":'<?php echo CALCULATOR_METALLS_ZINK_Z0; ?>'	
	},
	"copper":{
		"0-8.94":'<?php echo CALCULATOR_METALLS_COPPER_M1; ?>',
		"1-8.94":'<?php echo CALCULATOR_METALLS_COPPER_M2; ?>',
		"2-8.94":'<?php echo CALCULATOR_METALLS_COPPER_M3; ?>'
	}, 
	"brass":{
		"0-8.47":'<?php echo CALCULATOR_METALLS_BRASS_L63; ?>',
		"1-8.47":'<?php echo CALCULATOR_METALLS_BRASS_L68; ?>',
		"2-8.45":'<?php echo CALCULATOR_METALLS_BRASS_LS59_1; ?>'
	}, 
	"stainless-steel":{
		"0-7.90":'AISI 304',
		"1-7.95":'AISI 321'
	},
	"aluminum":{
		"0-2.85":'<?php echo CALCULATOR_METALLS_ALUBINIUM_B95; ?>',
		"1-2.79":'<?php echo CALCULATOR_METALLS_ALUBINIUM_D1; ?>',
		"2-2.79":'<?php echo CALCULATOR_METALLS_ALUBINIUM_D16; ?>',
		"3-2.66":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AMG; ?>',
		"4-2.72":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AMC; ?>',
		"5-2.7":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AD; ?>',
		"6-2.7":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AD1; ?>',
		"7-2.71":'<?php echo CALCULATOR_METALLS_ALUBINIUM_A5; ?>',
		"8-2.7":'<?php echo CALCULATOR_METALLS_ALUBINIUM_BD1; ?>',
		"9-2.75":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AK6; ?>',
		"10-2.77":'<?php echo CALCULATOR_METALLS_ALUBINIUM_AK4; ?>'
	},
	"bronze":{
		"0-8.80":'<?php echo CALCULATOR_METALLS_BRONZE_BROCS55; ?>',
		"1-7.50":'<?php echo CALCULATOR_METALLS_BRONZE_BRAG94; ?>',
		"2-8.80":'<?php echo CALCULATOR_METALLS_BRONZE_BROF702; ?>',
		"3-8.80":'<?php echo CALCULATOR_METALLS_BRONZE_BROF4025; ?>',
		"4-8.47":'<?php echo CALCULATOR_METALLS_BRONZE_BRKMC31; ?>',
		"5-7.50":'<?php echo CALCULATOR_METALLS_BRONZE_BRAGMC10315; ?>',
		"6-7.50":'<?php echo CALCULATOR_METALLS_BRONZE_BRAMC92; ?>',
		"7-7.50":'<?php echo CALCULATOR_METALLS_BRONZE_BRAGN1044; ?>',
		"8-7.50":'<?php echo CALCULATOR_METALLS_BRONZE_BRAGNMC; ?>',
		"9-7.80":'<?php echo CALCULATOR_METALLS_BRONZE_BRB2; ?>'
	}
};

var product_types = {
	"listoprokat": {
		"sheet":'<?php echo CALCULATOR_PROKAT_TYPE_SHEET; ?>',
		"plate":'<?php echo CALCULATOR_PROKAT_TYPE_PLATE; ?>',
		"tape":'<?php echo CALCULATOR_PROKAT_TYPE_TAPE; ?>'
	},
	"pressovolochenie": {
		"circle":'<?php echo CALCULATOR_PROKAT_TYPE_CIRCLE; ?>',
		"square":'<?php echo CALCULATOR_PROKAT_TYPE_SQUARE; ?>',
		"hexahedron":'<?php echo CALCULATOR_PROKAT_TYPE_HEXAHEDRON; ?>',
		"pipe":'<?php echo CALCULATOR_PROKAT_TYPE_PIPE; ?>',
		"wire":'<?php echo CALCULATOR_PROKAT_TYPE_WIRE; ?>'
	}	
};

var dimentions = {
		"sheet":		{'height':'<?php echo CALCULATOR_SET_DIMENTIONS_HEIGHT; ?>', 'width':'<?php echo CALCULATOR_SET_DIMENTIONS_WIDTH; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"plate":		{'height':'<?php echo CALCULATOR_SET_DIMENTIONS_HEIGHT; ?>', 'width':'<?php echo CALCULATOR_SET_DIMENTIONS_WIDTH; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"tape":			{'height':'<?php echo CALCULATOR_SET_DIMENTIONS_HEIGHT; ?>', 'width':'<?php echo CALCULATOR_SET_DIMENTIONS_WIDTH; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"circle":		{'diametr':'<?php echo CALCULATOR_SET_DIMENTIONS_DIAMETR; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"square":		{'cross-section':'<?php echo CALCULATOR_SET_DIMENTIONS_CROSS_SECTION; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"hexahedron":	{'cross-section':'<?php echo CALCULATOR_SET_DIMENTIONS_CROSS_SECTION; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"pipe":			{'diametr':'<?php echo CALCULATOR_SET_DIMENTIONS_DIAMETR; ?>', 'wall-thickness':'<?php echo CALCULATOR_SET_DIMENTIONS_WALL_THIKNESS; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'},
		"wire":			{'diametr':'<?php echo CALCULATOR_SET_DIMENTIONS_DIAMETR; ?>', 'length':'<?php echo CALCULATOR_SET_DIMENTIONS_LENGTH; ?>'}
};

function calculate()
{
	var metal = $('#mark_select').val();
	metal = explode('-', metal);
	metal = metal[1];
	console.log(metal);

	var dim = $('#dimentions-container input');
	console.log(dim.length);

	var formula = $('#product_type_select').val();
	console.log(formula);

	for (var i = 0; i < dim.length; i++) {
		var field = dim[i];
		var value = Number($(field).val()) || 0;
		console.log(typeof(value));
		if (value <= 0 || typeof (value) != "number") {
			alert('Некорректно указаный размер!');
			return;
		}
		
	}

	if (formula == 'sheet' || formula == 'plate' || formula == 'tape') {
		var height = $('#dim_height').val();
		var width = $('#dim_width').val();
		var length = $('#dim_length').val();

		var volume = (height / 1000) * (width / 1000) * (length / 1000);
		console.log(volume);
		var massa = ((volume * metal)*1000).toFixed(3);
		console.log(massa);
	}

	if (formula == 'circle') {
		var diametr = $('#dim_diametr').val();
		var length = $('#dim_length').val();

		var volume = ((diametr / 2000) * (diametr / 2000) * Math.PI) * (length/1000);
		console.log(volume);
		var massa = ((volume * metal)*1000).toFixed(3);
		console.log(massa);
	}

	if (formula == 'square') {
		var crosssection = $('#dim_cross-section').val();
		var length = $('#dim_length').val();

		var volume = (crosssection / 1000) * (crosssection / 1000) * (length / 1000);
		console.log(volume);
		var massa = ((volume * metal)*1000).toFixed(3);
		console.log(massa);
	}

	if (formula == 'hexahedron') {
		var crosssection = $('#dim_cross-section').val();
		var length = $('#dim_length').val();

		var volume = 3*(crosssection / 1000) * (crosssection / 1000) / 4 * (length / 1000);
		console.log(volume);
		var massa = ((volume * metal)*1000).toFixed(3);
		console.log(massa);
	}

	if (formula == 'pipe') {
		var diametr = $('#dim_diametr').val();
		var wallThickness = $('#dim_wall-thickness').val();
		if (diametr <= wallThickness*2) {
			alert('Некорректная толщина стенки!');
			return;
		}

		var minDiametr = diametr - wallThickness*2;
		var length = $('#dim_length').val();

		var fullArea = Math.PI*(diametr/2000)*(diametr/2000);
		var excludeArea = Math.PI*(minDiametr/2000)*(minDiametr/2000);
		var volume = (fullArea - excludeArea) * (length / 1000);
		var massa = ((volume * metal)*1000).toFixed(3);
	}

	if (formula == 'wire') {
		var diametr = $('#dim_diametr').val();
		var length = $('#dim_length').val();

		var volume = ((diametr / 2000) * (diametr / 2000) * 3.14159265) * (length/1000);
		console.log(volume);
		var massa = ((volume * metal)*1000).toFixed(3);
		console.log(massa);
	}

	$('#result').html(massa);
	
	return false;
}

function makeTypesList(type)
{
	$('#product_type_select').empty();
	var types = product_types[type];
	var i = 0;
	for (var key in types) {
		$('#product_type_select').append('<option value="' + key + '">' + types[key] + '</option>');
		if(i == 0) {
			makeDimentions(key);
		}
	}
}

function makeDimentions(type)
{
	$('#dimentions-container').empty();
	var list = dimentions[type];
	for (var key in list) {
		$('#dimentions-container').append('<div class="element"><span class="title">' + list[key] + '</span><input id="dim_' + key + '" name = "' + key + '" type="text" ><span class="dim"><?php echo CALCULATOR_MM; ?></span><div class="clear"></div></div>');
	}
}

function makeAlloysList(metal)
{
	$('#mark_select').empty();
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

function explode( delimiter, string ) { // Split a string by string
//
// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
// +   improved by: kenneth
// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
 
    var emptyArray = { 0: '' };
	 
    if ( arguments.length != 2
        || typeof arguments[0] == 'undefined'
        || typeof arguments[1] == 'undefined' )
    {
        return null;
    }
	 
    if ( delimiter === ''
       || delimiter === false
       || delimiter === null )
    {
        return false;
    }
	 
    if ( typeof delimiter == 'function'
       || typeof delimiter == 'object'
       || typeof string == 'function'
       || typeof string == 'object' )
    {
        return emptyArray;
    }
	 
    if ( delimiter === true ) {
        delimiter = '1';
    }
	 
    return string.toString().split ( delimiter.toString() );
}

initCalculator();


// custom forms plugin

</script>