<?php require_once '../../layout/header-estimator.php' ?>

<!DOCTYPE html>
<html class="text-center" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Estimator</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">  
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">


</head>

<body id="page-top">

    <section class="text-center"> 
        <h1 id="constitle">Construction Estimator</h1>
    </section>
    <section style="margin-bottom: 20px;">
        <div class="container" style="border-style: solid;" id="calculatorcontainer">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center" style="padding-bottom: 20px;">Hardware Calculator</h1>
                    <div class="text-center">
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('brick')" id="brick">Brick Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('metal')" id="metal">Metal Weight Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('concrete')" id="concrete">Concrete Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('sand')" id="sand">Sand Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('gravel')" id="gravel">Gravel Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('rebar')" id="rebar">Rebar Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('beam')" id="beam">Beam Load Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('baluster')" id="baluster">Baluster Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('cement')" id="cement">Cement Calculator</button></a>
                        <a href="#changetitle"><button class="btn btn-primary" type="button" onclick="change('wallsquare')" id="wallsquare">Wall Square Calculator</button></a>
                    </div>
                </div>
                <div class="col-md-6 offset-xl-0" style="background: var(--light);margin-bottom: 20px; min-height: 100px"><h1 class="text-center" id="changetitle" value="none" style="padding-bottom: 20px; display:none;">Heading</h1><div class="text-left" id="brickDIV" style="display:none;">
    <div class="text-center" style="margin-bottom: 15px;"><img class="img-fluid" src="assets/img/brick.png" style="width: 400px;margin: 0px;" alt="brick pricture" /></div>
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Brick Length (l)" readonly style="width: 250px;font-size: 16px;text-align: left;"/><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="millimeter (mm)" id="bricklength"/><input type="text" class="form-control-plaintext float-left" value="Brick Height (h)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="millimeter (mm)" id="brickheight"/><input type="text" class="form-control-plaintext float-left" value="Brick Width (w)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="millimeter (mm)" id="brickwidth"/><input type="text" class="form-control-plaintext float-left" value="Mortar joint thickness (t)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="millimeter (mm)" id="mortarjoint"/><input type="text" class="form-control-plaintext float-left" value="Wall length (L)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="meter (m)" id="walllength"/><input type="text" class="form-control-plaintext float-left" value="Wall Height (H)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="meter (m)" id="wallheight"/><input type="text" class="form-control-plaintext float-left" value="Wall area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" id="wallarea" disabled/><input type="text" class="form-control-plaintext float-left" value="Type of wall" readonly style="width: 250px;font-size: 16px;text-align: left;" /><select class="float-right" style="width: 280px;height: 38px;" id="typeofwall">
            <option value="single">Single</option>
            <option value="double">Double</option>
        </select></div>
    <div class="text-center" style="margin-top: 350px;">
        <h1 class="text-center">Bricks Required</h1><input type="text" class="form-control-plaintext float-left" value="Bricks Needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" value="answer" id="bricksneeded" disabled/><input type="text" class="form-control-plaintext float-left" value="Bricks Wastage (Percentage)" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="percentage" id="brickswastage"/><input type="text" class="form-control-plaintext float-left" value="Total bricks needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" value="final answer" id="totalbricksneeded"disabled />
    </div> -->

        <div >
            <div class="gigacalculator" data-tool="/calculators/brick-calculator.php" data-width="auto">
            <div class="gigacalctitle"></div>
            <div class="gigacalcfooter">
                <a href="https://www.gigacalculator.com/calculators/brick-calculator.php">Brick Calculator</a> by <a class="gigacalclink" href="https://www.gigacalculator.com/">GIGAcalculator.com</a>
            </div>
            </div>

        </div>
