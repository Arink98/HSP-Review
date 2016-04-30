{include file="blocks/header.tpl"}
<head>
    <title>HSP-Review</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}


<div id="title" class="container" style="padding-top: 3%; text-align: center;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h1 style="font-size: 100px">HSP-Review</h1>
                        <img src="assets/img/hsplogo.png">
                        <h3>Your community friendly Halal-Snack-Pack review service</h3>
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
            swal("Success!", "{$successMessage}", "success");
        });
    </script>
{/if}