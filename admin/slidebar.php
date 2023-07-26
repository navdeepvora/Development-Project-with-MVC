<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="<?php echo $mainurl ;?>admin-deshboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Add Category</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?php echo $mainurl; ?>add-category">
            <i class="bi bi-circle"></i><span>Add Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $mainurl; ?>manage-category">
            <i class="bi bi-circle"></i><span>Manage Category</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Add SubCategory</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?php echo $mainurl; ?>add-subcategory">
            <i class="bi bi-circle"></i><span>Add Sub Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $mainurl; ?>manage-subcategory">
            <i class="bi bi-circle"></i><span>Manage Sub Category</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Add Product</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?php echo $mainurl; ?>add-product">
            <i class="bi bi-circle"></i><span>Add Product</span>
          </a>
        </li>
        <li>
          <a href="forms-validation.html">
            <i class="bi bi-circle"></i><span>Manage Product</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->




    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Manage All Customer</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li> End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-cart4"></i> 
        <span>Manage Orders</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-person-rolodex"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo $mainurl;?>?logout-admin" onclick="return confirm('are you sure to logout as admin')">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Log Out</span>
      </a>
    </li><!-- End Login Page Nav -->


  </ul>

</aside> <!--End Sidebar-->