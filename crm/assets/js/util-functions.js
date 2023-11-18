// JavaScript Document
function getHostName(){
	var domainName="";
	var hostName=window.location.hostname;
	if(hostName=='10.10.10.26'){domainName='http://10.10.10.26/crmonyxaa/'}
	else if(hostName=='localhost'){domainName='http://localhost/crmonyxaa/'}
	else if(hostName.indexOf('jil.in')>-1){domainName='http://'+hostName+'/onyxaacrm/'}
	else{if(window.location.protocol=='https:'){domainName='https://'+hostName+'/'}
	else{domainName='http://'+hostName+'/'}}
	return domainName
}

// GET SECTION ADMIN OR STORE
var pathArray = window.location.pathname.split( '/' );
var section_name = pathArray[2];

//alert(section_name);
function createHeadtitle(tVal, toId) {
	var tValue = tVal.trim();
	document.getElementById(toId).value = StriptSpecialCharacters(tValue);
}

function StriptSpecialCharacters(characterTotal)
{
	var chars = /^([A-Za-z0-9\ ])$/;  
	var newChar = "";
	var oldChar = characterTotal.split("");
	for(var q=0; q<oldChar.length;q++){
		if(oldChar[q].match(chars))
		{
			newChar = newChar + oldChar[q].toString().toLowerCase();
		}
	}
	//return newChar.replace(/\s+/g, "-");
	
	var newChar = newChar.replace(/\s+/g, "-");
	
	// remove last dash from string
	var lastStr = newChar.substring(newChar.length - 1, newChar.length);
	if(lastStr == '-'){
		var newChar = newChar.substring(0, newChar.length-1);
	}
	
	return newChar;
	
}

function RemoveLastDash(newChar){
	//var newChar = "nstr-asDF-";
	//alert(newChar)
	var lastStr = newChar.substring(newChar.length - 1, newChar.length);
	if(lastStr == '-'){
		var newChar = newChar.substring(0, newChar.length-1);
	}
	
	//var nchar = newChar.replace(/-[^-]*$/, "");
	return newChar;
	//alert(newChar);
}


<!--AUTO FILL FOR SEO TITLE, KEYWORDS, DESC---!>
 function SpecialCharacters(characterTotal)
 {
	var chars = /^([A-Za-z0-9\ ])$/; 
	var newChar = "";
	var oldChar = characterTotal.split("");
	for(var q=0; q<oldChar.length;q++){
		if(oldChar[q].match(chars))
		{
			newChar = newChar + oldChar[q].toString();
		}
	}
	return newChar;
 }
	function createHeading(tVal, toId){
	document.getElementById(toId).value = SpecialCharacters(tVal);

 }
 <!-----  END ---->
 
 
 var IE  = document.all?true:false;

 function onlyCharacters(e) {
	var chars = /^([A-Za-z0-9\ ])$/;
	if(!IE){
		var wkey = e.which;
	}else{
		var wkey = window.event.keyCode;
	}
	 var character = String.fromCharCode(wkey);

	if((wkey==0)||(wkey==8)){	return;	}
	//if((wkey<48)||(wkey>57))
	if(!character.match(chars))
	{
		if(IE){		e.returnValue = false;	}
		else{	return false;	}
	}
}


$(document).ready(function(){
						   
/*	// CHECK DUPLICATE URL
	$("#url_cat_name").blur(function(){
		var url_name = 'url_cat_name';
		var url_val = $(this).attr('value');
		
		var pre_url_name = $("#pre_url_name").attr('value');
		var tbl_name = 'cw_product_category';
		if(pre_url_name != url_val){
			check_duplicate_url(url_name, url_val, tbl_name);
		}
	});
	*/
});

function check_duplicate_url(url_name, url_val, tbl_name){
	var prev_url_name = $("#prev_url_name").attr('value');
	
	if(prev_url_name != url_val)
	{
		var url = getHostName()+section_name+'/common/unique_url';
		var imgsrc = getHostName()+'assets/img/lazy-loader.gif';
		$("#urlmsg").html("<img src='"+imgsrc+"'>");
		var cat_id = '';
		var myData = {'url_name': url_name, 'url_val': url_val, 'tbl_name': tbl_name, 'cat_id': cat_id};
		$.post(url, myData, function(vdata){
			//alert(vdata);
			if(vdata == 'N'){
				$("#urlmsg").html("Choose different url");
				$("#url_name").attr('value', '');
				$("#url_name").focus();
				return false;
			}else{
				$("#urlmsg").html("");
			}
		});
	}
	
}

