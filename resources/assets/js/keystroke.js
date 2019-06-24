var isCtrl = false;
var isShift = false;
document.onkeyup=function(e){
    if(e.which == 17) isCtrl=false;
    if(e.which == 16) isShift=false;
}
document.onkeydown=function(e){
    if(e.which == 17) isCtrl=true;
    if(e.which == 16) isShift=true;
    if(e.which == 37 && isCtrl == true && isShift == true) {
        //run code for CTRL+Shifr+leftArrow
        $("#prevBtn").click();
        return false;
    }
    if(e.which == 39 && isCtrl == true && isShift == true) {
        //run code for CTRL+Shifr+rightArrow
        $("#nextBtn").click();
        return false;
    }
}