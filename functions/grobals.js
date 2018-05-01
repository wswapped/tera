        
var loading = new Image();
var loading_small = new Image();
loading.src = "img/loader.gif";
loading_small.src = "img/loader.gif";
loading.style.width = "30%";
loading_small.style.width = "10%";
loading.style.margin = "auto";


    var error_status = true;
    var error_message = "";
    function VALIDATING(formId){
        var required_field = $(formId + " .required_field");
        var Email_field = $(formId + " .Email_field");
        var Nospecial_field = $(formId + " .Nospecial_field"); 
        var Email_field_ortel = $(formId + " .Email_field_ortel");

       // validation of required fields

        for(var i = 0; i<required_field.length;i++)
           {
            if(required_field[i].value=="")
            error_status = false;
            error_message = "some fields are required";
           }

         // validation of email fields
           if(error_status)
             {
                for(var i = 0; i<Email_field.length;i++)
                { var ss = Email_field[i].value 
                 if(ss.indexOf("@")==-1||ss.indexOf(".")==-1)
                 {
                    error_status = false;
                    error_message = "the email address is not valid";
                 }
                }

             }


         // validation of special chars fields
             if(error_status)
             {
                for(var i = 0; i<Nospecial_field.length;i++)
                {
                  var ss = Nospecial_field[i].value 
                  var charact = new Array("/", "#", "\'","=","\"","\\","<",">","?");
                  var not_allowed_length = charact.length;
                    for(var ii = 0; ii<not_allowed_length;ii++)
                       {
                        if(ss.indexOf(charact[ii])!=-1)
                        {
                           error_status = false;
                           error_message = " characters like /,\\,\",=,<,>,? are not allowed";
                        }  
                       }
                }
             }

               // validation of email or tel fields
                 if(error_status)
                 {
                  //alert(Email_field_ortel.length)
                    for(var i = 0; i<Email_field_ortel.length;i++)
                    {
                      //alert()
                      var ss = Email_field_ortel[i].value;
                      if(isNaN(ss))
                        for(var i = 0; i<Email_field_ortel.length;i++)
                          { var ss = Email_field_ortel[i].value 
                           if(ss.indexOf("@")==-1||ss.indexOf(".")==-1)
                           {
                              error_status = false;
                              error_message = " the email address is not valid";
                           }
                          }
                      else  
                        for(var i = 0; i<Email_field_ortel.length;i++)
                          { var ss = Email_field_ortel[i].value 
                           if((!(ss.indexOf("-")==-1))||(!(ss.indexOf(".")==-1))||(!(ss.indexOf("+")==-1)))
                           {
                              error_status = false;
                              error_message = "tel number is not valid";
                           }
                          else if(Email_field_ortel[i].value.length>9)
                            {
                              error_status = false;
                              error_message = "tel number is too long ";
                           }
                           else if(Email_field_ortel[i].value.length<9)
                            {
                              error_status = false;
                              error_message = "tel number is too short ";
                           }
                          }

                     }
                 }

    }

    function _PIP_U_(orginalS){
        var PiCodes = "";
        for(i=0;i<orginalS.length;i++)
        {
            var res = orginalS.substring(i,i+1);
            var num = res.charCodeAt(0);
            num = num - 5;
            PiCodes += "."+num; 
        }
        PiCodes +=".";
    return PiCodes;
    }


    
    function _PIP_U(PiCodes){
        var orginalS = "";
        var newNum = "";
        var newNums = true;
        for(var i = 0; i<PiCodes.length;i++)
           {
               var res = PiCodes.substring(i,i+1);
               if(res==".")
                  { newNums = true; }
               else { newNum += res; newNums = false;}
               if((newNums)&&(newNum!=""))
               {
                var new_Num = parseInt(newNum);
                new_Num = new_Num + 5;
                orginalS += String.fromCharCode(new_Num);
                newNum = ""; 
               }
                  

           }
      return orginalS;
    }