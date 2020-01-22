$(document).ready(function(){

    //edit_form
    $('.edit_form').on('submit', function(){
        if(confirm("ต้องการ แก้ไข ข้อมูลหรือไม่ ?")) {
            return true;
        } else {
            return false;
        }
    });

    //delete_form
    $('.delete_form').on('submit', function(){
        if(confirm("ต้องการ ลบ ข้อมูลหรือไม่ ?")) {
            return true;
        } else {
            return false;
        }
    });


});