$(document).ready(function(){
    $('.fail').click(function(evt){
        var name=$(this).data("name");
        // var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`ไม่สามารถลบข้อมูลนี้ได้`,

            text:`ข้อมูลรหัส ${name} นี้ ได้อนุมัติผ่านแล้ว`,
            icon:"warning",
            // buttons:true,
            dangerMode:true
        })
    });
});
