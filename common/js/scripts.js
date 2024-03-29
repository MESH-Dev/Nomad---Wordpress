/***** On DOM load *********/
jQuery(document).ready(function ($) {
    /******* SOCIAL *********/
    social_quantity = $('#header .socials a').length;
    social_height = Math.ceil(social_quantity / ( parseInt($('#header .socials').width()) / 39 )) * 39;
    if (social_height > 39) {
        $('#header .socials .slide').hover(function () {
            $(this).animate({
                height:social_height
            }, 300, 'swing');
        }, function () {
            $(this).animate({
                height:'32'
            }, 200, 'swing');
        });
    }
    if ($.browser.msie) {
        //no opacity on png!
    }
    else {
        $('#header .socials a').css('opacity', '0.6').hover(function () {
                $(this).fadeTo(300, 1);
            },
            function () {
                $(this).fadeTo(300, 0.6);
            })
    }
    /******* PORTFOLIO ELASTIC **********/
    if ($('.portfolio-elastic .item').length) {
        $container_1 = $('.portfolio-elastic');
        $container_1.imagesLoaded(function () {
            $container_1.masonry({
                itemSelector:'.item:visible',
                isAnimated:true,
                animationOptions:{
                    duration:350,
                    easing:'linear',
                    queue:false
                }
            });
        });
        equalHeight($(".portfolio_desc_below"));
    }
    if ($('#variant-liquid').length) {
        $container_2 = $('#variant-liquid');
        $container_2.imagesLoaded(function () {
            $container_2.masonry({
                itemSelector:'.liquid-item',
                isAnimated:!Modernizr.csstransitions,
                animationOptions:{
                    duration:750,
                    easing:'linear',
                    queue:false
                }
            });
        });
    }
    function equalHeight(group) {
        var tallest = 0;
        group.each(function () {
            var thisHeight = $(this).height();
            if (thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        group.height(tallest);
    }
    /******* PORTFOLIO DYNAMIC SORTING *******/
    if ($('#portfolioList.dynamic').length) {
        $('#portfolioList a').click(function (event) {
            event.preventDefault();
            $('#portfolioList a.selected').removeClass('selected');
            items_class = $(this).attr('class');
            $(this).addClass('selected');
            if (items_class == 'portfolio_cat-all') {
                $('.portfolio-elastic > div.item').fadeIn(300);
                $('.portfolio-elastic > div.item').promise().done(function () {
                    $('.portfolio-elastic').masonry({
                        itemSelector:'.item:visible'
                    }).masonry('reload');
                });
            }
            else {
                $('.portfolio-elastic > div.item').not('.' + items_class).fadeOut(300);
                $('.portfolio-elastic > div.' + items_class).fadeIn(300);
                $('.portfolio-elastic > div.item').promise().done(function () {
                    $('.portfolio-elastic').masonry({
                        itemSelector:'.item:visible'
                    }).masonry('reload');
                });
            }
        })
    }
    /* Accordion */
    $(".acc_content").hide();
    $(".acc_title:first").addClass("active_acc menu_line_top link_hover");
    $(".acc_content:first").show();
    $(".acc_title").click(function () {
        $(".acc_title").removeClass("active_acc  menu_line_top link_hover"); //Remove any "active" class
        $(this).addClass("active_acc  menu_line_top link_hover"); //Add "active" class to selected tab
        $(".acc_content").hide(); //Hide all tab content
        var activeTab = $(this).parent(); //Find the rel attribute value to identify the active tab + content
        activeTab = $(activeTab).children(".acc_content"); //Fade in the active content
        $(activeTab).fadeIn();
        return false;
    });
    $(".acc_title").hover(function () {
            $(this).addClass("link_hover");
        },
        function () {
            if (!$(this).hasClass('active_acc')) {
                $(this).removeClass("link_hover");
            }
        }
    );
    /******* TABS *********/
        //Default Action
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active menu_line_top").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content
    //On Click Event
    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active  menu_line_top"); //Remove any "active" class
        $(this).addClass("active  menu_line_top"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });
    /******* ALPHA SCOPE *********/
    if ($('.alpha-scope').length) {
        $('.alpha-scope').each(function () {
            if ($(this).hasClass('alpha-scope-double-icon') || $(this).hasClass('alpha-scope-single-icon')) {
                $('<span class="alpha-scope-all"><span class="alpha-scope-bg"></span></span>').appendTo(this).hide();
                $(this).find('a').appendTo($(this).children('.alpha-scope-all'));
            }
            else {
                $('<span class="alpha-scope-all"><span class="alpha-scope-bg"></span><span class="alpha-scope-icon"></span></span>').appendTo(this).hide();
            }
            $('.alpha-scope-bg').css('opacity', '0.5');
            $('.alpha-scope').hover(function () {
                $(this).children('span').fadeIn(300);
            }, function () {
                $(this).children('span').fadeOut(300);
            });
        });
    }
    /** Comment validation ***/
    if ($('#commentform').length) {
        //fix for not submiting form after check http://jibbering.com/faq/names/
        $('#comment-submit').attr('name', 'othername');
        $('#commentform').addClass('styled-form').removeClass('validated').submit(function (e) {
            if ($(this).hasClass('validated')) {
                return true;
            }
            else {
                e.preventDefault();
                error_number = 0;
                $(this).find('input.required, textarea').each(function () {
                    if ($.trim($(this).val()) == '') {
                        $(this).addClass('error');
                        error_number++;
                        return;
                    }
                    if ($(this).is('#email')) {
                        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                        if ($(this).val().search(emailRegEx) == -1) {
                            $(this).addClass('error');
                            error_number++;
                            return;
                        }
                    }
                    // everythin ok
                    $(this).removeClass('error');
                });
                if (error_number == 0) {
                    $(this).addClass('validated').submit();
                }
            }
        });
    }
    /** Contact validation ***/
    if ($('.contact-form').length) {
        $('.contact-form').removeClass('validated').submit(function (e) {
            if ($(this).hasClass('validated')) {
                return true;
            }
            else {
                e.preventDefault();
                error_number = 0;
                $(this).find('input[type="text"], textarea').each(function () {
                    if ($.trim($(this).val()) == '' && $(this).attr(id) != 'apollo13-contact-subject') {
                        $(this).addClass('error');
                        error_number++;
                        return;
                    }
                    if ($(this).is('#email')) {
                        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                        if ($(this).val().search(emailRegEx) == -1) {
                            $(this).addClass('error');
                            error_number++;
                            return;
                        }
                    }
                    // everythin ok
                    $(this).parent().removeClass('error');
                    $('div#message_send').fadeIn(800);
                });
                if (error_number == 0) {
                    $(this).addClass('validated').submit();
                }
            }
        });
    }
    $('a.alpha-scope').hover(
        function () {
            var children = $(this).children('div.fancybox_hover');
            if (children.length == 0) {
                var content = '<div class="fancybox_hover"></div>';
                $(this).stop(true, true).append(content);
            }
            var height = $(this).children('img').height();
            $(this).children('div.fancybox_hover').height(height);
            $(this).children('div.fancybox_hover').stop(true, true).fadeIn();
        },
        function () {
            $(this).children('div.fancybox_hover').stop(true, true).fadeOut();
        }
    );
});