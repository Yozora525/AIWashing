// 按下查看詳情，顯示該項目的詳細資料
$("[data-seemore]").on("click", function () {

    for (let i = 0; i < $("[data-detail='"+ this.dataset.seemore +"']").length; i++) {
        if ($("[data-detail='"+ this.dataset.seemore +"']")[i].style.display == "none") {
            $("[data-detail='"+ this.dataset.seemore +"']")[i].style.display = "block";
        } else {
            $("[data-detail='"+ this.dataset.seemore +"']")[i].style.display = "none";
        }
        
        
    }

});