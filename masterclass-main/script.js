
function registro(){
var elemento={
  id:$("#ID").val(),
  owner:$("#OWNER").val(),
  capacity:$("#CAPACITY").val(),
  category_id:$("#CATEGORY_ID").val(),
  name:$("#NAME").val()
  }

var dataToSend=JSON.stringify(elemento);
//JSON= JavaScript Object Notation
$.ajax({
      dataType: 'json',
      data:elemento,
      url:"https://gf617fc57ad0338-bdretouno.adb.sa-saopaulo-1.oraclecloudapps.com/ords/admin/audience/audience",
      type:'POST',
      
      success:function(response) {
        console.log(response);
      },
      
      error: function(jqXHR, textStatus, errorThrown) {
            
      }
  });

}

function obtenerItems(){

  $.ajax({
      dataType: 'json',
      url:"https://gf617fc57ad0338-bdretouno.adb.sa-saopaulo-1.oraclecloudapps.com/ords/admin/audience/audience",
      type:'GET',
      

      success:function(response) {
       
        var misItems=response.items;

        for(i=0;i<misItems.length;i++){
         
          $("#miResultado").append("<tr>");
          $("#miResultado").append("<td>"+misItems[i].name+"</td>");
          $("#miResultado").append("<td>"+misItems[i].price+"</td>");
          $("#miResultado").append("<td>"+misItems[i].description+"</td>");
          $("#miResultado").append('<td><button onclick="borrar('+misItems[i].id+')">Borrar</button></td>');
          $("#miResultado").append('<td><button onclick="obtenerItemEspecifico('+misItems[i].id+')">Cargar</button></td>');
          $("#miResultado").append("</tr>");

        }

      },
      
      error: function(jqXHR, textStatus, errorThrown) {
            
      }
  });

}


function borrar(idElemento){
var elemento={
  id:idElemento
};


var dataToSend=JSON.stringify(elemento);
//JSON= JavaScript Object Notation
$.ajax({
      dataType:'json',
      data:dataToSend,
      url:"https://gf617fc57ad0338-bdretouno.adb.sa-saopaulo-1.oraclecloudapps.com/ords/admin/audience/audience",
      type:'DELETE',
      contentType:'application/json',
      success:function(response) {
        console.log(response);
      },
      
      error: function(jqXHR, textStatus, errorThrown) {
            
      }
  });
}


function obtenerItemEspecifico(idItem){
  $.ajax({
      dataType: 'json',
      url:"https://gf617fc57ad0338-bdretouno.adb.sa-saopaulo-1.oraclecloudapps.com/ords/admin/audience/audience"+idItem,


      type:'GET',
      success:function(response) {
        console.log(response);
        var item=response.items[0];

        $("#miId").val(item.id);
        $("#name").val(item.name);
        $("#description").val(item.description);
        $("#price").val(item.price);



      },
      
      error: function(jqXHR, textStatus, errorThrown) {
            
      }
  });

}

function actualizar(){
var elemento={
  id:$("#miId").val(),
  name:$("#name").val(),
  description:$("#description").val(),
  price:$("#price").val()
  }


var dataToSend=JSON.stringify(elemento);
//JSON= JavaScript Object Notation
$.ajax({
      dataType: 'json',
      data:dataToSend,
      contentType:'application/json',
      url:"https://gf617fc57ad0338-bdretouno.adb.sa-saopaulo-1.oraclecloudapps.com/ords/admin/audience/audience",
      type:'PUT',
      
      success:function(response) {
        console.log(response);
      },
      
      error: function(jqXHR, textStatus, errorThrown) {
            
      }
  });

}


