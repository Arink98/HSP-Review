<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">HSP-Review</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="https://hsp-review.xyz/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a> </a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="https://hsp-review.xyz/shops"><span class="glyphicon glyphicon-home"></span> Shops</a></li>
                <li><a> </a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="https://hsp-review.xyz/reviews"><span class="glyphicon glyphicon-home"></span> Reviews</a></li>
                <li><a> </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {if isset($user) }
                    <li><a href="https://hsp-review.xyz/account"><span class="glyphicon glyphicon-user"></span> {$user->getUsername()}</a></li>
                    <li><a href="https://hsp-review.xyz/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                {else}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login / Register<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                        </ul>
                    </li>
                {/if}
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>