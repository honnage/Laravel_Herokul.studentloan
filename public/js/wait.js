$(document).ready(function(){
    $('.wait').click(function(evt){
        var name=$(this).data("name");
        // var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`กำลังตรวจสอบข้อมูล`,

            text:`ข้อมูลรหัส ${name} นี้ กำลังดำเนินการ...`,
            icon:"info",
            // buttons:true,
            dangerMode:true
        })
    });
});
