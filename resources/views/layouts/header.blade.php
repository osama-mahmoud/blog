<header>
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="home-account">
                        <a href="#" data-toggle="modal" data-target="#Register">Register</a>
                        <a href="#" data-toggle="modal" data-target="#Login">Login</a>
                        <login></login>
                        <register></register>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-info">
                        <i class="fa fa-phone"></i>010-020-0340
                        <i class="fa fa-envelope"></i>info@company.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-menu">
                        <ul>
                            <li><router-link :to="'/'">Home</router-link></li>
                            <li><router-link :to="'/posts'">Posts</router-link></li>
                            <li><router-link :to="'/categories'">Categories</router-link></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                   <search-posts></search-posts>
                </div>
            </div>
        </div>
    </div>
</header>
