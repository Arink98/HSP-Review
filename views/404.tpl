{include file="blocks/header.tpl"}
<head>
    <title>HSP-Review</title>
    {include file="blocks/css.tpl"}
</head>
<body>


<div id="title" class="container" style="padding-top: 3%; text-align: center;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h1 style="font-size: 75px;">404</h1>
                        <img src="assets/img/hsplogo.png">
                        <h1 style="font-size: 75px;">Halal not found</h1>
                        <button class="btn btn-info btn-lg" onclick="location.href='/'">Back to home page</button>
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