<!-----  CHECK FOR UNIQUE URL ---->

$(document).ready(function(){
	$(".product_tab a").click(function(){
		var tabid = $(this).attr('id');
		product_steps(tabid);								   
	});
});

function product_steps(tabid){
	//alert('hi-'+tabid);
	$("div#p1, div#p2, div#p3, div#p4").hide();
	$(".product_tab a#p1, .product_tab a#p2, .product_tab a#p3, .product_tab a#p4").removeClass('btn-primary btn-success').addClass('btn-success');
	$(".product_tab a#"+tabid).removeClass('btn-success').addClass('btn-primary');
	$("div#"+tabid).show();
	
}

// CONFIRMATION BEOFRE ITEM DELETE
$(document).ready(function(){
	$("i.fa-trash-o").click(function(){
		if(confirm("Are you sure to delete?")){
			return true;	
		}else{
			return false;
		}
	});
});

// CONFIRMATION BEOFRE ITEM DELETE
$(document).ready(function(){
	$(".crud-actions a i.fa-times").click(function(){
		if(confirm("Are you sure to discard?")){
			return true;	
		}else{
			return false;
		}
	});
});


$(document).ready(function(){
	// MENU LIST	
	$("select#menuFilter").change(function(){
		var menuid = $(this).val();
		var url = getHostName()+'admin/menu_list_item/'+menuid;
		window.location.href = url;		
	});
	
	// SELECT privileges item on select privileges
	$("input[name='menuCat[]']").click(function(){
		
		if($(this).is(':checked')) { 
			$(this).parents('div:first').find("div#multiple_company input[type='checkbox']").attr('checked', true);	
		} else {
			$(this).parents('div:first').find("div#multiple_company input[type='checkbox']").removeAttr('checked');	
		}

	});
	
	// SHOW PRIVILEGES FROM MENU LIST ( EDIT)
	$("form#admin_type select#menu_list").change(function(){
		var menuid = $(this).attr('value');
		var cparth = $(location).attr('href');
		cparth = cparth.slice( 0, cparth.lastIndexOf('/') );
		window.location.href = cparth+'/'+menuid;
		//alert(cparth);
	});

});

// Product section

$(document).ready(function(){
	$(".product_tab a, .fitness_tab a").click(function(){
		var tabid = $(this).attr('id');
		product_steps(tabid);								   
	});
});

function product_steps(tabid){
	//alert('hi-'+tabid);
	// for prodcut
	if($(".product_tab a#"+tabid).hasClass('disabled')){
		alert("Please add product detail first.");
		return false;
	}
	
	// for fitness
	if($(".fitness_tab a#"+tabid).hasClass('disabled')){
		alert("Please add fitness detail first.");
		return false;
	}
	
	/*$("div#ptab1, div#ptab2, div#ptab3, div#ptab4, div#ptab5").hide();
	$(".product_tab a#ptab1, .product_tab a#ptab2, .product_tab a#ptab3, .product_tab a#ptab4, .product_tab a#ptab5").removeClass('btn-primary btn-success').addClass('btn-success');
	$(".product_tab a#"+tabid).removeClass('btn-success').addClass('btn-primary');
	$("div#"+tabid).show();*/
	
}


