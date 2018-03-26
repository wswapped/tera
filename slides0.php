<?php
  include("functions/conne.php");
  $sql = "SELECT * FROM `shops` ORDER BY `shops`.`id` ASC LIMIT 0,1";
  $currency = array("","RWF","USD");
  $result = mysqli_query($conn,$sql);
  $nums = mysqli_num_rows($result);
  while($row=mysqli_fetch_array($result))
  {
?>
          <div class="w3-bar w3-white w3-large">
            <a href="#" class="w3-bar-item w3-button w3-red w3-mobile pipNAVSLID" id="home"><i class="fa fa-bed w3-margin-right"></i> <?php echo $row[1]?> </a>
            <a href="#rooms" class="w3-bar-item w3-button w3-mobile pipNAVSLID" id="Location"> Location </a>
            <a href="#about" class="w3-bar-item w3-button w3-mobile pipNAVSLID" id="About"> About </a>
            <a href="#contact" class="w3-bar-item w3-button w3-mobile pipNAVSLID" id="Contact"> Contact </a>
            <a href="#contact" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile pipNAVSLID" id="Book"> Book Now </a>
          </div>
          <!-- Header -->
          <div class="w3-display-container w3-content"  style="max-width:1500px;">
            <div class="toBeThere" id="homeDetails">
            <img class="w3-image" src="img/kigalivv.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
            <div class="w3-display-left w3-padding w3-col l6 m8">
              <div class="w3-container w3-red">
                <h2><i class="fa fa-bed w3-margin-right"></i> <?php echo $row[1]?> </h2>
              </div>
              <div class="w3-container w3-white w3-padding-16">
                <form action="/action_page.php" target="_blank">
                  <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                      <label><i class="fa fa-calendar-o"></i> Check In</label>
                      <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="CheckIn" required>
                    </div>
                    <div class="w3-half">
                      <label><i class="fa fa-calendar-o"></i> Component </label>
                      <input class="w3-input w3-border" type="text" placeholder="Request Products" name="CheckOut" required>
                    </div>
                  </div>
                  <div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                      <label><i class="fa fa-male"></i> Quantity </label>
                      <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">
                    </div>
                    <div class="w3-half">
                      <label><i class="fa fa-caret-down"></i> select a product </label>
                      <select class="w3-input w3-border">
                        <option> FET Transistors </option>
                        <option> BJT Transistors </option>
                        <option> 555 Timers  </option>
                        <option> Resistors </option>
                        <option> Capacitors </option>
                      </select>
                    </div>
                  </div>
                  <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
                </form>
              </div>
            </div>
          </div>

            <div style="display: none; color: #fff;" id="AboutDetails" class="toBeThere" >
               <h3>About</h3>
                <h6>Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
              <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
            </div>

            <div style="display: none; color: #fff;" id="ContactDetails" class="toBeThere" >
               <div class="w3-row-padding w3-padding-16">
                  <div class="w3-third w3-margin-bottom">
                    <img src="img/kigalivv.jpg" alt="Norway" style="width:100%">
                    <div class="w3-container w3-white">
                      <h3> Kigali city center </h3>
                      <h6 class="w3-opacity"> 405687865 total components </h6>
                      <p> 567 types of components </p>
                      <p>20 m<sup></sup> from taxi park </p>
                      <p class="w3-large"><i class="fa fa-phone"> +250788645678</i></p>
                      <button class="w3-button w3-block w3-black w3-margin-bottom">Live chart</button>
                    </div>
                  </div>
                  <div class="w3-third w3-margin-bottom">
                    <img src="img/mmm.jpg" alt="Norway" style="width:100%">
                    <div class="w3-container w3-white">
                      <h3> Kigali, Kimironko </h3>
                      <h6 class="w3-opacity"> 400568 total components </h6>
                      <p> 56 types of components </p>
                      <p>70 m<sup></sup> from taxi park </p>
                      <p class="w3-large"><i class="fa fa-phone"> +250788641111</i></p>
                      <button class="w3-button w3-block w3-black w3-margin-bottom">Live chart</button>
                    </div>
                  </div>
                  <div class="w3-third w3-margin-bottom">
                    <img src="img/mus.jpg" alt="Norway" style="width:100%">
                    <div class="w3-container w3-white">
                      <h3> Musanze </h3>
                      <h6 class="w3-opacity"> 40568 total components </h6>
                      <p> 56 types of components </p>
                      <p>40 m<sup></sup> from taxi park </p>
                      <p class="w3-large"><i class="fa fa-phone"> +250788645693</i></p>
                      <button class="w3-button w3-block w3-black w3-margin-bottom">Live chart</button>
                    </div>
                  </div>
               </div>
            </div>

            <div style="display: none; color: #fff;" id="BookDetails" class="toBeThere" >
              <div class="w3-row-padding">
                <div class="w3-col m3">
                  <label><i class="fa fa-calendar-o"></i> Check In</label>
                  <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
                </div>
                <div class="w3-col m3">
                  <label><i class="fa fa-calendar-o"></i> Check Out</label>
                  <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
                </div>
                <div class="w3-col m2">
                  <label><i class="fa fa-male"></i> Adults</label>
                  <input class="w3-input w3-border" type="number" placeholder="1">
                </div>
                <div class="w3-col m2">
                  <label><i class="fa fa-child"></i> Kids</label>
                  <input class="w3-input w3-border" type="number" placeholder="0">
                </div>
                <div class="w3-col m2">
                  <label><i class="fa fa-search"></i> Search</label>
                  <button class="w3-button w3-block w3-black">Search</button>
                </div>
              </div>
            </div>

            <div style="display: none; color: #fff;" id="LocationDetails" class="toBeThere" >
               <div id="map" style="width: 100%; height: 500px;">
               </div>
            </div>

          </div>
          <script type="text/javascript">
             $(".pipNAVSLID").click( function(cvcv){
                  cvcv.preventDefault();
                  var tsts = $(this).attr("id");
                  $(".toBeThere").hide();
                  $("#"+tsts+"Details").show();

             });

             function myMap() {
                                  var Rwanda1 = {lat: -1.9706, lng:30.1044};
                                  var Rwanda2 = {lat: -1.5035, lng:29.6325};
                                  var Rwanda3 = {lat: -1.9362, lng:30.1301};
                                  var map = new google.maps.Map(document.getElementById('map'), {
                                              zoom: 10,
                                              center: Rwanda1
                                            });
                                            var marker = new google.maps.Marker({
                                              position: Rwanda1,
                                              map: map
                                            });
                                            var marker2 = new google.maps.Marker({
                                              position: Rwanda2,
                                              map: map
                                            });
                                            var marker3 = new google.maps.Marker({
                                              position: Rwanda3,
                                              map: map
                                            });

                              }
                          myMap();
          </script>
<?php
  }
?>