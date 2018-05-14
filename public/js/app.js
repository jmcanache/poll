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
            		   	if(row['description'].includes('(AP)')) ap = ap + row['point'];
            		   	else ip = ip + row['point'];
					    table_info = table_info + `<tr>
										                <td class="text-left"> ${row['description']}</td>
										                <td class="text-center">
										                    <b>${row['point']}</b>
										                </td>
										            </tr>`;
					});


            		let indicator_body = `<b>
									        ${ data['common']['title_table'] }:
									    </b>
									    <table class="table table-striped">
									        <thead>
									            <tr>
									                <th class="text-center">
									                    <b>${ data['common']['th_1'] }</b>
									                </th>
									                <th class="text-center">
									                    <b>${ data['common']['th_2'] }</b>
									                </th>
									            </tr>
									        </thead>
									        <tbody>
									            ${table_info}
									        </tbody>
									    </table>

									    <br>

									    <div class="condensed">
									        <b> ${ data['common']['tf'] }: </b>
									        <p> ${ data['common']['stf_1'] }: ${ip} </p>
									        <p> ${ data['common']['stf_2'] }: ${ap}</p>
									        <b> ${ data['common']['tp'] }: ${ip + ap} </b>
									    </div>

									    <br>
									    <br>

									    <div class="text-center">
									    	<h4 class="strong title_answer">
									        	${ data['common']['title_answer'] }
									        </h4>
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

									    <h4> ${ data['common']['title_textbox'] } </h4>
									    <textarea name="why" class="why" cols="30" rows="10">${why_val}</textarea>

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
					    table_info = table_info + `<tr>
										                <td class="text-left">
										                    <b>${name}</b>
										                </td>
										            </tr>`;
					});

            		let indicator_body =`<table class="table table-striped">
				        <thead>
				            <tr>
				                <th class="text-center">
				                    <b>INDICATORS</b>
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				            ${table_info}
				        </tbody>
				    </table>`

				    $('#indicator_body').html(indicator_body);
            	}else if(data['indicator']['position'] == 17){
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
 		console.log($(this).closest('.row_indicator').find('.indi').text())
 		delete new_indicators[$(this).closest('.row_indicator').find('.indi').html()];
 		$(this).closest('.row_indicator').remove();
 	});

 	$('body').on('click', '.prev', function() {
 		let next_position = $('.next').attr('id') - 2;
 		let current_poll = $('.current_poll').attr('id');
 		$('[data-toggle="popover"]').popover('hide');
 		ajaxCall('.prev', next_position, current_poll);
 	});

 	$('body').on('click', '.radios', function() {
 		let disabled = $('input[name=study]:checked', '.qualify').val();
 		disabled == "1" ? $('.why').attr('disabled', 'disabled') : $('.why').removeAttr('disabled');
 	});
 })