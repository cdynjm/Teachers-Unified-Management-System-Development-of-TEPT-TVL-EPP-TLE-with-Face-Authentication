<footer class="mt-7">
    <hr class="horizontal dark">
    <div class="row mb-0">
       
        <div class="col-12 text-center">
            <p class="text-sm">Copyright © {{ date('Y') }}</p>
            <p class="fw-bolder text-sm">Teachers Unified Management System</p>
            <p class="text-xs">Developed by: Capstone Project Group</p>
        </div>
        
    </div>

    <div class="row mt-5">
      <div class="col-md-1"></div>
      <div class="col-md-4 text-sm-start text-center">
        <h4 class="mb-2 text-lg"><a href="#" target="_blank" class="footer-text">TUMS - DepEd</a></h4>
        <span class="text-sm">Online portals</span>
        <div class="social-icon my-3">
          <a href="https://www.facebook.com/southernleytestateu" target="_blank" class="bg-gradient-info text-white p-1 border-radius-sm me-2"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://youtube.com/c/SouthernLeyteStateUniversity" target="_blank" class="bg-gradient-danger text-white p-1 border-radius-sm me-2"><i class="fa-brands fa-youtube"></i></a>
          <a href="https://www.southernleytestateu.edu.ph/index.php/en/" target="_blank" class="bg-gradient-success text-white p-1 border-radius-sm me-2"><i class="fa fa-globe"></i></a>
          <a href="https://gmail.com" target="_blank" class="bg-gradient-secondary text-white p-1 border-radius-sm me-2"><i class="fa-brands fa-google"></i></a>
        </div>
        <p class="pt-1 text-sm">
        {{ date('Y') }} © Development of TEPT(TVL/EPP/TLE)
        </p>
      </div>
      <div class="col-md-3 text-sm-start text-center">
        <h5 class = "mb-2">Quicklinks</h5>
        <ul class="list-unstyled">
          <li><a target = "_blank" href="https://southernleytestateu.edu.ph" class="footer-link d-block pb-1 text-xs">Southern Leyte State University</a></li>
          <li><a target = "_blank" href="https://www.deped.gov.ph/" class="footer-link d-block pb-1 text-xs">Department of Education</a></li>
          <li><hr></li>
          
        </ul>
      </div>
      <div class="col-md-4 text-sm-start text-center">
        <div class="d-flex justify-content-sm-start justify-content-center align-items-center">
          <div class="me-3"><a target = "_blank" href="https://www.deped.gov.ph/"><img class = "mt-2 img-fluid rounded-circle" src = "{{asset('/storage/images/deped-logo.png')}}" style = "width: 70px"></a></div>
          <div class="me-3"><a target = "_blank" href="https://southernleytestateu.edu.ph"><img class = "mt-2 img-fluid rounded-circle" src = "{{asset('/storage/images/logo-slsu.png')}}" style = "width: 70px"></a></div>
          
        </div>
      </div>
    </div>

</footer>