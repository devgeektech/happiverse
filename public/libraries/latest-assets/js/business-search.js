
$('#searchBusiness').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: "/search-business",
        data: {
            'searchBusiness': $value
        },
        success: function (data) {
            $('tbody').html(data);
        }
    });
});
