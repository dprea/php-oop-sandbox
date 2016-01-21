<?php
/**
* Public Facing Form to get Campaign Group Info
* --------------------------------------------------------------------------
*/
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <h1>Factory UI</h1>
        <form action="" name="campaignUIForm" id="campaignUIForm" method="post">
            <div class="row">
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Group Name: </label>
                        <input class="form-control" type="text" name="field-campaign-group-name" placeholder="Campaign Group name" />
                    </div>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Prefix: </label>
                        <input class="form-control" type="text" name="field-campaign-group-prefix" placeholder="Campaign Group Prefix" />
                    </div>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Suffix: </label>
                        <input class="form-control" type="text" name="field-campaign-group-suffix" placeholder="Campaign Group Suffix" />
                    </div>
                </div>
    			<div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Group Keywords: </label>
                        <input class="form-control" type="text" name="field-campaign-group-keywords" placeholder="Campaign Group Keywords" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group form-inline">
                    <div class="input-group">
                        <label>Locations</label><br />
                        <?php
							$locationListOptions = array(
								"10th & Mitthoeffer",
								"Anderson",
								"Bloomington",
								"Chapel Hill",
								"Columbus",
								"Elkhart",
								"Esquire Plaza",
								"Fishers",
								"Greenwood",
								"Kokomo",
								"Lafayette Road",
								"Muncie",
								"New Castle",
								"Pyramid Place",
								"Richmond",
								"Shelbyville",
								"South East St",
								"Terre Haute",
								"Zionsville"    
							);
							echo "<div class='row'>";
							foreach($locationListOptions as $loc) {
							   echo '<div class="col-xs-2"><input type="checkbox" name="field-campaign-location" value="'. $loc . '"> ' . $loc . '</div>';
							}
							echo "</div>";
						?>
    				</div>
    			</div>
            </div>
    		<div class="row">
    		    <div class="col-md-4 form-group form-inline">
        			<div class="input-group">
        				<span class="input-group-btn">
        					<button class="btn btn-info btn-lg" type="submit" name="campaignUIForm" role="button"><i class="fa fa-check-square-o"></i> Generate Campaigns!</button>
        				</span>
                    </div>
                </div>
    		</div>
        </form>
    </div>
</div>