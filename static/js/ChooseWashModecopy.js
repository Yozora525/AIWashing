    // 選擇領送/回時，啟用js
    $(function () {
      $("[data-send='sendToWay1']").on("change", function () {
        // 印出你選擇的value
        console.log($("[data-send='sendToWay1']")[0].value);
        // 印出你選擇的文字
        console.log($("[data-send='sendToWay1'] :selected")[0].textContent);
        // $("[data-send='sendToWay1']").hide();
        // 用變數儲存選擇的模式
        let mode = $("[data-send='sendToWay1'] :selected")[0].textContent;
        //
        if (mode == "集中櫃送洗") {
          $("#SentToCabinet")[0].style.display = "block";
          $("#SentToSelf")[0].style.display = "none";
          $("#SentToPanda")[0].style.display = "none";
        } else if (mode == "到店送洗") {
          $("#SentToSelf")[0].style.display = "block";
          $("#SentToCabinet")[0].style.display = "none";
          $("#SentToPanda")[0].style.display = "none";
        } else if (mode == "外送洗衣") {
          $("#SentToPanda")[0].style.display = "flex";
          $("#SentToSelf")[0].style.display = "none";
          $("#SentToCabinet")[0].style.display = "none";
        }
      });

      $("[data-send='sendBackWay2']").on("change", function () {
        // 印出你選擇的value
        console.log($("[data-send='sendBackWay2']")[0].value);
        // 印出你選擇的文字
        console.log($("[data-send='sendBackWay2'] :selected")[0].textContent);
        // $("[data-send='sendToWay1']").hide();
        // 用變數儲存選擇的模式
        let mode = $("[data-send='sendBackWay2'] :selected")[0].textContent;
        //
        if (mode == "集中櫃取衣") {
          $("#SelfBackCabinet")[0].style.display = "block";
          $("#SelfBackSelf")[0].style.display = "none";
          $("#SelfBackPanda")[0].style.display = "none";
        } else if (mode == "到店取衣") {
          $("#SelfBackSelf")[0].style.display = "block";
          $("#SelfBackCabinet")[0].style.display = "none";
          $("#SelfBackPanda")[0].style.display = "none";
        } else if (mode == "外送取衣") {
          $("#SelfBackPanda")[0].style.display = "flex";
          $("#SelfBackSelf")[0].style.display = "none";
          $("#SelfBackCabinet")[0].style.display = "none";
        }
      });
    });






    // // 當選擇洗衣模式時,顯示洗衣模式的名稱
    // $("[data-select='washMode']").on("change", function() {
    //   // 印出你選擇的value
    //   console.log($("[data-select='washMode']")[0].value);
    //   // 印出你選擇的文字
    //   console.log($("[data-select='washMode'] :selected")[0].textContent);
    //   // 用變數儲存選擇的模式
    //   var mode = $("[data-select='washMode'] :selected")[0].textContent;
    // });