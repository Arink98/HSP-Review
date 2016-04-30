{include file="blocks/header.tpl"}
<head>
    <title>Blog::Login</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}

<div class="login" style="width: 30%; margin: auto; padding-top: 7%;">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading" style="text-align:center">Log in</h2>
        {if $failed}
            <div class="alert alert-danger" role="alert">Error: {$failMessage}</div>
        {/if}
        <input type="text" class="form-control" required autofocus name="username" value="{$username}" maxlength="30" placeholder="Username" />
        <input type="password" class="form-control" placeholder="Password" required name="password" />
        <p style="padding-top:20px;">
            <input class="btn btn-lg btn-info btn-block" type="submit" value="Sign in" />
        </p>
    </form>
</div>
</body>

{include file="blocks/js.tpl"}

</html>