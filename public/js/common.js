

$(document).ready(function() {
    $('.btn-hide').hide();

    var nav = $('.header');
    $('.btn-feedback').click(function() {
        alert('Your feedback|query has been sent to the concerned personnel.');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 65) {
            nav.addClass("header-scrolled");
        }
        else
        {
            nav.removeClass("header-scrolled");
        }

    });
    $('.btn-show').click(function() {
        var id = $(this).attr('id');
        var i = id.substring(5);

        $('#btn-' + i).show();
        $('#show-' + i).hide();

    });
    $('.btn-hide').click(function() {
        var id = $(this).attr('id');
        var i = id.substring(4);

        $('#show-' + i).show();
        $('#btn-' + i).hide();
    });

});







function loadNull(i) {
    document.getElementById(i).style.display = 'none';
    document.getElementById('btn-' + i).style.display = 'none';
    document.getElementById('lessPara-' + i).style.display = 'block';
}
function changeContent(i) {
    document.getElementById(i).style.display = 'block';
    document.getElementById('btn-' + i).style.display = 'block';
    document.getElementById('lessPara-' + i).style.display = 'none';

}


function loadInitial() {
    var i;
    for (i = 1; i <= 5; i++)
    {
        document.getElementById(i).style.display = 'none';
    }

}


//for academic.html
function init() {
    $('.academic-content').click(function() {
        $('#b-info').toggle();

    });
}
