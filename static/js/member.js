$(document).ready(function(){
    $("[data-btn='confirm-change-frame']").on("click",function(){
        // 檢查是否有選擇頭像框
        if ($("[name='avatar_frame']:checked").length == 0) {
            alert("請選擇要更換的頭像框!");
            return;
        }

        $.ajax({
            url: "setMemberFrame.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: {
                'frameId': $("[name='avatar_frame']:checked")[0].value
            },
            success: function(data) {
                console.log(data);

                // change data-user-frame border color
                // border: .4rem solid #color;
                $("[data-user-frame]")[0].style.border = ".4rem solid " + data.data[1];

                // alert success message
                alert('成功');

            },
            error: function(jqXHR) {
                alert(jqXHR.statusText);
                alert(jqXHR.responseText);
            }
        });
    });

});

