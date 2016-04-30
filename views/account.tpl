{include file="blocks/header.tpl"}
<head>
    <title>Blog</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}

<div class="container center-block">
    <div class="row">
        <form class="form-name col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Username: {$user->getUsername()}</h3>
                <div class="input-group">
                        <input type="text" required name="username" value="{$name}" maxlength="30" class="form-control" placeholder="Change Username">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">Change!</button>
                        </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <form class="form-email col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Email: {$user->getEmail()}</h3>
                <div class="input-group">
                    <input type="text" required name="email" value="{$email}" maxlength="50" class="form-control" placeholder="Change Email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit">Change!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <form class="form-password col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Change Password:</h3>
                <div class="input-group">
                    <input type="password" required name="oldpassword" class="form-control" placeholder="Old Password">
                    <input type="password" required name="password" class="form-control" placeholder="New Password">
                    <input type="password" required name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Change!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
    </div>
</div>



</body>

{include file="blocks/js.tpl"}

{if $error}
    <script>
        $(function() {
            swal("Error!", "{$errorMessage}", "error");
        });
    </script>
{elseif $success}
    <script>
        $(function() {
            swal("Success!", "{$successMessage}", "success");
        });
    </script>
{/if}