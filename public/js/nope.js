$(document).ready(function(){
    $('.nope').click(function(evt){
        var name=$(this).data("name");
        // var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`ไม่สามารถดำเนินการได้`,

            text:`ข้อมูลรหัส ${name}  นี้ ยังไม่ได้อนุมัติว่า ผ่าน`,
            icon:"error",
            // buttons:true,
            dangerMode:true
        })
    });
});
