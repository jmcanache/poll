 $(document).ready(function () {

 	let answers = {};
 	let explains = {};
 	let new_indicators = {};


	$('[data-toggle="popover"]').popover();

 	function ajaxCall(self, next_position, current_poll){
 		const current_position = next_position - 1;
 		$.ajax({
            type: "GET",
            url: '/getNextPageInfo/'+ next_position + '/' + current_poll,
            success: (data) => {
            	//console.log(data);
            	let why_val = "";
          		let checked_yes = ""; 
          		let checked_maybe = ""; 
          		let checked_no = "";
          		const indicator_title = $('#indicator_title');
            	const indicator_text = $('#indicator_text');
            	const button_text = $('#button-text');
            	const previous_button = `	<button type="button" class="btn btn-md btn-block prev">
						                    <b>&ltPREVIOUS</b>
						                </button>`;


				//Save values of anwers locally
          		if(self == 'next' && current_position > 2 && current_position <= 15){
          			answers[current_position] = $('input[name=study]:checked', '.qualify').val();
          			explains[current_position] = answers[current_position] == 1 ? "" : $('.why').val();
          		}
          		
          		//Search for previous answer for show
          		if(next_position in answers){
          			if(answers[next_position] == 1) checked_yes = "checked";
          			else if(answers[next_position] == 2) checked_maybe = "checked";
          			else checked_no = "checked";
          		}
          		if(next_position in explains){
          			why_val = explains[next_position];
          		}

          		//Set Title Indicator and Main text
            	indicator_title.html(data['indicator']['name']);
            	indicator_text.html(data['data_indicator']['main_text']);

            	//Hide Description if necessary and set new id for search values in database
            	next_position < 2 ? $('#poll_description').removeClass('hidden') : $('#poll_description').addClass('hidden');
            	$('.next').attr('id', data['indicator']['position'] + 1);
            	$('#btn_edit, #btn_save').attr('indicator', data['indicator']['position']);
            	$('.next, .previous').blur();

            	//Set Button name depending on Indicator position
            	if(data['indicator']['position'] == 2) button_text.html('START');
            	else if(data['indicator']['position'] == 18) button_text.html('FINISH')
            	else button_text.html('NEXT');           

            	//Hide previous button if in first pahe
            	data['indicator']['position'] >= 2 ? $('#previous').html(previous_button) : $('#previous').empty();

            	//if = add HTML of all data poll for answer yes/not sure/not
            	//else if = add data for page of all indicators
            	//else if = add data for add indicator
            	//else remove data
            	if(Object.keys(data['common']).length != 0){
            		let table_info = "";
            		let ip = 0;
            		let ap = 0;

            		$.each(data['table_data'], (index, row) => {
            		   	ip = data['indicator']['indi_points'];
            		   	ap = data['indicator']['add_points'];
					    table_info = table_info + `<tr class="row_table">
										                <td class="text-center table_description" position="${row['position']}">${row['description']}</td>
										                <td class="text-center">
										                    <b class="table_point">${row['point']}</b>
										                </td>
										            </tr>`;
					});


            		let indicator_body = `<b>
									        <span id="edit_table">${ data['common']['title_table'] }</span>:
									    </b>
									    <table class="table table-striped">
									        <thead>
									            <tr>
									                <th class="text-center">
									                    <b id="th_1">${ data['common']['th_1'] }</b>
									                </th>
									                <th class="text-center">
									                    <b id="th_2">${ data['common']['th_2'] }</b>
									                </th>
									            </tr>
									        </thead>
									        <tbody>
									            ${table_info}
									        </tbody>
									    </table>

									    <br>

									    <div class="condensed">
									        <b><span id="tf"> ${ data['common']['tf'] }</span>: </b>
									        <p><span id="stf_1">${ data['common']['stf_1'] }</span>: <span id="indi_point">${ip}</span> </p>
									        <p><span id="stf_2">${ data['common']['stf_2'] }</span>: <span id="add_point">${ap}</span></p>
									        <b><span id="tp">${ data['common']['tp'] }</span>: ${ip + ap} </b>
									    </div>

									    <br>
									    <br>

									    <div class="text-center">
									    	<h3 class="strong title_answer" id="title_answer">
									        	${ data['common']['title_answer'] }
									        </h3>
									    </div>

									    <br>

									    <table class="qualify">
									        <tr>
									            <td class="text-center">
									                <input type="radio" name="study" value="1" ${checked_yes} class="radios">
									            </td>
									            <td class="text-center">
									                <input type="radio" name="study" value="2" ${checked_maybe} class="radios">
									            </td>
									            <td class="text-center">
									                <input type="radio" name="study" value="3" ${checked_no} class="radios">
									            </td>
									        </tr>
									        <tr id="qualify_answer">
									            <td class="text-center" id="yes">YES</td>
									            <td class="text-center" id="not_sure">NOT SURE</td>
									            <td class="text-center" is="no">NO</td>
									        </tr>
									    </table>

									    <br>
									    <br>

									    <h4 id="title_textbox"> ${ data['common']['title_textbox'] } </h4>
									    <textarea name="why" class="why" cols="30" rows="10" placeholder="Type here...">${why_val}</textarea>

									    <br>
									    <br>
									    <br>
									    <br>`;

					$('#indicator_body').html(indicator_body);
            	}else if(Object.keys(data['all_indicators']).length != 0){
            		let table_info = "";
            		$.each(data['all_indicators'], (index, row) => {
            			const remove_minus = new RegExp('-', 'g');
						name = row['name'].replace(remove_minus, '');
					    table_info = table_info + `<tr class="indicator_table" position="${row['position']}">
										                <td class="text-left">
										                    <b class="indicator_name">${name}</b>
										                </td>
										                <td class="text-center">
										                    <b class="indicator_relevance">${row['relevance']}</b>
										                </td>
										            </tr>`;
					});

            		let indicator_body =`<table class="table table-striped">
				        <thead>
				            <tr>
				                <th class="text-center">
				                    <b>INDICATORS</b>
				                </th>
				                <th class="text-center">
				                    <b>% of relevance</b>
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				            ${table_info}
				            <tr>
				            	<td>
				                </td>
				                <td class="text-center">
				                    <b>100,0</b>
				                </td>
				            </tr>
				        </tbody>
				    </table>`

				    $('#indicator_body').html(indicator_body);
            	}else if(data['indicator']['position'] == 17){
            		let current_indi = "";
            		$.each(new_indicators, function(indi, why){
            			current_indi = current_indi + ` <div class="row_indicator"><hr /><div class="row added_indi">
								 							<div class="col-sm-5 indi">${indi}</div>
								 							<div class="col-sm-6">${why}</div>
								 							<div class="col-sm-1 remove_indicator"><span>x</span></div>
								 						</div></div>`;
            		});
 					$('#indicator_text').append(current_indi);

            		let indicator_body = `<div class="row add_indicator">
            								<div class="col-sm-5"><input type="text" placeholder="Indicator..." id="indi_add"></div>
            								<div class="col-sm-7"><input type="text" placeholder="Why?" id="why_add"></div>
            								<div class="col-xs-12 text-right"><a href="#" id="add_indi"><h6><strong>Add indicator +</strong></h6></a></div>
            							</div>`;
            		$('#indicator_body').html(indicator_body);
            	}else{
            		$('#indicator_body').empty();
            	}
            	//scroll to top
            	window.scrollTo(0, 0);
            }
        });
 	}

 	$('.next').click( () => {
 		let next_position = $('.next').attr('id');
 		let current_poll = $('.current_poll').attr('id');

 		
 		if(next_position == 19) {
 			$('.next, .prev').prop('disabled', true);
 			mail_data = {'answers': JSON.stringify(answers), 'explains': JSON.stringify(explains), 'indicators': JSON.stringify(new_indicators)};
 			$.ajax({
 				headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
 				url: '/send_mail',
				type: 'POST',
				dataType: 'json',
				data: mail_data,
	            success: (data) => {
	            	if(data['send'] == 1 ){
	            		answers = {};
	            		explains = {};
	            		new_indicators = {};
	            		$('#previous, .next, #indicator_text, #indicator_title, .help').addClass('hidden');
	            		$('#poll_description').removeClass('hidden');
	            		$('#indicator_body').html('<br><br><div class="text-center"><h1><strong>Thanks for your help!</strong></h1></div>');
	            	}else{
	            		alert("Something wrong happened! Please try again.")
	            		$('.next, .prev').prop('disabled', false);
	            	}
	            }
        	})
 			return;
 		}
 		//hide popover of help
 		$('[data-toggle="popover"]').popover('hide');

 		if(next_position > 3 && next_position < 17 && $('input[name=study]:checked', '.qualify').val() == undefined){
 			$('.title_answer, .qualify').addClass('text-danger');
 			return;
 		}
       	ajaxCall('next', next_position, current_poll);
 	});

 	$('body').on('click', '#add_indi', () => {
 		let indicator = $('#indi_add').val(); 
 		let why = $('#why_add').val(); 

 		//hide poppover of help
 		$('.help').tooltip('hide');

 		if(why == '' || indicator == '') return;
 		let add_indi = `<div class="row_indicator"><hr /><div class="row added_indi">
 							<div class="col-sm-5 indi">${indicator}</div>
 							<div class="col-sm-6">${why}</div>
 							<div class="col-sm-1 remove_indicator"><span>x</span></div>
 						</div></div>`;

 		$('#indicator_text').append(add_indi);
 		new_indicators[indicator] = why;
 		$('#why_add').val('');
 		$('#indi_add').val('');
 	});

 	$('body').on('click', '.remove_indicator', function() {
 		$(this).closest('.row_indicator').find('hr').remove();
 		delete new_indicators[$(this).closest('.row_indicator').find('.indi').html()];
 		$(this).closest('.row_indicator').remove();
 	});

 	$('body').on('click', '.prev', function() {
 		let next_position = $('.next').attr('id') - 2;
 		let current_poll = $('.current_poll').attr('id');
 		$('[data-toggle="popover"]').popover('hide');
 		ajaxCall('.prev', next_position, current_poll);
 	});

 	$('#btn_edit').click(function(){
 		$('#poll_description, #indicator_title, #indicator_text, .table_description, .table_point, #edit_table, #th_1, #th_2, #tf, #stf_1, #stf_2, #tp, #title_answer, #title_textbox, #indi_point, #add_point, .help_text, .indicator_relevance, .indicator_name').attr('contenteditable', 'true').addClass('red');
 		$('.next, .prev, #btn_edit').prop('disabled', true);
 		$('.help_text').removeClass('hidden');
 		$('#btn_cancel, #btn_save').prop('disabled', false);
 	})

 	$('#btn_save').click(function(){
 		$('.help_text').addClass('hidden');
 		$('.help').attr('data-content', $('.help_text_area').val());
 		let custom_polls = {
 			'name': $('.current_poll').attr('id'),
 			'description': $('#poll_description').html()
 		};

 		let common = {
 			'title_table': $('#edit_table').html(),
 			'th_1': $('#th_1').html(),
 			'th_2': $('#th_2').html(),
 			'tf': $('#tf').html(),
 			'stf_1': $('#stf_1').html(),
 			'stf_2': $('#stf_2').html(),
 			'tp': $('#tp').html(),
 			'title_answer': $('#title_answer').html(),
 			'title_textbox': $('#title_textbox').html(),
 			'help_text': $('.help_text_area').val(),
 		};

 		let indicator = {
 			'position': $(this).attr('indicator'),
 			'indicator_title': $('#indicator_title').html(),
 			'indi_points': $('#indi_point').html(),
 			'add_points': $('#add_point').html(),
 		};
 		let data_indicator = {
 			'main_text': $('#indicator_text').html()
 		};
 		
 		let table_indicators = {};

 		$('.row_table').each(function(index, elem){
 			let point = $(this).find('.table_point').html();
 			let description = $(this).find('.table_description').html();
 			let position = $(this).find('.table_description').attr('position');
 			table_indicators[index] = {
 				'point': point, 
 				'description': description,
 				'position': position
 			}; 	
 		});

 		let indicator_table = {}

 		$('.indicator_table').each(function(elem){
 			let name = $(this).find('.indicator_name').html();
 			let relevance = $(this).find('.indicator_relevance').html();
 			let position = $(this).attr('position');
 			indicator_table[position] = {
 				'name': name.replace('  ', ' - '), 
 				'relevance': relevance
 			}; 
 		})
 		
		let data = {
			'custom_polls': custom_polls,
			'common': common,
			'indicator': indicator,
			'data_indicator': data_indicator,
			'table_indicators': table_indicators,
			'indicators': indicator_table,
		}

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
			url: '/edit_data',
			type: 'POST',
			dataType: 'json',
			data: data,
	        success: (data) => {
	        	data['edited'] == 1 ? alert('Successfully changes') : alert('Something wrong happened, try again');
	        }
		})

 		$('#poll_description, #indicator_title, #indicator_text, .table_description, .table_point, #edit_table, #th_1, #th_2, #tf, #stf_1, #stf_2, #tp, #title_answer, #title_textbox, #indi_point, #add_point, .indicator_relevance, .indicator_name').attr('contenteditable', 'false').removeClass('red');
 		$('.next, .prev, #btn_edit').prop('disabled', false);
 		$('#btn_cancel, #btn_save').prop('disabled', true);
 	})

 	$('#btn_cancel').click(function(){
        location.reload();
    });
 })

 function toNumberString(num) { 
  if (Number.isInteger(num)) { 
    return num + ".0"
  } else {
    return num.toString(); 
  }
}
