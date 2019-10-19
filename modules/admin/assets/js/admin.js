let admin = {
  searchItunes: function () {
    $('.itunes').on('click', function (e) {
      e.preventDefault();
      $.post({
        url: '/admin/track/search-itunes',
        data: {song: $('#track-author').val() + ' ' + $('#track-title').val()},
        success: function (data) {
          $('#itunes-result').html(data);

          console.log(data);
        }
      });
    });
  }
};

admin.searchItunes();