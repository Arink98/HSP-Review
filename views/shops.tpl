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
                        <h1 style="font-size: 100px">Shops</h1>
                        <br />
                        <button class="btn btn-info btn-lg" onclick="location.href='/submitshop';">Submit a new shop!</button>
                        <h1><!--Free space, only $0.99!--></h1>
                        <div class="row">
                            <div class="form-group-sm">
                                <form id="search" method="get">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label for="search">Search by postcode</label>
                                        <input required name="search" type="number" class="form-control input-lg" maxlength="25" value="{$search}" placeholder="Postcode" />
                                    </div>
                                    <div class="col-sm-1">
                                        <button class="btn btn-success" type="submit" style="margin-top: 22px;">Search!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {if $searched}
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-default" onclick="window.location.href= '/shops'">Show all shops</button>
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{foreach $shops as $shop}
    <br />
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{$shop->getName()}</h3>
            </div>
            <div class="panel-body"><strong>Shop: </strong>{$shop->getName()}</div>
            <div class="panel-body"><strong>Postcode: </strong>{$shop->getPostcode()}</div>
            <div class="panel-body"><strong>Reviews: </strong>{if !$shop->hasReviews()}None{else}{$shop->countReviews()}{/if}</div>
            {if $shop->hasReviews()}
                <div class="panel-body">
                    <button class="btn btn-info" onclick="window.location.href = '/reviews?shopid={$shop->getId()}'">Show reviews</button>
                </div>
            {/if}
        </div>
    </div>
{/foreach}


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