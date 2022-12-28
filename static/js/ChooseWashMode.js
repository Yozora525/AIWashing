    // 選擇領送/回時，啟用js
    $(function () {

      // 當選擇洗衣模式時,顯示洗衣模式的名稱
      $("[data-select='washMode']").on("change", function() {
        // 印出你選擇的value
        console.log($("[data-select='washMode']")[0].value);
        // 印出你選擇的文字
        console.log($("[data-select='washMode'] :selected")[0].textContent);

        // 用變數儲存選擇的模式
        var mode = $("[data-select='washMode'] :selected")[0].textContent;

        
      });
      
        //全部選擇隱藏
        $('div[id^="tab1_"]').hide();
        $('#slt1').on("change",function () {
          console.log($('[data-send1]'));
          $('div[id^="tab1_"]').hide();
          //指定選擇顯示
          let ltvalue=$('[data-send1]')
          $(ltvalue).show();
        });


        $('div[id^="tab2_"]').hide();
        $('#slt2').on("change",function () {
          console.log($('[data-send2]'));
          $('div[id^="tab2_"]').hide();
          //指定選擇顯示$('div[id^="tab1_"]')
          let ltvalue=$('[data-send2]')
          $(ltvalue).show();
        });
      });