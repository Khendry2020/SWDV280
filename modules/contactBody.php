<div class="container">
    <h2 class="text-center">Contact Us</h2>
    <div class="row text-center mb-4 gy-1">
        <div class="col-sm-6 col-12 border rounded">
            <h4>Give Us A Call</h4>
            <a href="tel:000-000-0000" class="text-decoration-none">
                <i class="bi bi-telephone">&nbsp;(000)-000-0000</i>
            </a>
        </div>
        <div class="col-sm-6 col-12 border rounded">
            <h4>Send Us An Email</h4>
            <a href="mailto:ScottsFurnitureBarn@gmail.com" class="text-decoration-none">
                <i class="bi bi-envelope-at">&nbsp;ScottsFurnitureBarn@gmail.com</i>
            </a>
        </div>
        <div class="col-12 border rounded pb-4 ">
            <h4>Come Visit Us</h4>
            <p>We're at 3489 N Meridian Rd. Meridian ID 83646</p>
            <div class="mapouter rounded">
                <div class="gmap_canvas rounded border">
                    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=3489%20N%20Meridian%20Rd.%20Meridian%20ID%2083646&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">                    
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="row rounded border mb-4">
        <h2 class="col-12 mt-5 journal text-center dbrowntext">
            Send a Message
        </h2>          
        <div class="col-1"></div>
        <div id="contactForm" class="col-10 mt-3 mb-5">     
            <div class="input-group my-4 mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">First and last name</span>
                </div>
                <input type="text" class="form-control" id="firstName" />
                <input type="text" class="form-control" id="lastName" />                
            </div>
            <!-- Email -->
            <div class="input-group my-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email address</span>
                </div>
                <input type="text" class="form-control" id="inputEmail" />
            </div>      

            <!-- TextArea -->      
            <div class="input-group my-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tell us some more</span>
                </div>
                <textarea
                  class="form-control"
                  aria-label="textArea"
                  id="textArea"
                  rows="3"
                ></textarea>
            </div>
            <!-- Submit and clear -->
            <div class="form-group text-center">
                <input
                  type="button"
                  id="submit"
                  value="Submit"
                  class="btn btn-primary mx-auto"
                />               
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>