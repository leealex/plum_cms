var items = $('.image-browser-item');
items.on('click', function () {
    items.removeClass('active');
    $(this).addClass('active');
    $('.image-preview img').attr('src', $(this).find('img').attr('src'));
    $('#image-browser-input').val($(this).find('img').attr('src'))
});