function messageGo(frameID){
    var frame_id = $(":checked")[0].value; 
    console.log(frameID);                   
      $.ajax({
          //告訴程式表單要傳送到哪裡                                         
          url:"Member.php",                                                              
          //需要傳送的資料
          data:{
            'frameID': frameID
        }, 
           //使用POST方法     
          type : "POST",                                                                    
          //接收回傳資料的格式，在這個例子中，只要是接收true就可以了
          dataType:'json', 
           //傳送失敗則跳出失敗訊息      
          error:function(jqXHR){                                                                 
          //資料傳送失敗後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
          console.log(data);
          alert("失敗");
          alert(jqXHR.statusText);
          alert(jqXHR.responseText);
          },
          //傳送成功則跳出成功訊息
          success:function(data){                                                           
          //資料傳送成功後就會執行這個function內的程式，可以在這裡寫入要執行的程式  
          alert("成功");
          }
      }) ;
  };
  
//   $(document).ready(function(){
//     $("#submot_message").click(function(){
//         alert(frame_id);
//     });
//   });