</div><div class="text-left" id="metalDIV" style="display:none;">
    <!-- <div class="text-center"><input type="text" class="form-control-plaintext float-left" value="I want to mix.." readonly style="width: 250px;font-size: 16px;text-align: left;" /><select class="float-right" style="width: 280px;height: 38px;" id="typeofcement">
            <option value="concrete" selected>Concrete</option>
            <option value="mortar">Mortar</option>
        </select></div>
    <div>
        <h2 class="text-center">Mix Quantity</h2><input type="text" class="form-control-plaintext float-left" value="Wet Volume" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" style="width: 280px;height: 38px;opacity: 1;text-align: right;margin-left: 6px;" placeholder="cubic meters (mᶟ)" id="cementwetvolume"/><input type="text" class="form-control-plaintext float-left" value="Dry Volume" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="cubic meters (mᶟ)" id="cementdryvolume"/><input type="text" class="form-control-plaintext float-left" value="Waste" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="10%" id="cementwaste"/><input type="text" class="form-control-plaintext float-left" value="Total Volume" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="cubic meters (mᶟ)" id="cementtotalvolume"/>
    </div>
    <div class="text-center">
        <h2 class="text-center">Cement Needed</h2><input type="text" class="form-control-plaintext float-left" value="Concrete Mix Ratio" readonly style="width: 250px;font-size: 16px;text-align: left;" /><select class="float-right" style="width: 280px;height: 38px;" id="concretemix">
            <option value="1450" selected>1:3:6 (10.0 MPa or 1450 psi)</option>
            <option value="2175">1:2:4 (15.0 MPa or 2175 psi)</option>
        </select><input type="text" class="form-control-plaintext float-left" value="Volume of cement" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="cubic meters (mᶟ)" id="volumeofcement"/><input type="text" class="form-control-plaintext float-left" value="Weight of cement" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="kilogram (kg)" id="weightofcement"/><input type="text" class="form-control-plaintext float-left" value="Bag Size" readonly style="width: 250px;font-size: 16px;text-align: left;" />
        <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="kilogram (kg)" id="bagsize"/>
        
        <input type="text" class="form-control-plaintext float-left" value="Bags of cement needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="bags" id="bagsofcementneeded" disabled/>
    </div> -->

        <div>
            <div class="gigacalculator" data-tool="/calculators/metal-weight-calculator.php">
            <div class="gigacalctitle"></div>
            <div class="gigacalcfooter">
                <a href="https://www.gigacalculator.com/calculators/metal-weight-calculator.php">Metal Weight Calculator</a> by <a class="gigacalclink" href="https://www.gigacalculator.com/">GIGAcalculator.com</a>
            </div>
            </div>
            <!-- <script defer src="https://cdn.gigacalculator.com/embed.min.js"></script> -->
            
        </div>

</div>

<div class="text-left" id="concreteDIV" style="display:none;">
    <!-- <div class="text-center" style="margin-bottom: 15px;background: var(--white);"><img class="img-fluid" src="assets/img/concrete.png" style="width: 400px;margin: 0px;" alt="concrete pricture" /></div>
    <div>
        <h1 class="text-center">Dimensions</h1><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="feet (ft)" id="concretelength" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="feet (ft)" id="concretewidth"/><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="inches (in)" id="concreteheight"/><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="pieces" id="concretequantity"/><input type="text" class="form-control-plaintext float-left" value="Quantity" readonly style="width: 250px;font-size: 16px;text-align: left;" />
    </div>
    <div class="text-center" style="margin-top: 200px;">
        <h1 class="text-center">Pre-mixed concrete</h1><input type="text" class="form-control-plaintext float-left" value="Bag size" readonly style="width: 250px;font-size: 16px;text-align: left;" />
         <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="pounds (lb)" id="concretebagsize"/> 
        <select class="float-right" style="width: 280px;height: 38px;" id="concretebagsize">
            <option value=".011">40 pounds (lb)</option>
            <option value=".017" selected>60 pounds (lb)</option>
            <option value=".022">80 pounds (lb)</option>
        </select>
        <input type="text" class="form-control-plaintext float-left" value="Bags needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-right" style="width: 280px;height: 38px;text-align: right;" id="concretebagsneeded" disabled/>
    </div>
    -->

        <div id="embededcalculator">
            <object id="please">
            <div class="gigacalculator" data-tool="/calculators/concrete-calculator.php" data-width="auto">
            <div class="gigacalctitle"></div>
            <div class="gigacalcfooter">
                <a href="https://www.gigacalculator.com/calculators/concrete-calculator.php">Concrete Calculator</a> by <a class="gigacalclink" href="https://www.gigacalculator.com/">GIGAcalculator.com</a>
            </div>
            </div>
            <script src="https://cdn.gigacalculator.com/embed.min.js"></script>
            </object>
        </div> 


