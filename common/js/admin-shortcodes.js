jQuery(document).ready(function($) {
	if( $('#shortcode-generator').length ){
		//hide generated html
		$('.shortcodes-codes, .shortcodes-fields').hide();
		$('select#shortcode-categories').val('').change(function(){
			$('.shortcodes-codes, .shortcodes-fields').hide();
			$('#apollo13-' + $(this).val() + '-codes' ).show().change();
		});
		$('select.shortcodes-codes').change(function(){
			$('.shortcodes-fields').hide();
			$('#apollo13-' + $(this).val() + '-fields' ).show()
		});
		$('#apollo13_shortocodes .add-more-fields').click(function(){
			mark = $(this).parent();
			insert = $('<fieldset class="added"></fieldset>').insertBefore(mark);
			mark.siblings('.additive').clone().appendTo(insert);
			//stored data about number of new elements
			new_number = mark.parent().data( 'number' );
			if(!new_number){
				new_number = 1;
				mark.parent().data( 'number', new_number );
			}
			else{
				new_number = parseInt(new_number) + 1;
				mark.parent().data( 'number', new_number );
			}
			//make uniq id of cloned elments
			insert.find('.additive').not('div').each(function(){
				id = $(this).attr('id');
				$(this).attr('id', id + new_number ).attr('name', id + new_number);
			});
			//add remove button
			$('<span class="button">Remove fields</span>').appendTo(insert).click(function(){
				$(this).parent().remove();
			});
			//add upload bind to new buttons
			insert.find('.upload-image-button').click( air_upload_image );
		});
		$('#send-to-editor').click(function(){
			tag = $('#shortcode-generator .shortcodes-codes:visible').eq(0).val();
			if( ! tag ){
				return;
			}
			attr = '';
			content = '';
			code = '';
			subtags = {};
			addclear = false;
			div = $('#shortcode-generator .shortcodes-fields:visible');
			fields = div.find('input[type="text"], input[type="radio"]:checked, select, textarea');
			//parse info from id, class of each field
			fields.each(function(){
				//get info form field
				if($(this).attr('id'))
					data = $(this).attr('id').split("-");
				else
					data = $(this).attr('name').split("-");
				//if subtag is present
				if( data[3] ){
					if ($(this).hasClass('addclear') ) {
						if( $(this).val() == 'on' )
							addclear = true;
						// skip other operations for this tag
						return;
					}
					//making key name
					key = data[3];
					if ( data[4] ){
						key += '-' + data[4];
					}
					if( !subtags[key] )//if not exists we create key position
						subtags[key] = {'attr': '', 'content' : ''};
					if ($(this).hasClass('attr')) {
						value = $(this).val();
						if (value == 'default' || value == '')
							;
						else {
							subtags[key]['attr'] += ' ' + data[2] + '="' + value + '"';
						}
					}
					else if ($(this).hasClass('content')) {
							subtags[key]['content'] += $(this).val();
					}
				}
				//no subtag
				else{
					if($(this).hasClass('attr')){
						value = $(this).val();
						if( value == 'default' || value == '' );
						else{
							attr += ' ' + data[2] + '="' + value + '"';
						}
					}
					else if($(this).hasClass('content')){
						content += $(this).val();
					}
				}
			});
			//ufff
			//now we parse subtags if they exist
			subtags_code = ''
			$.each(subtags, function(key, value) {
				key = key.split("-")[0];//no numbers part(-1,-2, etc.)
				subtags_code += ' ['+ key + value['attr'] + '] ' + value['content'] + ' [/'+ key + '] ';
			});
			//and return code
			//one tag shortcode
			if( subtags_code == '' && attr == '' && content == '' ){
				code = code = ' [' + tag + '] ';
			}
			//no content - selfclose one tag shortcode ([image atribs /])
			else if( subtags_code == '' && content == '' ){
				code = code = ' [' + tag + attr + ' /] ';
			}
			//subtags but no main tag
			else if( tag.substring(0,6) == 'nocode' ){
				code = subtags_code;
			}
			//normal shortocode or sortcode with subtags
			else{
				if(content != '')
					content = ' ' + content + ' ';
				code = ' [' + tag + attr + ']' + content + subtags_code + '[/' + tag + '] ';
			}
			// clear for columns
			if( addclear )
				code += '[clear] ';
			window.send_to_editor(code);
//			alert(code);
		});
	}
});