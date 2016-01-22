<?php
/**
* Public Facing Form to get Campaign Group Info
* --------------------------------------------------------------------------
* TODO: Add Keyword Template Inputs. 
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
                        <p>Name this list of campaigns</p>
                    </div>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Prefix: </label>
                        <input class="form-control" type="text" name="field-campaign-group-prefix" placeholder="Campaign Group Prefix" />
                        <p>Added to the start of every campaign</p>
                    </div>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Suffix: </label>
                        <input class="form-control" type="text" name="field-campaign-group-suffix" placeholder="Campaign Group Suffix" />
                        <p>Added to the end of every campaign</p>
                    </div>
                </div>
    			
            </div>
            <div class="row">
                <div class="col-md-12 form-group form-inline">
                    <div class="input-group">
                        <label>Campaign Group Keywords: </label>
                        <input class="form-control" type="text" name="field-campaign-group-keywords" placeholder="Campaign Group Keywords" />
                        <p>Separate with commas</p>
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
                <div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>KW Var 1</label>
                        <select class="form-control" name="field-campaign-group-keyword-var-1" placeholder="What is the first keyword template variable?">
                            <?php
    							$keywordTemplateOptions = array(
    					            "Location",
    					            "Keyword",
    					            "Modifier1",
    					            "Modifier2",
    					            "Modifier3",
    					            "none"
    							);
    							
    							foreach($keywordTemplateOptions as $kwVar) {
    							   echo '<option>' . $kwVar . '</option>';
    							}
    						?>
                        </select>
    				</div>
    			</div>
    			<div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>KW Var 2</label>
                        <select class="form-control" name="field-campaign-group-keyword-var-2" placeholder="What is the second keyword template variable?">
                            <?php
    							
    							foreach($keywordTemplateOptions as $kwVar) {
    							   echo '<option>' . $kwVar . '</option>';
    							}
    						?>
                        </select>
    				</div>
    			</div>
    			<div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>KW Var 3</label>
                        <select class="form-control" name="field-campaign-group-keyword-var-3" placeholder="What is the third keyword template variable?">
                            <?php
    							
    							foreach($keywordTemplateOptions as $kwVar) {
    							   echo '<option>' . $kwVar . '</option>';
    							}
    						?>
                        </select>
    				</div>
    			</div>
    			<div class="col-md-3 form-group form-inline">
                    <div class="input-group">
                        <label>KW Var 4</label>
                        <select class="form-control" name="field-campaign-group-keyword-var-4" placeholder="What is the fourth keyword template variable?">
                            <?php
    							foreach($keywordTemplateOptions as $kwVar) {
    							   echo '<option>' . $kwVar . '</option>';
    							}
    						?>
                        </select>
    				</div>
    			</div>
            </div>
             <div class="row">
                <div class="col-md-4 form-group form-inline">
                    <div class="input-group">
                        <label>Keyword Modifier 1</label>
                        <input class="form-control" type="text" name="field-campaign-group-keyword-modifier-1" placeholder="What is the first modifier variable?">
    				</div>
    			</div>
    			<div class="col-md-4 form-group form-inline">
                    <div class="input-group">
                        <label>Keyword Modifier 2</label>
                        <input class="form-control" type="text" name="field-campaign-group-keyword-modifier-2" placeholder="What is the second modifier variable?">
    				</div>
    			</div>
    			<div class="col-md-4 form-group form-inline">
                    <div class="input-group">
                        <label>Keyword Modifier 3</label>
                        <input class="form-control" type="text" name="field-campaign-group-keyword-modifier-3" placeholder="What is the third modifier variable?">
    				</div>
    			</div>
            </div>
    		<div class="row">
    		    <div class="col-md-4 form-group form-inline">
        			<div class="input-group">
        				<span class="input-group-btn">
        					<button class="btn btn-info btn-lg" type="submit" name="campaignUIForm" role="button">Generate Campaigns!</button>
        				</span>
                    </div>
                </div>
    		</div>
        </form>
    </div>
</div>