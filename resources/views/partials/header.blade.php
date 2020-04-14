<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>



            <button>
                    <a href="/shop/public">Strona Główna</a>

            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><span href="{{ route ('product.shoppingCart') }}">

                       <a class="navbar-brand" href="{{route ('product.shoppingCart') }}"></a>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="{{route ('product.shoppingCart') }}"> Koszyk </a><span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                        
                         </span>

                        </a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        @if (Auth::check())

                            <li><a href="{{route('user.profile')}}">Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route ('user.logout') }}">Wyloguj</a></li>

                            @else
                            <li><a href="{{route('user.signin')}}">Zaloguj</a></li>
                            <li><a href="{{route('user.signup')}}">Zarejestruj</a></li>

                            @endif


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
