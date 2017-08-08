function selectQueryBody(str) {
    $.ajax({
        url: "/page2/studio",
        type: "POST",
        data: {studio: str},
        dataType: "html"
    }).done(function (data) {
        $('#wrapper').html(data);
        console.log('ok');
    });
}