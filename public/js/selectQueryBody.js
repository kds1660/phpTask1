function selectQueryBody(str) {
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            document.getElementById("wrapper").innerHTML='';
           /* var parser=new DOMParser();
            var doc=parser.parseFromString(this.responseText,"text/html");
            console.log( doc.getElementById("wrapper"));
            document.getElementById("wrapper").HTML = doc.getElementById("wrapper");*/
            if (this.readyState == 4 && this.status == 200) {
                var parser=new DOMParser();
                var doc=parser.parseFromString(this.responseText,"text/html");
                doc = doc.getElementById('wrapper');
             document.getElementById("wrapper").appendChild(doc);
            }
        };

        xmlhttp.open("GET","/Page2/Show/"+str);
        xmlhttp.send();
}