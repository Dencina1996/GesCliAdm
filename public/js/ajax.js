function ajaxSearch(){
    var filtro = $("input[type=text][name=filtro]").val();
    $.ajax({
            url: "/api/ajax",
            dataType: 'json',
            data: {filtro},
        })
        .done(function(val) {
            console.log(val);
            $('#ClientsTable').children().remove();
            CreateTable("#ClientsTable",val.data,undefined);
            createFilter('#ClientsTable table thead',"/","clientes","table");    
            paginateAjax(val);
            $('.clickable').each(function(){
            $(this).attr("data-href","/clients/"+$(this).attr("id"));
            })
            $('.clickable').click(function(){
                window.location=$(this).data('href');
            });
        })
        .fail(function(){
            console.log("Ha ocurrido un problema");
        })
        .always(function() {
        console.log("complete");
        });  
    }

function newClientAjax() {
    $.ajax({
        url: '/clients/create',
        type: 'POST',
        data: $('#form').serialize()
    })
    .done(function() {
        console.log("Se ha añadido el cliente");
        $('#costumModal10').modal('hide');
        ajaxSearch();
    })
    .fail(function() {
        console.log("Ha ocurrido un problema");
    })
    .always(function() {
        console.log("complete");
    });
    
}

function paginateAjax(val) {
    var start = val.from;
    var end = val.last_page;
    var paginator = $('.pagination').empty();
    for (var i = 1; i <= val.last_page; i++) {
        paginator.append('<li class="page-item"><a class="page-link" href="http://localhost:8000?page='+i+'">'+i);
        //var innerpage = $('<span>').attr('class', 'page-link');
        //innerpage.innerHTML = i;
        //page.after(innerpage);
   }
}   