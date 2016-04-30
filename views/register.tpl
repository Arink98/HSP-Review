{include file="blocks/header.tpl"}
<head>
    <title>Blog</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}

<div class="register" style="width: 30%; margin: auto; padding-top: 7%;">
    <form class="form-register" method="post">
        <h2 class="form-register-heading" style="text-align:center">Register</h2>
        {if $failed}
            <div class="alert alert-danger" role="alert">Error: {$failMessage}</div>
        {/if}
        <input type="text" class="form-control" required autofocus name="username" value="{$username}" maxlength="30" placeholder="Username" />
        <input type="text" class="form-control" required autofocus name="email" value="{$email}" maxlength="50" placeholder="Email" />
        <input type="password" class="form-control" placeholder="Password" required name="password" />
        <input type="password" class="form-control" placeholder="Confirm Password" required name="passwordconfirm" />
        <p style="padding-top:20px;">
            <input class="btn btn-lg btn-info btn-block" type="submit" value="Register Account" />
        </p>
    </form>
</div>

</body>

{include file="blocks/js.tpl"}