</div><div class="text-left" id="sandDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" disabled/><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /><input type="text" class="form-control-plaintext float-left" value="Density" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="float-none" style="width: 202px;height: 38px;text-align: right;min-width: 38px;padding: 0px;margin-left: 7px;" value="1,601.948" name="densityINPUT" placeholder="kg per cubic meter" /><label data-toggle="tooltip" class="d-inline-flex float-right" style="width: 77px;margin: 0px;height: 38px;font-size: 27px;" for="densityINPUT" title="kg per cubic meter">kg/<br /><strong>m³</strong><br /><br /></label></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->

    <div id="embededcalculator">
            <div class="gigacalculator" data-tool="/calculators/sand-calculator.php">
            <div class="gigacalctitle"></div>
            <div class="gigacalcfooter">
                <a href="https://www.gigacalculator.com/calculators/sand-calculator.php">Sand Calculator</a> by <a class="gigacalclink" href="https://www.gigacalculator.com/">GIGAcalculator.com</a>
            </div>
            </div>
            <!-- <script defer src="https://cdn.gigacalculator.com/embed.min.js"></script> -->
    </div>

</div><div class="text-left" id="gravelDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->
        <div id="embededcalculator">
            <div class="gigacalculator" data-tool="/calculators/gravel-calculator.php">
                <div class="gigacalctitle"></div>
                <div class="gigacalcfooter">
                    <a href="https://www.gigacalculator.com/calculators/gravel-calculator.php">Gravel Calculator</a> by <a class="gigacalclink" href="https://www.gigacalculator.com/">GIGAcalculator.com</a>
                </div>
            </div>

        </div>

</div>

<div class="text-left" id="beamDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->
        <div id="embededcalculator">
            <div class="omni-calculator" data-calculator="construction/beam-load" data-width="auto" data-config='{}' data-currency="PHP" data-show-row-controls="false" data-version="3" data-t="1631788745612">
            <div class="omni-calculator-header"></div>
            <div class="omni-calculator-footer">
                <a href="https://www.omnicalculator.com/construction/beam-load" target="_blank"><img alt="Omni" class="omni-calculator-logo" src="https://cdn.omnicalculator.com/embed/omni-calculator-logo-long.svg" /></a>
            </div>
            </div>
            <script async src="https://cdn.omnicalculator.com/sdk.js"></script>

        </div>

</div>

<div class="text-left" id="balusterDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->
        <div id="embededcalculator">
            <div class="omni-calculator" data-calculator="construction/baluster" data-width="auto" data-config='{}' data-currency="PHP" data-show-row-controls="false" data-version="3" data-t="1631789270076">
            <div class="omni-calculator-header"></div>
            <div class="omni-calculator-footer">
                <a href="https://www.omnicalculator.com/construction/baluster" target="_blank"><img alt="Omni" class="omni-calculator-logo" src="https://cdn.omnicalculator.com/embed/omni-calculator-logo-long.svg" /></a>
            </div>
            </div>
            <script async src="https://cdn.omnicalculator.com/sdk.js"></script>

        </div>

</div>

<div class="text-left" id="cementDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->
        <div id="embededcalculator">
            <div class="omni-calculator" data-calculator="construction/cement" data-width="auto" data-config='{}' data-currency="PHP" data-show-row-controls="false" data-version="3" data-t="1631789472811">
            <div class="omni-calculator-header"></div>
            <div class="omni-calculator-footer">
                <a href="https://www.omnicalculator.com/construction/cement" target="_blank"><img alt="Omni" class="omni-calculator-logo" src="https://cdn.omnicalculator.com/embed/omni-calculator-logo-long.svg" /></a>
            </div>
            </div>
            <script async src="https://cdn.omnicalculator.com/sdk.js"></script>

        </div>

</div>

