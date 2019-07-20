function restrictAlphabets(e){
    var x = e.which || e.keycode;
    if(( x >= 48 && x <= 57) || x == 8 ||
        ( x >= 35 && x <= 40)|| x == 46)
        return true;
    else
        return false;
}