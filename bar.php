<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">Admin</a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
</form>
</nav>

<div id="wrapper">
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="ManagerUser.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý tài khoản</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="all_in_one.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý truyện </span></a>
        </li>

         <li class="nav-item active">
          <a class="nav-link" href="all_in_one_category.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý thể loại truyện </span></a>
        </li>
        <li class="nav-item active">
         <a class="nav-link" href="ListDetail.php">
           <i class="fas fa-fw fa-chart-area"></i>
           <span>Quản lý đơn hàng </span></a>
       </li>
       <li class="nav-item active">
          <a class="nav-link" onclick="logout()" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Đăng xuất </span></a>
        </li>
      </ul>
</ul>
<script type="text/javascript">
   function logout(){
      var r = confirm("Bạn có muốn đăng xuất!");
        if (r == true) {
            window.location.href = "login.php";
        }
   }
 </script>
