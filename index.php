<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset = 'utf8_decode'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="basic.js"></script>
</head>
<body class='bg-dark'>
    <header>
        <!-- nav bar -->
        <nav class="navbar navbar-dark bg-dark" style = 'display: block'>
            <!-- Navbar content -->
            <ul class="nav nav-pills nav-justified" >
                <li ><a href="index.php" class="nav-link btn-primary">Home</a></li>
                <li ><a href="carssold.php" class="nav-link btn-secondary">sold</a></li>
            </ul>
        <div id='carinput'>
            <button type='button' style='display:block; width:100%;' class='btn btn-success' onclick="$(this).next().slideToggle();">Add Car</button>
            <form action="addcar.php" method='POST' style="display:none">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="stock#">stock#</label>
                        <input type="number" name="stock" id='stock#' class="form-control">
                    </div>
                    <div class="col-md-8 mb-9">
                        <label for="vin">vin#</label>
                        <input type="text" name="vin" id="vin_num" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="caryear" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="make">Make</label>
                        <input type="text" name="make" id="carmake" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="model">Model</label>
                        <input type="text" name="model" id="carmodel" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="cost">Cost</label>
                        <input type="number" name="cost" id="carcost" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inspection">Inspection</label>
                        <input type="text" class = "form-control" name="inspection" id="inspection" onfocus="(this.type='date')" onblur="(this.type='text')">
                    </div>
                    <div class="col-mb-2 mb-3">
                        <label for="buttons">pictures</label>
                        <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="checkbox" autocomplete="off"> taken
                        </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3"> 
                        <label for="submit">Done</label>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        </nav>
        <div id='mainCont'>
            <!-- sorting buttons -->
            <div id='sortbtn' style='margin-bottom: 4px;'>
            <button type="button" class="btn btn-primary" id='stock' onclick=sort(this)>stock number</button>
            <button type="button" class="btn btn-secondary" id='year' onclick=sort(this)>year</button>
            <button type="button" class="btn btn-secondary" id='make' onclick=sort(this)>make</button>
            <button type="button" class="btn btn-secondary" id='cost' onclick=sort(this)>cost</button>
        </div>
    </header>
    <table class = 'table'>
        <thead>
        <tr>
            <th width='7.33%'> stock </th>
            <th width='7.33%'> year </th>
            <th width='8.33%'> make </th>
            <th width='10.33%'> model </th>
            <th width='6.33%'> color </th>
            <th width='8.33%'> milage </th>
            <th width='7.33%'> cost </th>
            <th width='16.7%'> vin_num </th>
            <th width='10.33%'> inspection </th>
            <th width='6.33%'> title </th>
            <th width='4.165%'> picture </th>
            <th width='3%'></th>
        </tr>
        </thead>
        <tbody id='carlist'>
        </tbody>
        
    </table>
</body>
<script>
cars(1);
</script>
</html>
