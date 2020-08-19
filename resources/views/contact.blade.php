@extends('layouts.front')
@section('content')
<div class="container">
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">
        <div class="col-md-8">
        <form>
           
             
            <div class="row">
                <div class="col-md-12">
                    <input type="email" class="form-control" placeholder="Email" required>
                  </div>
                  <br>
                  <br>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="First name" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Last name"  required>
              </div>
            </div>
           
            

            <div class="form-group">
               <br>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Your Text Here" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Send</button>
          </form>
        
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>San Francisco, CA 94126, USA</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>sales@musha.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
</div>
@endsection