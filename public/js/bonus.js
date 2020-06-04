$(document).ready(function(){
    $('.deleteform').click(function(evt){
        var name=$(this).data("name");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`ต้องการลบข้อมูลหรือไม่ ?`,
            text:`ถ้าลบข้อมูลรหัส ${name} นี้ แล้วไม่สามารถกู้คืนได้`,
            icon:"warning",
            buttons:true,
            dangerMode:true
        }).then((wilDelete)=>{
            if(wilDelete){
                form.submit();
            }
        });
    });
});
