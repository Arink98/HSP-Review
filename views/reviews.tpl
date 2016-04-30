<!-- Required Params: loggedIn, reviews[], poss => error, errorMessage, success, successMessage -->

{include file="blocks/header.tpl"}
<head>
    <title>Reviews</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}

<!--{if $loggedIn}
    <div class="container">
        <form id="blog-post" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Make new post</h3>
                </div>
                <div class="panel-body">
                    <label>Title:</label>
                    <br />
                    <input required name="title" type="text" maxlength="50" placeholder=" Title" style="width: 30%;" />
                    <br />
                    <br />
                    <label>Content:</label>
                    <div>
                        <textarea required name="content" maxlength="20000" placeholder="Content" class="form-control" rows="5" style="width: 60%;"></textarea>
                    </div>
                    <br />
                <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit">Post!</button>
                </span>
                </div>
            </div>
        </form>
    </div>
{/if}-->

<div id="title" class="container" style="padding-top: 1%; text-align: center;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h1 style="font-size: 100px">Reviews</h1>
                        <br />
                        {if $loggedIn}
                        <button class="btn btn-info btn-lg" onclick="location.href='/submitreview';">Submit a new review!</button>
                            <h1><!--Free space, only $0.99!--></h1>
                        {/if}
                        <div class="row">
                            <div class="form-group-sm">
                                <form id="search" method="get">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label for="search">Reviews by user</label>
                                        <input required name="search" type="text" class="form-control input-lg" maxlength="25" value="{$search}" placeholder="Username" />
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
                                    <button class="btn btn-default" onclick="window.location.href= '/reviews'">Show all reviews</button>
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{foreach $reviews as $review}
    <br />
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{$review->getShop()->getName()} - {$review->getShop()->getPostcode()} [${$review->getPrice()}]:</h3>
                <div class="rating">
                    <span style="font-size: 25px;">{for $i=1 to $review->getOverallRating()}★{/for}{for $i=-5 to ($review->getOverallRating() + 1) * -1}☆{/for}</span>
                </div>
                <h6 class="panel-title"><small>By {$review->getCreator()->getUsername()}</small></h6>
            </div>

            <div class="well">
                <div class="panel-body"><strong>Overall Thoughts: </strong>{$review->getOverallText()->getContent()}</div>
            </div>

            {if $review->getGreetingRating() != null && $review->getGreetingRating() > 0}
                <div class="well">
                    <div class="rating panel-body">
                        <span><strong>Greeting Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getGreetingRating()}★{/for}{for $i=-5 to ($review->getGreetingRating() + 1) * -1}☆{/for}</span></span>
                    </div>
                    {if $review->getGreetingText() != null && !empty($review->getGreetingText()->getContent())}
                        <div class="panel-body"><strong>Greeting Details: </strong>{$review->getGreetingText()->getContent()}</div>
                    {/if}
                </div>
            {/if}

            {if $review->getSignageRating() != null && $review->getSignageRating() > 0}
                <div class="well">
                    <div class="rating panel-body">
                        <span><strong>Signage Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getSignageRating()}★{/for}{for $i=-5 to ($review->getSignageRating() + 1) * -1}☆{/for}</span></span>
                    </div>
                    {if $review->getSignageText() != null && !empty($review->getSignageText()->getContent())}
                        <div class="panel-body"><strong>Signage Details: </strong>{$review->getSignageText()->getContent()}</div>
                    {/if}
                </div>
            {/if}

            {if $review->getMeatType() != null && $review->getMeatType() != 0}
                <div class="well">
                    <div class="panel-body"><strong>Meat Type: </strong>{$review->getMeatName()}</div>
                    {if $review->getMeatRating() != null && $review->getMeatRating() > 0}
                        <div class="rating panel-body">
                            <span><strong>Meat Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getMeatRating()}★{/for}{for $i=-5 to ($review->getMeatRating() + 1) * -1}☆{/for}</span></span>
                        </div>
                        {if $review->getMeatText() != null && !empty($review->getMeatText()->getContent())}
                            <div class="panel-body"><strong>Meat Details: </strong>{$review->getMeatText()->getContent()}</div>
                        {/if}
                    {/if}
                </div>
            {/if}

            {if $review->getChipRating() != null && $review->getChipRating() > 0}
                <div class="well">
                    <div class="rating panel-body">
                        <span><strong>Chip Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getChipRating()}★{/for}{for $i=-5 to ($review->getChipRating() + 1) * -1}☆{/for}</span></span>
                    </div>
                    {if $review->getChipText() != null && !empty($review->getChipText()->getContent())}
                        <div class="panel-body"><strong>Chip Details: </strong>{$review->getChipText()->getContent()}</div>
                    {/if}
                </div>
            {/if}

            {if $review->isSaucy() != null}
                <div class="well">
                    <div class="panel-body"><strong>Sauce: </strong>{if $review->isSaucy()}Yes{else}No{/if}</div>
                    {if $review->isSaucy()}
                        {if $review->getSauceRating() != null && $review->getSauceRating() > 0}
                            <div class="rating panel-body">
                                <span><strong>Sauce Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getSauceRating()}★{/for}{for $i=-5 to ($review->getSauceRating() + 1) * -1}☆{/for}</span></span>
                            </div>
                            {if $review->getSauceText() != null && !empty($review->getSauceText()->getContent())}
                                <div class="panel-body"><strong>Sauce Details: </strong>{$review->getSauceText()->getContent()}</div>
                            {/if}
                        {/if}
                    {/if}
                </div>
            {/if}

            {if $review->isCheesy() != null}
                <div class="well">
                    <div class="panel-body"><strong>Cheese: </strong>{if $review->isCheesy()}Yes{else}No{/if}</div>
                    {if $review->isCheesy()}
                        {if $review->getCheeseRating() != null && $review->getCheeseRating() > 0}
                            <div class="rating panel-body">
                                <span><strong>Cheese Rating:</strong> <span style="font-size: 25px;">{for $i=1 to $review->getCheeseRating()}★{/for}{for $i=-5 to ($review->getCheeseRating() + 1) * -1}☆{/for}</span></span>
                            </div>
                            {if $review->getCheeseText() != null && !empty($review->getCheeseText()->getContent())}
                                <div class="panel-body"><strong>Cheese Details: </strong>{$review->getCheeseText()->getContent()}</div>
                            {/if}
                        {/if}
                    {/if}
                </div>
            {/if}

            {if $review->getBoxType() != null && $review->getBoxType() != 0}
                <div class="well">
                    <div class="panel-body"><strong>Box Type: </strong>{$review->getBoxName()}</div>
                </div>
            {/if}

            {if $loggedIn && $user->getId() == $review->getCreator()->getId()}
                <div class="panel-body">
                    <form id="delete-post" method="post">
                        <button class="btn btn-danger" name="delete" value="{$review->getId()}">Delete post</button>
                    </form>
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