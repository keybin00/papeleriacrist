function getNewProduct(){
  key=$("#clave_producto").val();
  n=parseInt($("#cantidad").val());
  if (key!="" && n>0 ){
    //alert(key+" "+n);
    searchProduct(key,n);
  }else{
    alert("Datos no validos");
  }
}

function searchProduct(k,num){
$.post(  window.location.pathname+"/searcher", { key: k, num: n, _token:token })
  .done(function( data ) {
    //alert( "Data Loaded: " + data );
    JsonHandler(data);
  })
  .fail(function(data) {
    alert( "error" +data.responseText);
  });
}

function JsonHandler(data){
  data=JSON.parse(data);
  if (data.valid){
    if (!findInProducts(data.k)){
      products.push(data);
      total=total+data.s;
      addData(data);
      alterCampos();
    }else{
      alert('Producto ya en lista');
    }
  }else{
    alert(data.error);
  }
}

function alterCampos(){
  $("#total").val(total);
  $("#clave_producto").val("");
  $("#cantidad").val(0);
}

function findInProducts(k){
  var result = $.grep(products, function(e){ return e.k == k; });
  if (result.length == 0) {
    return false
  } else if (result.length == 1) {
  // access the foo property using result[0].foo
    return true
  } else {
  // multiple items found
    return true
  }
}

function addData(data){
  row=getRow(data);
  $("tbody").html($("tbody").html()+row);
}


function removeProduct(k,s){
  total=total-s;
  $("#total").val(total);
  $("tr#"+k).remove();
  products = $.grep(products, function(e){ return e.k != k; });
}

function getRow(data){
  row = '<tr id="'+data.k+'">\
       <th>'+data.d+'</th>\
       <th>'+data.p+'</th>\
       <th>'+data.n+'</th>\
       <th>'+data.s+'</th>\<th><a class="btn btn-sm btn-primary btn-table" onclick="removeProduct(\''+data.k+'\','+data.s+')">\
       <i class="fa fa-trash"></i></a></th></tr>';
   return row;
}
