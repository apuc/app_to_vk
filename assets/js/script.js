$(document).ready(function(){
    $('#calendar').eCalendar({
        weekDays: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'],
        months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        eventTitle: 'Записис',
        events: [
            {title: 'Парикмахер 1', description: 'Стрижка кару (мастер 1)', datetime: new Date(2016, 1, 12, 17, 20)},
            {title: 'Парикмахер 2', description: 'Стрижка каскад (мастер 2)', datetime: new Date(2016, 1, 23, 16, 30)}
        ]
    });

    $(document).on('change', '.region', function(){
        var regionId = $('.region').val();
        $.ajax({
            type: 'POST',
            url: "/vk2/profile/get_city",
            data: 'regionId=' + regionId,
            success: function (data) {
                $('.city').html(data);
            }
        });
    });

    $(document).on('change', '.regionSearch', function(){
        var regionId = $('.regionSearch').val();
        $.ajax({
            type: 'POST',
            url: "/vk2/search/get_city/",
            data: 'regionId=' + regionId,
            success: function (data) {
                $('.search-city').html(data);
            }
        });
    });

    $(document).on('click', '.c-hours-grid-body-item', function(){
        if($(this).attr('active') != '1'){
            $(this).attr('active', 1);
            if($(this).hasClass('c-hours-grid-body-item-active')){
                $(this).removeClass('c-hours-grid-body-item-active');
            }
            else {
                $(this).addClass('c-hours-grid-body-item-active');
            }
        }
        else {
            $(this).attr('active', parseInt($(this).attr('active'), 10) + 1);
        }

    });

    $(document).on('change', '.status', function(){
        var status = $(this).val();
        var userId = $(this).attr('userId');
        $.ajax({
            type: 'POST',
            url: "/vk2/admin/edit_status/",
            data: 'status=' + status + '&userID=' + userId,
            success: function (data) {
                //$('.search-city').html(data);
            }
        });
    });

    /*$(document).on('click', '.c-hours-grid-body-item-active', function(){
        if($(this).attr('active') != '1'){
            $(this).removeClass('c-hours-grid-body-item-active');
        }
        else {
            $(this).attr('active', parseInt($(this).attr('active'), 10) + 1);
        }
    });*/
});
