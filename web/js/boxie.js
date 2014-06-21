$(document).ready(function() {
    // Search input text handling on focus
    var $searchq = $("#search-q").attr("value");
    $('#search-q.text').css('color', '#999');
    $('#search-q').focus(function(){
        if ( $(this).attr('value') == $searchq) {
            $(this).css('color', '#555');
            $(this).attr('value', '');
        }
    });
    $('#search-q').blur(function(){
        if ( $(this).attr('value') == '' ) {
            $(this).attr('value', $searchq);
            $(this).css('color', '#999');
        }
    });
    // Switch categories
    $('#h-wrap').unbind();
    $('#h-wrap ul').unbind();
    $('#h-wrap').hover(function(){
        $(this).toggleClass('active');
        $("#h-wrap ul").css('display', 'block');
    }, function(){
        $(this).toggleClass('active');
        $("#h-wrap ul").css('display', 'none');
    });
    // Handling with tables (adding first and last classes for borders and adding alternate bgs)
    $('tbody tr:even').addClass('even');
    $('table.grid tbody tr:last-child').addClass('last');
    $('tr th:first-child, tr td:first-child').addClass('first');
    $('tr th:last-child, tr td:last-child').addClass('last');
    $('form.fields fieldset:last-child').addClass('last');
    // Handling with lists (alternate bgs)
    $('ul.simple li:even').addClass('even');
    // Handling with grid views (adding first and last classes for borders and adding alternate bgs)
    $('.grid .line:even').addClass('even');
    $('.grid .line:first-child').addClass('firstline');
    $('.grid .line:last-child').addClass('lastline');
    // Tabs switching
    $('#box1 .content#box1-grid').hide(); // hide content related to inactive tab by default
    $('#box1 .header ul a').click(function(){
        $('#box1 .header ul a').removeClass('active');
        $(this).addClass('active'); // make clicked tab active
        $('#box1 .content').hide(); // hide all content
        $('#box1').find('#' + $(this).attr('rel')).show(); // and show content related to clicked tab
        return false;
    });

    $('.sf_admin_filter input[type=text],.sf_admin_form input[type=text],.sf_admin_form input[type=password]').each(function() {
        $(this).addClass('txt');
        if($(this).attr('type')=='password')
        {
            $(this).addClass('pwd');
        }
    });


    $('.sf_admin_filter label').each(function() {
        $(this).css('display','block');
    });


});