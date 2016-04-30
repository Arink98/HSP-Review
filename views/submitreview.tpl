{include file="blocks/header.tpl"}
<head>
    <title>HSP-Review</title>
    {include file="blocks/css.tpl"}
</head>
<body>

{include file="blocks/navbar.tpl"}

<div id="title" class="container" style="padding-top: 1%;">
    <div class="row">
        <!--div class="col-md-12"-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header">
                            <h1 style="font-size: 100px; text-align: center;">Submit a review!</h1>
                            <br />
                            <form class="form-password col-center" method="post" id="reviewform" style="margin-left: 25px;">
                                <!--div class=""-->
                                    <div class="input-group">
                                        <div class="row">
                                            <label for="select">Shop:</label>
                                            <br />
                                            <select class="selectpicker" data-live-search="true" required name="shop">
                                                {foreach $shops as $shop}
                                                    <option data-tokens="{$shop->getPostcode()} {$shop->getName()}">{$shop->getName()}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <label for="price">HSP Price: </label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" step="0.01" min="0" required name="price" class="form-control" placeholder="HSP Price">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <label for="rating">Overall Rating: </label>
                                            <input type="number" min="1" data-min="1" data-max="5" name="overallrating" id="rating" class="rating" />
                                        </div>
                                        <br />
                                        <div class="row">
                                            <label for="overviewtext">Overall Thoughts: </label>
                                            <textarea class="form-control" name="overalltext" rows="3" placeholder="Overall Thoughts" required></textarea>
                                        </div>
                                        <br />


                                        <div class="row">
                                            <label for="rating">Greeting Rating: </label>
                                            <input type="number" name="greetingrating" id="greetingrating" class="rating" onclick="$('#reviewform').find('#greetingtextblock').show()" />
                                        </div>
                                        <br />

                                        <div class="row" id="greetingtextblock">
                                            <label for="rating">Greeting Details: </label>
                                            <textarea class="form-control" name="greetingtext" rows="3" placeholder="Greeting Details"></textarea>
                                        </div>
                                        <br />


                                        <div class="row">
                                            <label for="rating">Signage Rating: </label>
                                            <input type="number" name="signagerating" id="signagerating" class="rating" onclick="$('#reviewform').find('#signagetextblock').show()" />
                                        </div>
                                        <br />

                                        <div class="row" id="signagetextblock">
                                            <label for="rating">Signage Details: </label>
                                            <textarea class="form-control" name="signagetext" rows="3" placeholder="Signage Details"></textarea>
                                        </div>
                                        <br />




                                        <div class="row">
                                            <label for="meat">Meat Type</label>
                                            <select id="meatpick" class="selectpicker" data-live-search="true" name="meat">
                                                <option>Beef</option>
                                                <option>Chicken</option>
                                                <option>Lamb</option>
                                                <option>Mixed</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <br />

                                        <div class="row" id="meatratingblock">
                                            <label for="meatrating">Meat Rating: </label>
                                            <input type="number" name="meatrating" id="meatrating" class="rating" onclick="$('#reviewform').find('#meattextblock').show()" />
                                        </div>
                                        <br />
                                        <div class="row" id="meattextblock">
                                            <label for="rating">Meat Details: </label>
                                            <textarea class="form-control" name="meattext" rows="3" placeholder="Meat Details"></textarea>
                                        </div>
                                        <br />





                                        <div class="row">
                                            <label for="rating">Chip Rating: </label>
                                            <input type="number" name="chiprating" id="chiprating" class="rating" onclick="$('#reviewform').find('#chiptextblock').show()" />
                                        </div>
                                        <br />

                                        <div class="row" id="chiptextblock">
                                            <label for="rating">Chip Details: </label>
                                            <textarea class="form-control" name="chiptext" rows="3" placeholder="Chip Details"></textarea>
                                        </div>
                                        <br />



                                        <div class="row">
                                            <label>Did you have sauce?</label>
                                            <div class="checkbox checkbox-primary checkbox-circle" style="margin-top: -3px;">
                                                <input class="styled" type="checkbox" id="sauce" name="saucy" onclick="
                                                if ($('#reviewform').find('#sauce').is(':checked') == false) {
                                                    $('#reviewform').find('#saucetextblock').hide();
                                                } else {
                                                    if ($('#reviewform').find('#saucerating').val() > 0) {
                                                        $('#reviewform').find('#saucetextblock').show();
                                                    } else {
                                                        $('#reviewform').find('#saucetextblock').hide();
                                                    }
                                                }
                                                ">
                                                <label for="sauce">Sauce</label>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row" id="sauceratingblock">
                                            <label for="saucerating">Sauce Rating: </label>
                                            <input type="number" name="saucerating" id="saucerating" class="rating" onclick="$('#reviewform').find('#saucetextblock').show()" />
                                        </div>
                                        <br />
                                        <div class="row" id="saucetextblock">
                                            <label for="rating">Sauce Details: </label>
                                            <textarea class="form-control" name="saucetext" rows="3" placeholder="Sauce Details"></textarea>
                                        </div>
                                        <br />

                                        <div class="row">
                                            <label>Did you have cheese?</label>
                                            <div class="checkbox checkbox-primary checkbox-circle" style="margin-top: -3px;">
                                                <input class="styled" type="checkbox" id="cheese" name="cheesy" onclick="
                                                if ($('#reviewform').find('#cheese').is(':checked') == false) {
                                                    $('#reviewform').find('#cheesetextblock').hide();
                                                } else {
                                                    if ($('#reviewform').find('#cheeserating').val() > 0) {
                                                        $('#reviewform').find('#cheesetextblock').show();
                                                    } else {
                                                        $('#reviewform').find('#cheesetextblock').hide();
                                                    }
                                                }
                                                ">
                                                <label for="cheese">Cheese</label>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row" id="cheeseratingblock">
                                            <label for="cheeserating">Cheese Rating: </label>
                                            <input type="number" name="cheeserating" id="cheeserating" class="rating" onclick="$('#reviewform').find('#cheesetextblock').show()"/>
                                        </div>
                                        <br />
                                        <div class="row" id="cheesetextblock">
                                            <label for="rating">Cheese Details: </label>
                                            <textarea class="form-control" name="cheesetext" rows="3" placeholder="Cheese Details"></textarea>
                                        </div>
                                        <br />

                                        <div class="row">
                                            <label for="box">Box Type</label>
                                            <select id="boxpick" class="selectpicker" data-live-search="true" name="box">
                                                <option>Styrofoam</option>
                                                <option>Cardboard</option>
                                                <option>Plate</option>
                                                <option>Plastic</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <br />


                                        <div class="row">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="submit">Submit!</button>
                                            </span>
                                        </div>
                                    </div><!-- /input-group -->
                                <!--/div-->
                            </form>
                            <h1><!--Free space, only $0.99!--></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        <!--/div-->
    </div>
</div>


</body>



{include file="blocks/js.tpl"}

<script>
    $(document).ready(function() {
        $('#reviewform').find('#greetingtextblock').toggle();
        $('#reviewform').find('#signagetextblock').toggle();
        $('#reviewform').find('#meattextblock').toggle();
        $('#reviewform').find('#chiptextblock').toggle();
        $('#reviewform').find('#saucetextblock').toggle();
        $('#reviewform').find('#cheesetextblock').toggle();
    });
    $('#reviewform').find('#sauceratingblock').dependsOn({
        '#reviewform #sauce': {
            checked: true
        }
    });
    $('#reviewform').find('#cheeseratingblock').dependsOn({
        '#reviewform #cheese': {
            checked: true
        }
    });
</script>

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
                window.location.href = "/reviews";
            });
        });
    </script>
{/if}