var settings = {
    counter: 0,
    table: $('.settings-table'),
    addRow: function () {
        var name = 'Settings[' + settings.counter + ']';
        var settingKey = '<td><div class="form-group"><input type="text" class="form-control" name="' + name + '[key]" value=""></div></td>';
        var settingValue = '<td><div class="form-group"><input type="text" class="form-control" name="' + name + '[value]" value=""></div></td>';
        var settingComment = '<td><div class="form-group"><input type="text" class="form-control" name="' + name + '[comment]" value=""></div></td>';
        settings.table.append('<tr>' + settingKey + settingValue + settingComment + '</tr>');
        settings.counter++;
    },
    deleteRow: function (id) {
        $.ajax({
            type: 'post',
            url: '/admin/settings/delete',
            data: {id: id}
        });
        console.log(id)
    }
};

$('#add-row').on('click', function () {
    settings.addRow();
});

$('.delete-row').on('click', function () {
    settings.deleteRow($(this).attr('id'));
    $(this).parent().parent().remove();
});