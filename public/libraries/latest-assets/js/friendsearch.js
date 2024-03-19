$('#headerSearch').on('keyup', function () {

    $value = $(this).val();

    $.ajax({

        type: 'get',

        url: "search-people",

        data: {

            'searchPeople': $value

        },

        success: function (data) {

            var serach = $('#tbody').html(data);
            console.log(serach);

        }

    });

    // console.log(data);

});