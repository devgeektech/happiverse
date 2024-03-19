// var ENDPOINT = "{{ url('/') }}";
// alert(ENDPOINT);
var page = 1;
var userId = $(location).attr("href").split('/').pop();

infinteLoadMore(page);
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        infinteLoadMore(page);
    }
});

function infinteLoadMore(page) {
   
    $.ajax({
            url: "people-post/" + userId + "?page=" + page,
            datatype: "html",
            type: "get",
            beforeSend: function () {
                $('.loadMore').show();
            }
        })
        .done(function (response) {
            if (response.length == 0) {
                $('.loadMore').html("We don't have more data to display :(");
                return;
            }
            $('.loadMore').hide();
            $("#people-posts").append(response);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
}
