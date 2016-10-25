"use strict";

// $(document).ready(function(){
//   console.log("cargado el js admin");
//   controllers();
// });

$('#home-admin').click(function(){
  $.ajax({
    method: "POST",
    url: "index.php?action=show_home_body",
    contentType:'html',
    cache: false,
    success: function(data){
      $('#contenedor-data').html(data);
      controllers();
    }
  });
});

function controllers(event){
  console.log("controladores cargados");

  $('#ver-prods').click(function(event){
      $.ajax({
        method: "POST",
        url: "index.php?action=show_prod",
        contentType:'html',
        cache: false,
        success: function(data){
          $('#contenedor-data').html(data);
          addFuncAdminItems();
          addFuncEditItem();
          //controllers();
        }
      });
  });

  $('#add-prod').click(function(){
      $.ajax({
        method: "POST",
        url: "index.php?action=show_form",
        contentType:'html',
        cache: false,
        success: function(data){
          $('#contenedor-data').html(data);
          addFuncSubmit('add_prod');
        }
      });

  });

}


function addFuncSubmit(action){
  console.log(action);
  var testForm = document.getElementById('FormNewProd');
      testForm.onsubmit = function(event) {
        event.preventDefault();
      	var formData = new FormData(document.getElementById('FormNewProd'));
        // formData.append('appended1', 'appended value');
         $.ajax({
        	method: "POST",
        	url: "index.php?action="+action,
        	data: formData,
        	contentType: false,
        	cache: false,
        	processData:false,
        	success: function(data){
        	  $('#contenedor-data').html(data);
            addFuncAdminItems();
            addFuncEditItem();
        	}
      	});
    }
}

function addFuncAdminItems(){
  console.log("funcion de eliminar items cargada!!");
  $('.del-item').click(function(){
     var id=($(this).attr('data-id'));

     $.ajax({
        method: "POST",
        url: "index.php?action=delete_product&id="+id,
        contentType: false,
        cache: false,
        success: function(data){
          $('#contenedor-data').html(data);
          addFuncAdminItems();
          addFuncEditItem();
        }
      });
    });
}

function addFuncEditItem(){
  console.log("funcion de edicion cargada!!");
  $('.edit-item').click(function(){
     var id=($(this).attr('data-id'));

     $.ajax({
        method: "POST",
        url: "index.php?action=edit_product&id="+id,
        contentType: false,
        cache: false,
        success: function(data){
          $('#contenedor-data').html(data);
          swapFieldSet();
          addFuncSubmit('update_product');
        }
      });
    });
}

function swapFieldSet(){
  $('#id-prod').val($('#edit-id').val());
  $('#nombre-prod').val($('#edit-nombre').val());
  $('#precio-prod').val($('#edit-precio').val());
  $('#stock-prod').val($('#edit-stock').val());
  $('#desc-prod').val($('#edit-desc').val());
  $('#newprod-cat').val(''+$('#edit-cat').val());
}

$(document).ready(function(){
  console.log("la pagina esta recargada!");
  controllers();

});
