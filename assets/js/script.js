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
});
