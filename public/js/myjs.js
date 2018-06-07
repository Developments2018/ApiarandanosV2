$(document).ready(function () {

    $("#remember").change(function () {
        var isChecked = $(this).prop("checked");
        if (isChecked) {
            var email = $("#email").val();
            localStorage.setItem("email", email);
        } else {
            localStorage.setItem("email", "");
        }
    })
    window.addEventListener("load", function () {
        var remember = localStorage.getItem("email");
        if (remember) {
            $("#remember").prop("checked", true)
            $("#email").val(remember)
        }
    })

   //ejemplo codigo select dependientes
   $('select[name="article_id"]').change(function () {
       
        var articleID = $(this).val();
        var berrieID = $('#berrie_id').val();
        if (articleID && berrieID) {
            $.ajax({
                url: '/admin/trays/tray_return/ajax1/' + articleID+ '/'+ berrieID,
                type: "GET",
                dataType: "json",
                data:{articleID:articleID,berrieID:berrieID},
                success: function (data) {

                    $('select[name="articulo"]').empty();
                    $.each(data, function (key, value) {
                        $('#b_p').val(key)
                        
                    });
                }
            });
        } else {
            $('select[name="articulo"]').empty();
        }
    })

    $('select[name="article_id"]').change(function () {
        var articleID = $(this).val();
        var berrieID = $('#berrie_id').val();
        if (articleID && berrieID) {
            $.ajax({
                url: '/admin/trays/tray_return/ajax2/' + articleID+ '/'+ berrieID,
                type: "GET",
                dataType: "json",
                data:{articleID:articleID,berrieID:berrieID},
                success: function (data) {

                    $('select[name="articulo"]').empty();
                    $.each(data, function (key, value) {
                        $('#b_d').val(key)
                        
                    });
                    
                    var b_p = $("#b_p").val();
                    var b_d = $("#b_d").val();
                    
                    var b_s =(parseInt(b_p)-parseInt(b_d));
            
            
                    $("#s_b").val(b_s);
                }
            });
        } else {
            $('select[name="articulo"]').empty();
        }
    })

    $('#detail').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) 
        var nombre = button.data('nombre') 
        var apellido = button.data('apellido') 
        var rut = button.data('rut') 
        var id = button.data('id') 
        var nombrecontrato = button.data('nombrecontrato')
        var finicio = button.data('finicio') 
        var ftermino = button.data('ftermino')  
        var afp = button.data('afp') 
        var salud = button.data('salud') 
        var salario = button.data('salario') 
        var modal = $(this)
  
        modal.find('.modal-body #nombre').val(nombre);
        modal.find('.modal-body #apellido').val(apellido);
        modal.find('.modal-body #rut').val(rut);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombrecontrato').val(nombrecontrato);
        modal.find('.modal-body #finicio').val(finicio);
        modal.find('.modal-body #ftermino').val(ftermino);
        modal.find('.modal-body #afp').val(afp);
        modal.find('.modal-body #salario').val(salario);
        modal.find('.modal-body #salud').val(salud);
  })
});