// MATCH 
$(document).ready(function(){
  // alert('N');	
	// adding team for toss
	$("input:checkbox[name='teams[]']").click(function(){
		var team_id = $(this).attr('value');
		var team_name = $(this).parent().text();
		
		if($(this).is(':checked')){
			$("#toss_block").append('<input type="radio" name="toss[]" value="'+team_id+'" id="'+team_id+'"  /> <span>'+team_name+'&nbsp;&nbsp;</span>');
		}else{
			$("#toss_block #"+ team_id).next('span').remove();
			$("#toss_block #"+ team_id).remove();
		}
	});
	
	// selected country with toss winner on page load
	$("input:checkbox[name='teams[]']").each(function(){
		var team_id = $(this).attr('value');
		var team_name = $(this).parent().text();
		var toss_winner = $("#toss_winner").attr('value');
		
		var sal = "";
		if(team_id == toss_winner){
			var sal = " Checked = Checked ";	
		}
		
		if($(this).is(':checked')){
			$("#toss_block").append('<input type="radio" name="toss[]" value="'+team_id+'" id="'+team_id+'" '+sal+' /> <span>'+team_name+'&nbsp;&nbsp;</span>');
		}
	});
	
	
});

// CALL MATCH AJAX DATA
function ajax_data_match(id){
	var hostname = getHostName();
	var url = hostname+section_name+'/score_card/get_match_list';
	var myData = {'id': id};
	$.post(url, myData, function(vdata){
		$("#matchdd").html(vdata);
	});
}
	
// CALL TEAM AJAX DATA
function ajax_data_team(id){
	var hostname = getHostName();
	var url = hostname+section_name+'/score_card/get_team_list';
	var myData = {'id': id};
	$.post(url, myData, function(vdata){
		$("#teamdd").html(vdata);
	});
}	

// CALL TEAM YEAR DATA
function ajax_data_team_year(id){
	var hostname = getHostName();
	var url = hostname+section_name+'/score_card/get_team_year_list';
	var myData = {'id': id};
	$.post(url, myData, function(vdata){
		$("#yeardd").html(vdata);
	});
}
	

// CALL TEAM YEAR DATA
function ajax_data_team_players(id){
	var tournament_id = $("#tournaments").attr('value');
	var team_id 	= $("#team_list").attr('value');
	var match_id 	= $("#match_list").attr('value');
	var year_val 	= $("#year_list option:selected").text();
	var hostname 	= getHostName();
	var url 		= hostname+section_name+'/score_card/get_team_players_list';
	var myData 		= {'team_id':team_id,'id': id, 'match_id': match_id, 'year_val':year_val, 'tournament_id':tournament_id};
	$.post(url, myData, function(vdata){
		$("#player_list").html(vdata);
	});
	
	ajax_data_bowler(id, team_id, year_val, match_id, tournament_id);
}

// CALL TEAM B DATA ( BOWLER )
function ajax_data_bowler(id, team_id, year_val, match_id, tournament_id){
	var hostname 	= getHostName();
	var url 		= hostname+section_name+'/score_card/get_bowling_team_players';
	var myData 		= {'team_id':team_id,'id': id, 'match_id': match_id, 'year_val':year_val, 'tournament_id':tournament_id};
	$.post(url, myData, function(vdata){
		$("#bowller_list").html(vdata);
	});
}	

// CALL TEAM YEAR DATA
function ajax_data_team_players_edit(id){
	var tournament_id 	= $("#tournaments").attr('value');
	var team_id 		= id;
	var match_id 		= $("#match_list").attr('value');
	var year_val 		= $("#year_list option:selected").text();
	var hostname 		= getHostName();
	var url 			= hostname+section_name+'/score_card/get_team_players_list/edit';
	var myData 			= {'team_id':team_id,'id': id, 'match_id': match_id, 'year_val':year_val, 'tournament_id':tournament_id};
	$.post(url, myData, function(vdata){
		$("#player_list").html(vdata);
	});
	/*ajax_data_bowler(id, team_id, year_val, match_id, tournament_id);*/
}
	
	
// FUNCTION TO CHANGE ORDER STATUS
function changeOStatus(val, oid){
	var hostname = getHostName();
	var url = hostname+section_name+'/order/order_status';
	var myData = {'status':val, 'oid':oid};
	$.post(url, myData, function(data){
		//alert("Successfully Updated");							 
		window.location.reload();
		return false;
	});

}