<div class="text-left" id="wallsquareDIV" style="display:none;">
    <!-- <div><input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" /><input type="text" class="form-control-plaintext float-left" value="Height/Depth" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" /><input type="text" class="form-control-plaintext float-left" value="Area" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="square meters (sqm)" /><input type="text" class="form-control-plaintext float-left" value="Volume needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="cubic meters (mᶟ)" /></div>
    <div class="text-center" title="metric tons (t)">
        <h1 class="text-center">OUTPUT</h1><input type="text" class="form-control-plaintext float-left" value="Weight needed" readonly style="width: 250px;font-size: 16px;text-align: left;" /><input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="metric tons (t)" title="metric tons (t)" disabled/>
    </div> -->
        <div id="embededcalculator">
            <div class="omni-calculator" data-calculator="construction/wall-square-footage" data-width="auto" data-config='{}' data-currency="PHP" data-show-row-controls="false" data-version="3" data-t="1631789710447">
            <div class="omni-calculator-header"></div>
            <div class="omni-calculator-footer">
                <a href="https://www.omnicalculator.com/construction/wall-square-footage" target="_blank"><img alt="Omni" class="omni-calculator-logo" src="https://cdn.omnicalculator.com/embed/omni-calculator-logo-long.svg" /></a>
            </div>
            </div>
            <script async src="https://cdn.omnicalculator.com/sdk.js"></script>

        </div>

</div>


<div class="text-left" id="rebarDIV" style="display:none;">
    <!-- <div>
        <h2 class="text-center">Slab Dimensions</h2>
        <input type="text" class="form-control-plaintext float-left" value="Length" readonly style="width: 250px;font-size: 16px;text-align: left;" />
        <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" />
        <input type="text" class="form-control-plaintext float-left" value="Width" readonly style="width: 250px;font-size: 16px;text-align: left;" />
        <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="meters (m)" />
        <h2 class="text-center">Spacings</h2>
        <input type="text" class="form-control-plaintext float-left" value="Rebar-rebar (grid)" readonly style="width: 250px;font-size: 16px;text-align: left;" />
        <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" placeholder="centimeters (cm)" />
        <input type="text" class="form-control-plaintext float-left" value="Edge-grid" readonly style="width: 250px;font-size: 16px;text-align: left;" />
        <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="centimeters (cm)" />
    </div>
    <div class="text-center" title="metric tons (t)">
        <h2 class="text-center">Results</h2>
        <input type="text" class="form-control-plaintext float-left" value="Grid length" readonly style="width: 250px;font-size: 16px;text-align: left;" /><
            input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="meters (m)" />
            <input type="text" class="form-control-plaintext float-left" value="Grid Width" readonly style="width: 250px;font-size: 16px;text-align: left;" />
            <input type="text" class="d-flex float-right" style="width: 280px;height: 38px;text-align: right;" placeholder="meters (m)" />
            <input type="text" class="form-control-plaintext float-left" value="Total rebars length" readonly style="width: 250px;font-size: 16px;text-align: left;" />
            <input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" title="metric tons (t)" placeholder="meters (m)" />
            <input type="text" class="form-control-plaintext float-left" value="Number of rebar pieces" readonly style="width: 250px;font-size: 16px;text-align: left;" />
            <input type="text" data-toggle="tooltip" class="d-flex float-right" style="width: 280px;height: 38px;opacity: 1;text-align: right;" title="metric tons (t)" disabled/>
    </div> -->

        <div>
            <div class="omni-calculator" data-calculator="construction/rebar" data-width="auto" data-config='{}' data-currency="PHP" data-show-row-controls="false" data-version="3" data-t="1631788646727">
            <div class="omni-calculator-header"></div>
            <div class="omni-calculator-footer">
                <a href="https://www.omnicalculator.com/construction/rebar" target="_blank"><img alt="Omni" class="omni-calculator-logo" src="https://cdn.omnicalculator.com/embed/omni-calculator-logo-long.svg" /></a>
            </div>
            </div>
            <script async src="https://cdn.omnicalculator.com/sdk.js"></script>
        </div>

</div></div>
            </div>
        </div>
    </section>
    <section class="text-center">
        <h1 class="text-center">Hardware Locator</h1>
        <form class="d-inline-flex"><input type="text" class="form-control" placeholder="Enter Location" id="locator" /><button class="btn btn-primary" type="button" style="color: var(--white);background: var(--yellow);width: 66px;height: 52px;"><i class="fa fa-search" style="background: var(--warning);"></i></button></form>
        <section class="map-clean">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Location </h2>
                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
                </div>
            </div><iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="450"></iframe>
        </section>
    </section>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/calculator.js"></script>

    <!-- FOOTER -->
<?php include '../../layout/footer.php' ?>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/calculator.js"></script>

</body>
</html>