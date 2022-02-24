<div class="sidebar" data-image="{{ URL::asset('public/assets/backend/assets/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(Auth::user()->role == 0)
            <li>
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Admin</p>
                </a>
            </li>
            @endif
            <li>
                <a class="nav-link" href="/shopping/admin/profile">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('admin/category') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Category</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('admin/banner') }}">
                    <i class="nc-icon nc-album-2"></i>
                    <p>Banner</p>
                </a>
            </li>
            <li >
                <a class="nav-link active" href="{{ url('admin/promotion') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Promotion</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('admin/size') }}">
                    <i class="nc-icon nc-zoom-split"></i>
                    <p>Size</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/color') }}">
                    <i class="nc-icon nc-palette"></i>
                    <p>Color</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/product') }}">
                    <i class="nc-icon nc-backpack"></i>
                    <p>Product</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/payment') }}">
                    <i class="nc-icon nc-credit-card"></i>
                    <p>Payment</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/order') }}">
                    <i class="nc-icon nc-bag"></i>
                    <p>Order</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/coupon') }}">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>Coupon</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('admin/blog') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Blog</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="{{ url('admin/account') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>User Account</p>
                </a>
            </li>
        </ul>
    </div>
</div>