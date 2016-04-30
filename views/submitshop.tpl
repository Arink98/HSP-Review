{include file="blocks/header.tpl"}
<head>
    <title>HSP-Review</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}


<div id="title" class="container" style="padding-top: 1%; text-align: center;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h1 style="font-size: 100px">Submit a shop!</h1>
                        <br />
                        <form class="form-password col-center" method="post" style="width: 70%">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" required name="name" class="form-control" placeholder="Shop Name">
                                    <input type="number" required name="postcode" class="form-control" placeholder="Postcode">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" style="margin-left: 10px;">Submit!</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </form>
                        <h1><!--Free space, only $0.99!--></h1>
                    </div>
                </div>
            </div>
        </div>
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
            swal({
                title: "Success!",
                text: "{$successMessage}",
                type: "success",
                allowOutsideClick: false
            }, function() {
                window.location.href = "/shops";
            });
        });
    </script>
{/if}