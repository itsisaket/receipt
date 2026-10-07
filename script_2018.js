    
function Home2(){
    $.ajax({
        url: 'index.php?r=Site/Home',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function Login(){
    $.ajax({
        url: 'index.php?r=Site/login',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}

//Office
function configOffice(){
    $.ajax({
        url: 'index.php?r=user/Office',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function testOffice(id){
    $.ajax({
        url: 'index.php?r=user/testOffice',
        type: 'GET',
        data: { id:id },
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function saveOffice(){
    $.ajax({
        url: 'index.php?r=user/saveOffice',
        type:'POST',
        data: $('#formOffice').serialize(),
        success: function(data){
            if( data == 'success' ){
              alert("บันทึกข้อมูลเรียบร้อยแล้ว..");
              configOffice();
            }  
        }
    });
return false;}
function editOffice(id){
    $.ajax({
        url: 'index.php?r=user/editOffice',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
            $('input[name=id]').val(obj.id);
            $('input[name=name]').val(obj.name);
            $('input[name=detail]').val(obj.detail);
            $('$text').val('a');
      } 
    });
return false;}
function deleteOffice(id){
    if(confirm("Delete Data ?")){
        $.ajax({
        url: 'index.php?r=user/deleteOffice',
        data: { id:id },
        success: function(result){
            if( result=='success' ){
                alert("ลบข้อมูลเรียบร้อยแล้ว..");
                }else{
                alert("Eorrer : ไม่สามารถลบข้อมูลได้");
                }
                configOffice(); 
            } 
        });
    }
return false;}

//User
function configUser(){
    $.ajax({
        url: 'index.php?r=user/User',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function SaveUser(){ 
    $.ajax({
        url: 'index.php?r=user/saveUser',
        type:'POST',
        data: $('#formUser').serialize(),
        success: function(data){
            if( data == 'success' ){
              alert("บันทึกข้อมูลเรียบร้อยแล้ว..");
              configUser();
            }  
        }
    });  
 
return false;}
function editUser(id){
    $.ajax({
        url: 'index.php?r=user/editUser',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
           // alert(data);
            $('input[name=id]').val(obj.id);
            $('input[name=name]').val(obj.name);
            $('select[name=office]').val(obj.office);
            $('select[name=status]').val(obj.status);
            $('input[name=ulogin]').val(obj.username);
            $('input[name=uname]').val(obj.username);
            $('input[name=password]').val(null);
      } 
    });
return false;}
function deleteUser(id){
    if(confirm("Delete Data ?")){
        $.ajax({
        url: 'index.php?r=user/deleteUser',
        data: { id:id },
        success: function(result){
            if( result=='success' ){
                alert("ลบข้อมูลเรียบร้อยแล้ว..");
                configUser();
                } 
            } 
        });
    }
return false;}

//Type
function configType(){
    $.ajax({
        url: 'index.php?r=type/Type',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function SaveType(){ 
    $.ajax({
        url: 'index.php?r=type/saveType',
        type:'POST',
        data: $('#formType').serialize(),
        success: function(data){
            if( data == 'success' ){
              alert("บันทึกข้อมูลเรียบร้อยแล้ว..");
              configType();
            }  
        }
    });  
return false;}
function editType(id){
    $.ajax({
        url: 'index.php?r=type/editType',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
           // alert(data);
            $('input[name=id]').val(obj.id);
            $('input[name=term]').val(obj.term);
            $('select[name=money]').val(obj.money);
            $('input[name=submoney]').val(obj.submoney);
      } 
    });
return false;}
function deleteType(id){
    if(confirm("Delete Data ?")){
        $.ajax({
        url: 'index.php?r=type/deleteType',
        data: { id:id },
        success: function(result){
            if( result=='success' ){
                alert("ลบข้อมูลเรียบร้อยแล้ว..");
                }else{
                alert("Eorrer : ไม่สามารถลบข้อมูลได้");
                }
                configType();
            } 
        });
    }
return false;}

//List
function configList(){
    $.ajax({
        url: 'index.php?r=type/List',
        success: function(data){
            $('#content').html(data);
        }
    });
return false;}
function SaveList(){ 
    $.ajax({
        url: 'index.php?r=type/saveList',
        type:'POST',
        data: $('#formList').serialize(),
        success: function(data){
            if( data == 'success' ){
              alert("บันทึกข้อมูลเรียบร้อยแล้ว..");
              configList();
            }  
        }
    });  
return false;}
function editList(id){
    $.ajax({
        url: 'index.php?r=type/editList',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
           // alert(data);
            $('input[name=id]').val(obj.id);
            $('select[name=term]').val(obj.term);
            $('select[name=typemoney]').val(obj.typemoney);
            $('input[name=name]').val(obj.name);
            $('input[name=price]').val(obj.price);
      } 
    });
return false;}
function deleteList(id){
    if(confirm("Delete Data ?")){
        $.ajax({
        url: 'index.php?r=type/deleteList',
        data: { id:id },
        success: function(result){
            if( result=='success' ){
                alert("ลบข้อมูลเรียบร้อยแล้ว..");
                configList();
                } 
            } 
        });
    }
return false;}

//Format
function configFormat(){
    $.ajax({
        url: 'index.php?r=type/Format',
        success: function(data){
            
            $('#content').html(data);
        }
    });
return false;}
function SaveFormat(){ 
    $.ajax({
        url: 'index.php?r=type/saveFormat',
        type:'POST',
        data: $('#formFormat').serialize(),
        success: function(data){
            if( data == 'success' ){
              alert("บันทึกข้อมูลเรียบร้อยแล้ว..");
              configFormat();
            }  
        }
    });  
return false;}
function editFormat(id){
    $.ajax({
        url: 'index.php?r=type/editFormat',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
         //   alert(data);
            $('input[name=id]').val(obj.id);
            $('select[name=ty_format]').val(obj.ty_format);
            $('select[name=term]').val(obj.term);
            $('select[name=typemoney]').val(obj.typemoney);
            $('input[name=name]').val(obj.name);
      } 
    });
return false;}
function deleteFormat(id){
    if(confirm("Delete Data ?")){
        $.ajax({
        url: 'index.php?r=type/deleteFormat',
        data: { id:id },
        success: function(result){
            if( result=='success' ){
                alert("ลบข้อมูลเรียบร้อยแล้ว..");
                configFormat();
                } 
            } 
        });
    }
return false;}
function termFormat(id){
    $.ajax({
        url: 'index.php?r=type/termFormat',
        type: 'GET',
        data: { id:id },
        datatype: 'json',  
        success: function(data, status){
            obj = JSON.parse(data);
                        alert(data); 
           $('select[name=typemoney]').val(obj[0].typemoney);
      } 
    });
return false;}
function addFormat(id){
     
    $.ajax({
        url: 'index.php?r=type/addFormat',
        data: { id:id},
        success: function(data){

        $( "#dialog_add" ).dialog( { 
                width: 700,
        });
        $( "#p" ).html(data);
        }
    });
return false;}
function SaveListformat(){ 
    $.ajax({
        url: 'index.php?r=type/SaveListformat',
        type:'POST',
        data: $('#formListformat').serialize(),
        success: function(data){
            if( data == 'success' ){
               // $( "#dialog_add" ).dialog('close');
                $( '#dialog_add' ).dialog('destroy');
                configFormat();
            }  
        }
    });  
 return false;}
 function ShowFormat(id){ 
    $.ajax({
        url: 'index.php?r=type/ShowFormat',
        data: { id:id},
        success: function(data){
        $( "#dialog_add" ).dialog( { 
                autoOpen: true,
                modal: true,
                width: 700,
                draggable: true,
                resizable: true 
        });
        $( "#p" ).html(data);
        }
    });  
 return false;}
 function configReceiptShow(){
    $.ajax({
        url: 'index.php?r=receipt/ReceiptShow',
        success: function(data){
         $('#content').html(data); 
        }
    });

return false;}

  function configReceipt(id){ 
    $.ajax({
        url: 'index.php?r=receipt/Receipt',
        //type:'POST',
        data: { id:id},
        success: function(data){
         $('#content').html(data);
        }
    });  
 return false;}
  function ShowListReceipt(id){ 
    $.ajax({
        url: 'index.php?r=receipt/ShowListReceipt',
        data: { id:id},
        success: function(data){
        $( "#showdia" ).dialog( { 
                autoOpen: true,
                modal: true,
                width: 700,
                draggable: true,
                resizable: true 
        });
        $( "#showp" ).html(data);
        }
    });  
}
   function addReceipt(id){ 
    $.ajax({
        url: 'index.php?r=receipt/addReceipt',
        data: { id:id},
        success: function(data){
         $('#content').html(data);
         $('input[name=CITIZEN_ID]').val('');
         $('input[name=CITIZEN_ID]').focus();
        }
    });  
 return false;}
function saveReceipt(){ 
    $.ajax({
        url: 'index.php?r=receipt/saveReceipt',
        type:'POST',
        data: $('#formReceipt').serialize(),
        success: function(data){
        $('input[name=CITIZEN_ID]').val(null);
         $('#content').html(data); 
        }
    });  
return false;}

//report
function repfReceipt(id){
    $.ajax({
        url: 'index.php?r=receipt/repfReceipt',
        data: { id:id},
        success: function(data){
            $('#content').html(data);
            $('input[name=datepicker]').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            });
            $('input[name=datepicker_end]').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            });            
        }
    });
return false;}
function RepuReceipt(){
    $.ajax({
        url: 'index.php?r=receipt/RepuReceipt',
        success: function(data){
            $('#content').html(data);
            $('input[name=datepicker]').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            })
            $('input[name=datepicker_end]').datepicker({
                dateFormat: 'yy-mm-dd',
                startDate: '-3d'
            });             
        }
    });
return false;}
function RepUser(){
    $.ajax({
        url: 'index.php?r=receipt/RepUser',
        type:'POST',
        data: $('#formRepUser').serialize(),
        success: function(data){
        $('input[name=CITIZEN_ID]').val(null);
         $('#content').html(data); 
        }
    });  
return false;}
function repFormat(){
    $.ajax({
        url: 'index.php?r=receipt/repFormat',
        type:'POST',
        data: $('#formRepFormat').serialize(),
        success: function(data){
         $('#content').html(data); 
        }
    });  
return ;}
function FormReceipt(){
    $.ajax({
        url: 'index.php?r=receipt/FormReceipt',
        success: function(data){
         $('#content').html(data); 
        }
    });
return false;}
function DelReceipt(){
    $.ajax({
        url: 'index.php?r=receipt/DelReceipt',
        type:'POST',
        data: $('#formDelReceipt').serialize(),
        success: function(data){
        alert("ลบข้อมูลเรียบร้อยแล้ว..");
         $('#content').html(data); 
        }
    });  
return false;}
function configSearch(){
    $.ajax({
        url: 'index.php?r=receipt/ReceiptSearch',
        success: function(data){
         $('#content').html(data); 
        }
    });
return false;}
function SearchReceipt(){
    $.ajax({
        url: 'index.php?r=receipt/SearchReceipt',
        type:'POST',
        data: $('#formSearch').serialize(),
        success: function(data){
         $('#content').html(data); 
        }
    });
return false;}

function configReceiptSeven(){
    $.ajax({
        url: 'index.php?r=receipt/ReceiptSeven',
        success: function(data){
         alert("กำลังดำเนินการ Counter Service ครับ..");
         $('#content').html(data); 
        }
    });
return false;}
function SevenReceipt(){
    $.ajax({
        url: 'index.php?r=receipt/SevenReceipt',
        type:'POST',
        data: $('#formSevenReceipt').serialize(),
        success: function(data){
         $('#content').html(data); 
        }
    });  
return false;}

function ReceiptSevenCopp(ss){
    $.ajax({
        url: 'index.php?r=receipt/ReceiptSevenCopp',
        type:'GET',
        data:{ ss:ss},
        success: function(data){
       // alert("กำลังดำเนินการ Counter Service ครับ..");
         $('#content').html(data); 
        }
    });
return false;}
 



