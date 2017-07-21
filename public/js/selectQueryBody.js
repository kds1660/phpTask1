function selectQueryBody(str) {
    $.ajax({
        url: "/response/response",
        type: "POST",
        data: {studio : str},
        dataType: "html"
    }).done(function (data) {
        $('.block').remove();
        var div=$('<div>');
        div.addClass('block');
        $('form').after(div);
        $('.block').html(data);

    });

    /*xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        this.preventDefault();
        $('.block').remove();
        if (this.readyState == 4 && this.status == 200) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(this.responseText, "text/html");
            doc = doc.getElementById('wrapper');
            document.getElementById("wrapper").innerHTML=doc.innerHTML;
        }
    };

    xmlhttp.open("GET", "/response/response");
    xmlhttp.send();*/
}