// TO LOAD PRODUCT BASED ON store
//warehouse_id
$(document).ready(function(){
	$("select#warehouse_id").change(function(){
		var warehouse_id = $(this).attr('value');
		var store_id = $("input#store_id").attr('value');
		
		var hostname = getHostName();
		var url = hostname+section_name+'/store/product';
		var myData = {'warehouse_id':warehouse_id, 'store_id':store_id};
		$.post(url, myData, function(data){
			$("#prod_list").html(data);
			return false;
		});
	
	});
	
	// get qty for store product
	$(document).on("change","select#product_id",function(){										   
		//alert('Y');
		var warehouse_id = $("select#warehouse_id").attr('value');
		var product_id = $(this).attr('value');
		var store_id = $("input#store_id").attr('value');
		
		var hostname = getHostName();
		var url = hostname+section_name+'/store/product_qty';
		
		var ware_url = hostname+section_name+'/store/ware_product_qty';
		
		var url_update = hostname+section_name+'/store/inventry_update/'+store_id;
		var url_add = hostname+section_name+'/store/inventry_add/'+store_id;
		
		var myData = {'warehouse_id':warehouse_id, 'product_id':product_id, 'store_id':store_id};
		
		$.post(url, myData, function(data){
			//alert(data);
			var wareData  = {'warehouse_id':warehouse_id, 'product_id':product_id};
			$.post(ware_url, wareData, function(data){
				//alert(data);
				$("input#ware_avail_qty").attr('value', data);
				$("span#wareqty").text(data);
				return false;
			});
			
			//$("input#avail_qty").attr('value', data);
			if(data > 0){
				$("form#store_invt").attr('action', url_update);
			}else{
				$("form#store_invt").attr('action', url_add);	
			}
			return false;
		});
										   
	});
	
	// VALIDATION AND DATA SUBMIT
	$("button#store_invt_btn").click(function(){
		
		if( $("select#warehouse_id").val() == ''){
			alert("Please select warehouse");
			$("select#warehouse_id").focus();
			return false;
		}
		if( $("select#product_id").val() == ''){
			alert("Please select product");
			$("select#product_id").focus();
			return false;
		}
		if( $("input#avail_qty").val() == ''){
			alert("Please enter product qty.");
			$("input#avail_qty").focus();
			return false;
		}
		
		document.store_invt.submit();
		return false;
		
	});
	
	// COMPARE QUANTITY WAREHOUSE AND STORE
	//$("input#avail_qty").blur(function(){
	$("input#avail_qty").on('blur', function(e){  	
		var ware_avail_qty = $("input#ware_avail_qty").attr('value');
		ware_avail_qty = parseInt(ware_avail_qty )+1;
		
		if (isNaN(ware_avail_qty)) { 
			alert("Product not availale in warehouse");
			$("input#avail_qty").attr('value', '');
			$("input#avail_qty").focus();
			return false;
		}
		
		if( $("input#avail_qty").attr('value') > ware_avail_qty ){
			alert("Quantity less then "+ware_avail_qty);
			$("input#avail_qty").attr('value', '');
			//$("input#avail_qty").focus();
			return false;
		}
		
	});
	
	// MANAGE STOCKS
	$("table#stock_list").find("input.stock_add_qty").keyup(function(){
		if( parseInt($(this).attr('value')) > parseInt($(this).prev('input').attr('value')) ){
			alert("Quantity less then "+ (parseInt($(this).prev('input').attr('value'))+1));
			$(this).attr('value', '');
			$(this).focus();
			return false;	
		}
	
	});
	
	// STOCK TRANSFER TO STORE
	$("button#add_stock_btn").click(function(){
		if( $("select#stock_store_id").val() == '' ){
			alert("Please select store");
			$("select#stock_store_id").focus()
			return false;
		}
		document.stock_frm.submit();
		return false;
	});									 
	
	// STORE SELECTION
	$("select#stock_store_id").change(function(){
		var store_id = $(this).val();
		var warehouse_id = $("input#warehouse_id").val();
		var hostname = getHostName();
		var url = hostname+section_name+'/warehouse/transfer_stock/'+warehouse_id+'/'+store_id;
		window.location.href = url;
		return false;
	});
	
	// STORE to STORE product transfer
	$("select#store_dd_id").change(function(){
		var store_id = $(this).attr('value');
		var from_store_id = $("input#from_store_id").attr('value');
		var hostname = getHostName();
		var url = hostname+section_name+'/store/store_product';
		var myData = {'store_id':store_id, 'from_store_id':from_store_id};
		$.post(url, myData, function(data){
			$("#prod_list_dd").html(data);
			return false;
		});
	
	});
	
	// STORE to STORE available product transfer for transfer
	$(document).on("change","select#product_dd",function(){
		var prod_qty = $(this).children(":selected").attr("id");
		$("span#storeqty").html(prod_qty);
		$("#from_avail_qty").attr('value',prod_qty);
	});
	
	// check product qty from availablity
	//store_avail_qty from_avail_qty
	//$(document).on("click","button#store_store_btn",function(){
	$("button#store_store_btn").click(function(){															   
															 
		var prod_qty = $("#store_avail_qty").val();
		if(prod_qty == ''){
			alert("Please enter product quantity");
			return false;
		}
		var from_avail_qty = $("#from_avail_qty").attr('value');
		
		if(parseInt(prod_qty) > parseInt(from_avail_qty) ){
			alert("Please enter less than "+parseInt(from_avail_qty));
			$("#store_avail_qty").focus();
			return false;
		}
		
		document.store_store_invt.submit();
		return false;
	});
	
	// datepick-popup
	$(document).on("click","div.datepick-popup",function(){
		check_duplicate_val(url_name='package_month', '', tbl_name='shap_package', 'error_fld');
	});
	
	
});
	
