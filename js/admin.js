$(document).ready(function(){


    $("#actions a").click(function(e){
        e.preventDefault();

        var value_xml = $(this).data("xml");
        var value_pdf = $(this).data("pdf");

        if (typeof value_xml !== "undefined") {
            $.get("generate_xml.php", {id:value_xml}, function(data, status, xhr){
                alert(data);
            });
        }

        if (typeof value_pdf !== "undefined") {
            $.get("generate_pdf.php", {id:value_pdf}, function(data, status, xhr){
                alert(data);
            });
        }

    });

    $("#actions-all li a").click(function(e){
        e.preventDefault();

        var value_xml = $(this).data("xml");
        var value_pdf = $(this).data("pdf");

        if (typeof value_xml !== "undefined") {
            $.get("generate_xml_all.php", {}, function(data, status, xhr){
                alert(data);
            });
        }

        if (typeof value_pdf !== "undefined") {
            $.get("generate_pdf_all.php", {}, function(data, status, xhr){
                alert(data);
            });
        }

    });



});
