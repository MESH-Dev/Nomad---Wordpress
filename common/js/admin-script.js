window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());
(function($){
    //TO DO in next version : SPEED UP!
    window.add_more_fields_meta = function(element){
        var mark = $(element).parent(),
            //clone last element
            insert = mark.prev('.additive').clone(true, true),
            current_number = parseInt(insert.attr('title')),
            new_number = current_number + 1;
        //alter current number
        insert.attr('title', new_number);
        //alter 'name', 'for', 'id', 'value' of children
        var to_change = {
            'name': '*[name]',
            'for': '*[for]',
            'id': '*[id]',
            'value': '.switch input[type="radio"]'
        };
        $.each(to_change, function(index, selector){
            insert.find(selector).each(function(){
                var name = $(this).attr(index).replace('_' + current_number, '_' + new_number);
                $(this).attr(index, name);
            });
        });
        //alter mover
        insert
            .find('.mover .position').val(new_number)
            .end().insertBefore(mark)
            .siblings('.counter-input').val(current_number + 1);
        return insert;
    };
    //TO DO in next version : SPEED UP!
    var add_remove_button = function(element){
        var new_remover = $('<span class="button remove-fieldset">Remove fieldset</span>').appendTo(element);
        new_remover.click(function(){
            var main = $(this).parent(),
                successors = main.nextAll('.fieldset.additive'),
                predecessors = main.prevAll('.fieldset.additive'),
                counter;
            //if only one left
            if(!successors.length && !predecessors.length ){
    //			alert('clear!');
            }
            //last one
            else if(!successors.length && predecessors.length){
                main.fadeOut(250,function(){ $(this).remove(); });
                counter = parseInt(main.prevAll('input.counter-input').val());
                main.prevAll('input.counter-input').val(counter - 1);
            }
            //have successors
            else if(successors.length){
                main.fadeOut(250,function(){ $(this).remove(); });
                //rewrite 'name', 'for', 'id', 'value' of children
                var to_change = {
                    'name': '*[name]',
                    'for': '*[for]',
                    'id': '*[id]',
                    'value': '.switch input[type="radio"]'
                };
                successors.each(function(){
                    var _this = $(this),
                        current_number = _this.find('input.position').val(),
                        new_number = current_number - 1;
                    $.each(to_change, function(index, selector){
                        _this.find(selector).each(function(){
                            var name = $(this).attr(index).replace('_' + current_number, '_' + new_number);
                            $(this).attr(index, name);
                        });
                    });
                    _this.attr('title', new_number);
                    _this.find('input.position').val(new_number)
                });
                counter = parseInt(main.prevAll('input.counter-input').val());
                main.prevAll('input.counter-input').val(counter - 1);
            }
        });
    };
    $(document).ready(function($) {
    /*** UPLOAD FUNCTIONS ***/
        var field_for_uploaded_file,
            $image_input,
            tbframe_interval;
        var air_upload_image = function(){
            //parent of upload input
            var $cont = $(this).parent();
            //find text input to write in
            $image_input = $('input[type=text]', $cont);
            //remember in which input we want to write
            field_for_uploaded_file = $image_input.attr('name');
            //show wordpress thickbox
            tb_show('Upload or select image to use', 'media-upload.php?&amp;post_id=0&amp;type=image&amp;TB_iframe=true');
            //set insert image button to nice name
            tbframe_interval = setInterval(function() {
                $('#TB_iframeContent').contents()
                    .find('.savesend input.button, #go_button').val('Use this image');
            }, 2000);
            //prevent default actions
            return false;
        };
        //replace default action of inserting into editor
        //copy original function
        window.original_send_to_editor = window.send_to_editor;
        //our new function
        window.send_to_editor = function(html){
            //if there is some field waiting for input
            if (field_for_uploaded_file !== undefined) {
                //end inserting nice name
                clearInterval(tbframe_interval);
                //for searching if only <img> is returned in html
                html = $('<div></div>').append(html);
//log (html);
                //search for img in returned code
                var $img = $('img',html),
                    img_parent = $img.parent(),
                    file_url = $img.attr('src');
                //insert its src to waiting field
                $image_input.val(file_url);
                //search & fill other inputs(META)
                var _id         = $image_input.attr('id'),
                    split_index = _id.lastIndexOf('_'),
                    id_start    = _id.substring(0, split_index),
                    id_end      = _id.substring(split_index);
                if(id_start.length){
                    //title of photo
                    $('#' + id_start + '_name' + id_end).val($img.attr('title'));
                    //get attachment id
                    var str = $img.attr('class'),
                        regExp = /wp-image-([0-9]+)/i,
                        result;
                    result = regExp.exec(str);
                    if(result && result.length){
                        $('#' + id_start + '_id' + id_end).val(result[1]);
                    }
                    else{
                        //remove id if any
                        $('#' + id_start + '_id' + id_end).val('');
                    }
                }
                //if upload for short code input
                if(field_for_uploaded_file === 'apollo13-image-img'){
                    //fill title
                    $('#apollo13-image-alt').val($img.attr('title'));
                    //fill url
                    if(img_parent.is('a')){
                        $('#apollo13-image-url').val(img_parent.attr('href'));
                    }
                    //fill dimensions
                    $('#apollo13-image-dimensions').val('width:' + $img.attr('width') + 'px; height:' + $img.attr('height') + 'px;');
                }
//not used
//                //collect attributes
//                var file_attr = 'alt="' + $img.attr('alt') + '"';
//                if($img.attr('title')){
//                    file_attr += ' title="' + $img.attr('title') + '"'
//                }
//
//                //insert to attribute filed if available
//                var $attr_inp = $image_input.parents('.input-parent').next('.input-parent');
//                if($attr_inp.is('.for-image-attributes')){
//                    $attr_inp.find('input[type="text"]').val(file_attr);
//                }
                //close thickbox
                tb_remove();
                //clean waiting variable
                field_for_uploaded_file = undefined;
            }
            //else default action
            else {
                window.original_send_to_editor(html);
            }
        };
        //bind for our hijacked events
        if( $('.upload-image-button').length ){
            //bind click event on upload button
            $('.upload-image-button').click( air_upload_image );
            //clean if thickbox was closed too early
            $('html').on('tb_unload',function(){
                //clean waiting variable
                field_for_uploaded_file = undefined;
                //end inserting nice name
                clearInterval(tbframe_interval);
            });
        }
    /*** color picker ***/
        var input_color = $('input.with-color');
        if(input_color.length){
            input_color.wheelColorPicker({
                dir: AdminParams.colorDir,
                format: 'rgba',
                validate: true,
                color: null
            });
            //transparent value
            $('body').on('click', 'button.transparent-value', function(){
                $(this).prev('input.with-color').attr('style','').val('transparent');
                return false;
            });
        }
    /**** SLIDER FOR SETTING NUMBER OPTIONS ****/
        var sliders = $('div.slider-place');
        if(sliders.length){
            //setup sliders
            sliders.each(function(index){
                var min,max,unit,$s;
                //collect settings
                $s = sliders.eq(index);
                min = $s.data('min');
                min = (min === '')? 10 : min; //0 is allowed now
                max = $s.data('max');
                max = (max === '')? 30 : max; //0 is allowed now
                unit = $s.data('unit');
                $s.slider({
                    range: "min",
                    animate: true,
                    min: min,
                    max: max,
                    slide: function( event, ui ) {
                        $( this ).prev('input.slider-dump').val( ui.value + unit );
                    }
                });
            });
            //set values of sliders
            $( "input.slider-dump" ).bind('blur', function(){
                var _this = $(this),
                    value = parseInt(_this.val()),
                    slider = _this.next('div.slider-place'),
                    unit = slider.data('unit');
                if( !isNaN(value) && (value + '').length){ //don't work on empty && compare as string
                    slider.slider( "option", "value", value );
                    _this.val(value + unit);
                }
            }).trigger('blur');
        }
    /**** SORTABLE SOCIALS ****/
    var pos_selector = 'input.vhidden';
    var create_sort = function(event, ui){
        var items = $(event.target).find(pos_selector);
        items.sort(function(a,b){
            var _a = parseInt( $(a).val() ),
                _b = parseInt( $(b).val() );
            return _a - _b;
        });
        for(var i = 0, len = items.length; i < len; i++){
            items.eq(i).val(i).parent().parent().appendTo('#sortable-socials > .inside');
        }
    };
    var update_sort = function(event, ui){
        var index_1 = parseInt($(ui.item).find(pos_selector).val()),
            index_2 = parseInt($(ui.item).prev().find(pos_selector).val()),
            temp;
        if(!index_2){
            index_2 = 0;
        }
        //switch indexes if needed
        if(index_1 > index_2){
            temp    = index_1;
            index_1 = index_2;
            index_2 = temp;
        }
        var items = $('#sortable-socials').find(pos_selector);
        for(var i = index_1; i <= index_2; i++){
            items.eq(i).val(i);
        }
    };
    $('#sortable-socials').sortable({
        placeholder: "ui-state-highlight",
        items: 'div.text-input',
        revert: true,
        forcePlaceholderSize: true,
        cursor: 'move',
        create: create_sort,
        update: update_sort
    });
    //if there are meta fields check for special elements
    var apollo_meta = $('div.apollo13-metas');
    if (apollo_meta.length) {
        //bind add more fields button
        apollo_meta.find('span.add-more-fields').click(function(){
            add_more_fields_meta(this);
        });
        //bind switcher for:
        // hide unused options like image vs video
        apollo_meta.find('.switch input[type="radio"]').change(function(){
            var input   = $(this),
                parent  = input.parents('div.switch'),
                to_show = input.val();
            //return string without number at end
            to_show = to_show.substring(0,to_show.lastIndexOf('_'));
            //find all options of switch
            input.parents('div.input-desc').find('input[type="radio"]').each(function(){
                var _input      = $(this),
                    to_compare  = _input.val().substring( 0, _input.val().lastIndexOf('_')),
                    elements    = parent.find('[id^="' + to_compare + '"]');
                //for all elements in current switch option check if they should be shown
                elements.each(function(){
                    var d = $(this).parents('div.input-parent'); //d == div
                    if (to_show == to_compare)
                        d.show();
                    else
                        d.hide();
                });
            });
        });
        //adds remove button for all additives sets
        add_remove_button(apollo_meta.find('div.fieldset.additive'));
        //bind movers
        apollo_meta.find('span.move-up, span.move-down').click(function(){
            var mover = $(this),
                last_one = apollo_meta.children('div.additive').length, //here cause of shortcodes support(variable number of movers)
                _this = mover.parents('div.fieldset.additive'), //main affected block/*parent*/
                that = '', //also affected element while moving
                this_pos = parseInt($(this).siblings('input.position').val(), 10),
                that_pos = '',
                move_up = $(this).hasClass('move-up') ? true : false;
            //if already first or last
            if( move_up && this_pos === 1 )
                return;
            else if( !move_up && (this_pos === last_one) )
                return;
            //get other affected element
            if( move_up ){
                that = _this.prev('div.additive');
                that_pos = parseInt(that.find('input.position').val(), 10);
            }
            else{
                that = _this.next('div.additive');
                that_pos = parseInt(that.find('input.position').val(), 10);
            }
            //rewrite 'name', 'for', 'id', 'value' of children
            var to_change = {
                    'name'  : '*[name]',
                    'for'   : '*[for]',
                    'id'    : '*[id]',
                    'value' : '.switch input[type="radio"]'
                },
                swapper = function(element, current_number, new_number){
                    $.each(to_change, function(index, selector){
                        element.find(selector).each(function(){
                            var elem = $(this),
                                name = elem.attr(index).replace('_' + current_number, '_' + new_number);
                            elem.attr(index, name);
                        });
                    });
                };
            //set first to temp
            swapper(_this, this_pos, 'temp123');
            //set second to first
            swapper(that, that_pos, this_pos);
            //set first to second
            swapper(_this, 'temp123', that_pos);
            //recognition numbers swap
            _this.attr('title', that_pos);
            that.attr('title', this_pos);
            //swap positions in JS
            var temp = this_pos;
            this_pos = that_pos; //new position!
            that_pos = temp; //new position!
            //move things in DOM
            _this.hide();
            if( move_up ){
                _this.insertBefore(that);
            }
            else{
                _this.insertAfter(that);
            }
            //update position in inputs
            _this.find('input.position').val(this_pos);
            that.find('input.position').val(that_pos);
            _this.fadeIn(300);
        });
    }
    });
})(jQuery);