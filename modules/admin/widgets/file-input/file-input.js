var fileInput = {
    input: '',
    ids: '',
    wrapper: $('.images-wrapper'),
    upload: function () {
        this.input.on('change', function () {
            for (var i = 0; i < this.files.length; i++) {
                var form = new FormData();
                var file = this.files[i];
                form.append("files[]", file);
                form.append("Media[parent]", $(this).data('parent'));
                if ($(this).data('parent-id') !== undefined) {
                    form.append("Media[parent_id]", $(this).data('parent-id'));
                }
                fileInput.wrapper.append('<div class="media-container" data-id="pending"><div class="loader"></div></div>');
                $.ajax({
                    type: 'POST',
                    url: '/admin/media/upload',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.url == null) {
                            $('[data-id="pending"]:eq(0)')
                                .html('<p class="text-center text-danger">' + data.error + '</p>');
                        } else {
                            $('[data-id="pending"]:eq(0)')
                                .attr('data-id', data.id)
                                .html('<img class="media-container-image" src="' + data.url + '"/><span class="media-delete"></span>');
                        }
                        fileInput.updateOrder(fileInput.wrapper.children('div'));
                    }
                });
            }
        });
    },
    delete: function () {
        $('.media-delete').off('click').on('click', function () {
            $.post({
                url: '/admin/media/delete',
                data: {ids: $(this).parent('.media-container').data('id')}
            });
            $(this).parent('.media-container').remove()
        })
    },
    /**
     * Delete images if user closes the page
     * or save them if the form is valid
     */
    beforeSave: function () {
        $(window).on('beforeunload', function () {
            if ($(fileInput.input).data('parent-id') === undefined && fileInput.ids.val() !== '') {
                $.post({
                    url: '/admin/media/delete',
                    data: {ids: fileInput.ids.val().split(',')}
                })
            }
        });
        $('form').on('afterValidate', function (e, msg, errors) {
            if (errors.length === 0) {
                $(window).off('beforeunload');
            }
        });
    },
    sortable: function () {
        new Sortable(fileInput.wrapper[0], {
            ghostClass: 'drag-ghost',
            onUpdate: function (e) {
                fileInput.updateOrder(e.to.children)
            }
        });
    },
    updateOrder: function (items) {
        var result = [];
        for (var i = 0; i < items.length; i++) {
            result.push($(items[i]).attr('data-id'));
        }
        fileInput.ids.val(result.join());
        $.post({
            url: '/admin/media/update-order',
            data: {ids: result}
        });
        fileInput.delete();
    },
    init: function () {
        this.beforeSave();
        this.upload();
        this.sortable();
        this.delete();
    }
};