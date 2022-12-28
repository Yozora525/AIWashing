    // 選擇領送/回時，啟用js
    $(function () {
      
        //全部選擇隱藏
        $('div[id^="tab1_"]').hide();
        $('#slt1').on("change",function () {
          console.log($('[data-send1]').val());
          $('div[id^="tab1_"]').hide();
          //指定選擇顯示
          let ltvalue=$('[data-send1]').val()
          $(ltvalue).show();
        });


        $('div[id^="tab2_"]').hide();
        $('#slt2').on("change",function () {
          console.log($('[data-send2]').val());
          $('div[id^="tab2_"]').hide();
          //指定選擇顯示$('div[id^="tab1_"]')
          let ltvalue=$('[data-send2]').val()
          $(ltvalue).show();
        });
      });