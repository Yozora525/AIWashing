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

// 改變訂單狀態
function ChangeOrderStatus(OrderId, Status,href,ConfirmMsg) {
    if (typeof(OrderId) != "string") {
        alert('OrderId must be string!');
        return;
    }

    if (typeof(Status) != "number") {
        alert('Status must be number!');
        return;
    }

    if (typeof(href) != "string") {
        alert('href must be string!');
        return;
    }

    ConfirmMsg = ConfirmMsg || '確定更改訂單狀態嗎？';

    $.ajax({
        url:"changeOrderStatus.php",
        type: "POST",
        async:true,
        dataType: "json",
        data: {'orderId':OrderId,'status':Status},
        success: function(data) {
            console.log(data);
            if (data.res != 'success') {
                alert(data.msg);
                return;
            } else {
                location.href = href;
            }
        },
        error: function(jqXHR) {
            alert(jqXHR.statusText);
            alert(jqXHR.responseText);
        }
    });
}