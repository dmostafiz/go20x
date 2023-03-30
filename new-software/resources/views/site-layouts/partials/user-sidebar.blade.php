<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
        
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div><a class="navbar-brand" href="index.html">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ url('static/assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" /><span class="font-sans-serif">falcon</span></div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link " href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span></div>
                  </a>
                 
                </li>
               <li class="nav-item">


                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Ecommerce</div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider">
                    </div>
                  </div>

                   
                  
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('/user/product') }}">
                        <div class="d-flex align-items-center">
                           <span class="fas fa-chart-pie"></span>
                           <span class="nav-link-text ps-1">Products</span>
                        </div>
                     </a><!-- more inner pages-->
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('/user/order') }}">
                        <div class="d-flex align-items-center">
                           <span class="fas fa-chart-pie"></span>
                           <span class="nav-link-text ps-1">Orders</span>
                        </div>
                     </a><!-- more inner pages-->
                  </li> 

                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('/user/billing') }}">
                        <div class="d-flex align-items-center">
                           <span class="fas fa-chart-pie"></span>
                           <span class="nav-link-text ps-1">Billing</span>
                        </div>
                     </a><!-- more inner pages-->
                  </li>  

                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('/user/autoship') }}">
                        <div class="d-flex align-items-center">
                           <span class="fas fa-chart-pie"></span>
                           <span class="nav-link-text ps-1">Autoship</span>
                        </div>
                     </a><!-- more inner pages-->
                  </li> 

            </li>
            <li class="nav-item">


              <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                 <div class="col-auto navbar-vertical-label">App</div>
                 <div class="col ps-0">
                   <hr class="mb-0 navbar-vertical-divider">
                 </div>
             </div>

               <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#support-desk" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="support-desk">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-ticket-alt fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ticket-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
               <path fill="currentColor" d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"></path>
            </svg>
            <!-- <span class="fas fa-ticket-alt"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Support desk</span>
      </div>
   </a>
   <ul class="nav collapse" id="support-desk">
      <li class="nav-item">
         <a class="nav-link" href="{{ url('user/supportdesk') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create New Ticket</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{ url('user/supportdesk/create') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">My Tickets List</span></div>
         </a>
         <!-- more inner pages-->
      </li>
     
   </ul>

            </li>      


   <li class="nav-item">
   <!-- label-->
   <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
      <div class="col-auto navbar-vertical-label">Links</div>
      <div class="col ps-0">
         <hr class="mb-0 navbar-vertical-divider">
      </div>
   </div>
   <!-- parent pages-->
   <a class="nav-link" href="app/calendar.html" role="button">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
            </svg>
            <!-- <span class="fas fa-calendar-alt"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Calendar</span>
      </div>
   </a>
   <!-- parent pages-->
   <a class="nav-link" href="app/chat.html" role="button">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
               <path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path>
            </svg>
            <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Chat</span>
      </div>
   </a>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-envelope-open fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
               <path fill="currentColor" d="M512 464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V200.724a48 48 0 0 1 18.387-37.776c24.913-19.529 45.501-35.365 164.2-121.511C199.412 29.17 232.797-.347 256 .003c23.198-.354 56.596 29.172 73.413 41.433 118.687 86.137 139.303 101.995 164.2 121.512A48 48 0 0 1 512 200.724V464zm-65.666-196.605c-2.563-3.728-7.7-4.595-11.339-1.907-22.845 16.873-55.462 40.705-105.582 77.079-16.825 12.266-50.21 41.781-73.413 41.43-23.211.344-56.559-29.143-73.413-41.43-50.114-36.37-82.734-60.204-105.582-77.079-3.639-2.688-8.776-1.821-11.339 1.907l-9.072 13.196a7.998 7.998 0 0 0 1.839 10.967c22.887 16.899 55.454 40.69 105.303 76.868 20.274 14.781 56.524 47.813 92.264 47.573 35.724.242 71.961-32.771 92.263-47.573 49.85-36.179 82.418-59.97 105.303-76.868a7.998 7.998 0 0 0 1.839-10.967l-9.071-13.196z"></path>
            </svg>
            <!-- <span class="fas fa-envelope-open"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Email</span>
      </div>
   </a>
   <ul class="nav collapse" id="email">
      <li class="nav-item">
         <a class="nav-link" href="app/email/inbox.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/email/email-detail.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/email/compose.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-calendar-day fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-day" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-96zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
            </svg>
            <!-- <span class="fas fa-calendar-day"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Events</span>
      </div>
   </a>
   <ul class="nav collapse" id="events">
      <li class="nav-item">
         <a class="nav-link" href="app/events/create-an-event.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/events/event-detail.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event detail</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/events/event-list.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
               <path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path>
            </svg>
            <!-- <span class="fas fa-shopping-cart"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">E commerce</span>
      </div>
   </a>
   <ul class="nav collapse" id="e-commerce">
      <li class="nav-item">
         <a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span></div>
         </a>
         <!-- more inner pages-->
         <ul class="nav collapse" id="product">
            <li class="nav-item">
               <a class="nav-link" href="app/e-commerce/product/product-list.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-commerce/product/product-grid.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product grid</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-commerce/product/product-details.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product details</span></div>
               </a>
               <!-- more inner pages-->
            </li>
         </ul>
      </li>
      <li class="nav-item">
         <a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span></div>
         </a>
         <!-- more inner pages-->
         <ul class="nav collapse" id="orders">
            <li class="nav-item">
               <a class="nav-link" href="app/e-commerce/orders/order-list.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order list</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-commerce/orders/order-details.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order details</span></div>
               </a>
               <!-- more inner pages-->
            </li>
         </ul>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/customers.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/customer-details.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer details</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/shopping-cart.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/checkout.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/billing.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-commerce/invoice.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#e-learning" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-graduation-cap fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="graduation-cap" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
               <path fill="currentColor" d="M622.34 153.2L343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"></path>
            </svg>
            <!-- <span class="fas fa-graduation-cap"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">E learning</span><span class="badge rounded-pill ms-2 badge-soft-success">New</span>
      </div>
   </a>
   <ul class="nav collapse" id="e-learning">
      <li class="nav-item">
         <a class="nav-link dropdown-indicator" href="#course" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course</span></div>
         </a>
         <!-- more inner pages-->
         <ul class="nav collapse" id="course">
            <li class="nav-item">
               <a class="nav-link" href="app/e-learning/course/course-list.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course list</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-learning/course/course-grid.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course grid</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-learning/course/course-details.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Course details</span></div>
               </a>
               <!-- more inner pages-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="app/e-learning/course/create-a-course.html">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a course</span></div>
               </a>
               <!-- more inner pages-->
            </li>
         </ul>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-learning/student-overview.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Student overview</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/e-learning/trainer-profile.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Trainer profile</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
   <!-- parent pages-->
   <a class="nav-link" href="app/kanban.html" role="button">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-trello fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="trello" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M392.3 32H56.1C25.1 32 0 57.1 0 88c-.1 0 0-4 0 336 0 30.9 25.1 56 56 56h336.2c30.8-.2 55.7-25.2 55.7-56V88c.1-30.8-24.8-55.8-55.6-56zM197 371.3c-.2 14.7-12.1 26.6-26.9 26.6H87.4c-14.8.1-26.9-11.8-27-26.6V117.1c0-14.8 12-26.9 26.9-26.9h82.9c14.8 0 26.9 12 26.9 26.9v254.2zm193.1-112c0 14.8-12 26.9-26.9 26.9h-81c-14.8 0-26.9-12-26.9-26.9V117.2c0-14.8 12-26.9 26.8-26.9h81.1c14.8 0 26.9 12 26.9 26.9v142.1z"></path>
            </svg>
            <!-- <span class="fab fa-trello"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Kanban</span>
      </div>
   </a>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-share-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z"></path>
            </svg>
            <!-- <span class="fas fa-share-alt"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Social</span>
      </div>
   </a>
   <ul class="nav collapse" id="social">
      <li class="nav-item">
         <a class="nav-link" href="app/social/feed.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/social/activity-log.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/social/notifications.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/social/followers.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
   <!-- parent pages-->
   <a class="nav-link dropdown-indicator" href="#support-desk" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="support-desk">
      <div class="d-flex align-items-center">
         <span class="nav-link-icon">
            <svg class="svg-inline--fa fa-ticket-alt fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ticket-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
               <path fill="currentColor" d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"></path>
            </svg>
            <!-- <span class="fas fa-ticket-alt"></span> Font Awesome fontawesome.com -->
         </span>
         <span class="nav-link-text ps-1">Support desk</span>
      </div>
   </a>
   <ul class="nav collapse" id="support-desk">
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/table-view.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Table view</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/card-view.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Card view</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/contacts.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contacts</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/contact-details.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contact details</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/tickets-preview.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Tickets preview</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/quick-links.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Quick links</span></div>
         </a>
         <!-- more inner pages-->
      </li>
      <li class="nav-item">
         <a class="nav-link" href="app/support-desk/reports.html">
            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reports</span></div>
         </a>
         <!-- more inner pages-->
      </li>
   </ul>
</li>

               
               
              </ul>
              
            </div>
          </div>
        </nav>