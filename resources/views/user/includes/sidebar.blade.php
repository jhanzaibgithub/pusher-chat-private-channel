


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/user/dashboard">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-user menu-icon"></i>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/user/profileview">View</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/user/profileedit">Edit</a></li>
                </ul>
            </div>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('user/purchases') }}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Order/Purchases</span>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('user/questions') }}">
                <i class="fas fa-question-circle menu-icon"></i>
                <span class="menu-title">Questions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="{{ url('user/products') }}">
                <i class="fas fa-heart menu-icon mr-2"></i>
                <span class="menu-title">Products U Like</span>
            </a>
        </li> -->

        @if($LoggedUserInfo && $LoggedUserInfo['role'] === 'seller')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#listenings" aria-expanded="false"
                aria-controls="listenings">
                <i class="fas fa-list-alt menu-icon"></i>
                <span class="menu-title">Listenings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="listenings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/listings">Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/createlistings">Create Listings</a>
                    </li>
                    <!-- Add more sub-menu items here if needed -->
                </ul>
            </div>
        </li>
        @endif
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
            <i class="fas fa-stethoscope menu-icon"></i>
            <span class="menu-title">Chat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse show" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/user/chats">Chats</a></li>
                </ul>
            </div>
        </li> -->
        <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#sellerChats" aria-expanded="false" aria-controls="sellerChats">
        <i class="fas fa-store menu-icon"></i>
        <span class="menu-title">Seller Chats</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="sellerChats">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="/user/sellerchats">Chats</a>
            </li>
        </ul>
    </div>
</li> -->
    </ul>
</nav>