// UNIQUE FIELD VALUE  ------ START
function check_duplicate_val(url_name, url_val, tbl_name, error_fld){
	var fldval = $("#"+url_name).attr('value');
	var prev_passcode = $("#prev_"+url_name).attr('value');
	if(url_val == ''){
		url_val = fldval;	
	}
	if(prev_passcode != url_val)
	{
		
		var url = getHostName()+section_name+'/common/unique_value';
		var imgsrc = getHostName()+'assets/img/lazy-loader.gif';
		$("#"+error_fld).html("<img src='"+imgsrc+"'>");
		var cat_id = '';
		//alert(url_name+" == "+url_val+" == "+tbl_name+" == "+cat_id);
		
		var myData = {'url_name': url_name, 'url_val': url_val, 'tbl_name': tbl_name, 'cat_id': cat_id};
		
		$.post(url, myData, function(vdata){
			//alert(vdata);
			if(vdata == 'N'){
				$("#"+error_fld).html("value already exists");
				$("#"+url_name).attr('value', '');
				$("#"+url_name).focus();
				return false;
			}else{
				$("#"+error_fld).html("");
			}
		});
	}
	$("#"+error_fld).html("");
}
// UNIQUE FIELD VALUE  ------ END 

// UNIQUE VALUE IN TABLE ( without value ) ------ START
/*function check_unique_val(fld_name, fld_val, tbl_name, error_fld){
	var fldval = $("#"+url_name).attr('value');
	var prev_passcode = $("#prev_"+url_name).attr('value');
	if(url_val == ''){
		url_val = fldval;	
	}
	if(prev_passcode != url_val)
	{
		
		var url = getHostName()+section_name+'/common/unique_tbl_data';
		var imgsrc = getHostName()+'assets/img/lazy-loader.gif';
		$("#"+error_fld).html("<img src='"+imgsrc+"'>");
		//alert(url_name+" == "+url_val+" == "+tbl_name+" == "+cat_id);
		var myData = {'url_name': url_name, 'url_val': url_val, 'tbl_name': tbl_name };
		$.post(url, myData, function(vdata){
			if(vdata == 'N'){
				$("#"+error_fld).html("value already exists");
				$("#"+url_name).attr('value', '');
				$("#"+url_name).focus();
				return false;
			}else{
				$("#"+error_fld).html("");
			}
		});
	}
}*/
// UNIQUE VALUE IN TABLE  ------ END 

// CHECKBOX VALIDATION FOR 5 PRODUCT
function valid_prod(){
	var $fields = $('div#div_product_list').find('li input[type="checkbox"]:checked');
     if (parseInt($fields.length) != 5) {
		alert('You must select 5 product');
		return false;
	}
}