$(document).ready( function() {
    corporateData();
    fetch();
});

function fetch() {

    setTimeout( function() {
        corporateData();
        fetch();
    }, 100);

}

function corporateData() {

    $.ajax({

        url: "http://localhost/iiuctmd/ad/min/admin/map/map.php",
        dataType: "xml",
        success: function(data) {

            $("ul").children().remove();

            $(data).find("lat").each( function() {

                var info = '<li>Name: '+$(this).find("lng").text()+'</li>
                    <li>Age: '+$(this).find("speed").text()+'</li>
                <li>Company: '+$(this).find("type").text()+'</li>';

                $("ul").append(info);

            });

        },
        error: function() { $("ul").children().remove();
            $("ul").append("<li>There was an error baby!</li>"); }
    });
}