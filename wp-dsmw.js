 // Start form functions 
    function dsmw_writeText(form) {

      var input_first_name = form.dsmw_first_name.value;
      var input_second_name = form.dsmw_second_name.value;
      var range = form.dsmw_drop_down_range.value;
      var geo = form.dsmw_drop_down_geo.value;


      var img_url ="http://www.google.com/finance?q="

          + input_first_name +','
          + input_second_name +

            "&date="

              + range +
                "&geo="

                  + geo +

                    "&graph=weekly_img&sort=0&sa=N";

      var img_link ="http://www.google.com/finance?q="

          + input_first_name +','
          + input_second_name +

            "&date="

              + range +

                "&geo="

                  + geo +

                  "&graph=weekly_img&sort=0&sa=N";

      var link_first_name ="http://www.google.com/finance?q="

          + input_first_name +
            "&date="
              + range +

                "&geo="

                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";

      var link_second_name ="http://www.google.com/finance?q="
          + input_second_name +

            "&date="

              + range +
                "&geo="
                  + geo +

                  "&graph=weekly_img&sort=0&sa=N";

     document.getElementById("dsmw_Gadget-Img").innerHTML="<a target='_blank' href=\""+img_link+"\" ... ><img src=\""+img_url+"\" ... ></a><br/ ><div id=\"dsmw_Color-Index\"><a id=\"dsmw_graph_line\" target='_blank' href=\""+img_link+"\" ... >Enlarge Image</a><a id =\"dsmw_firstname\" target='_blank' href=\""+link_first_name+"\" ... >\""+input_first_name+"\"</a><a id=\"dsmw_secondname\" target='_blank' href=\""+ link_second_name +"\" ... >\""+input_second_name+"\"</a></div>";

    

	return false;

  }

function settime() {

    var curtime = new Date();
    var curhour = curtime.getHours();
    var curmin = curtime.getMinutes();
    var cursec = curtime.getSeconds();
    var time = "";

    if(curhour == 0) curhour = 12;
    time = (curhour > 12 ? curhour - 12 : curhour) + ":" +

         (curmin < 10 ? "0" : "") + curmin + ":" +
         (cursec < 10 ? "0" : "") + cursec + " " +
         (curhour > 12 ? "PM" : "AM");

  document.dsmw_myform.clock.value = time;

}