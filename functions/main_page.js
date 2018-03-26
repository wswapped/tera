$(document).ready(function(){

    // initials things
    //alert(_PIP_U_("#contact"));
    //alert(_PIP_U(".99.111.104.110.42.103.106.98.100.105.41.99.111.104.103."));
   
    var buttOx = _PIP_U(".30.94.106.105.111.92.94.111.61.79.73.");
    $(buttOx).click( function(e){
        var buttO = _PIP_U(".30.94.106.105.111.92.94.111.");
        var locaTe = _PIP_U(".99.111.104.110.42.109.96.98.100.110.111.96.109.41.99.111.104.103.");
        $(buttO).html(loadIng);
        $(buttO).load(locaTe);
    })
    buttOx = _PIP_U(".30.92.93.106.112.111.61.79.73.");
    $(buttOx).click( function(e){
        
        var locaTe = _PIP_U(".99.111.104.110.42.103.106.98.100.105.41.99.111.104.103.");
        var buttO = _PIP_U(".30.92.93.106.112.111.");
        $(buttO).html(loadIng);
        $(buttO).load(locaTe);
    });
    // initials things
});