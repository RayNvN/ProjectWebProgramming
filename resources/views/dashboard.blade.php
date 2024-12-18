<x-app-layout>
    <div>
        <div class="d-flex justify-content-between align-items-center pt-3 pb-3 bg-dark" style="margin-left: 134px">
            <div class="input-group" style="width: 300px;margin-left:50px">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
            <div>
              <img src="/icons/mdi_bell-notification.svg" alt="" style="margin-right: 20px">
              <img src="/icons/Ellipse-58.svg" alt=""style="margin-right:50px">
            </div>
        </div>
    
        <!-- Manage Employee Tabs -->
        <div style="display: flex; margin-top:20px; margin-bottom:20px; justify-content: space-between; align-items:center; margin-left:134px">
          <div class="fs-3 ms-5" style="color: white">Manage Employee</div>
          <button style="background-color: #7a5af5; color:#ffffff; border:none; border-radius: 15px; width:135px; height:44px; margin-right:50px">
            <span style="width:99px; height: 17px; font-family:Inter; font-size:14px">Add Employee</span>
          </button>
        </div>
        
        <ul class="nav nav-tabs bg-dark" style="margin-left: 134px">
            <li class="nav-item ms-5">
                <a class="nav-link active text-primary" href="#">Manage Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Request Time Off</a>
            </li>
        </ul>
    
        <!-- Table Header -->
        <div class="row text-center table-header py-2" style="width:1400px; margin-left:134px">
            <div class="col-2">Employee Name</div>
            <div class="col-2">Phone Number</div>
            <div class="col-2">Department</div>
            <div class="col-2">Job Title</div>
            <div class="col-2">Contract Type</div>
            <div class="col-2">Attendance</div>
        </div>
    
        <!-- Employee Cards -->
        @for ($i = 0; $i < 6; $i++)
        <div class="employee-card row align-items-center text-center" style="width:1400px; margin-left:134px">
            <div class="col-2 d-flex align-items-center justify-content-center">
                <img src="https://via.placeholder.com/50" alt="Avatar">
                <div class="ms-2 text-start">
                    <strong>Aulia Yasmin</strong><br>
                    <small>aulia.yasmin@gmail.com</small>
                </div>
            </div>
            <div class="col-2">+62 82-1234-567</div>
            <div class="col-2">
                <span class="btn btn-light ms-3" style="border-radius: 50px; padding-left:20px; padding-right:20px">Design</span>
            </div>
            <div class="col-2">Creative Director</div>
            <div class="col-2">Full Time</div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <span>120h 32m</span>
                <button class="btn see-detail-btn ms-3" style="border-radius: 50px;">See Detail</button>
            </div>
        </div>
        @endfor
    </div>
</x-app-layout>
