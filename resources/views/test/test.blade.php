
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Show Hide Elements Using Checkboxes</title>
  
    <!--CSS stylesheet-->
    <style>
        .box {
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }
  
        .red {
            background: red;
        }
  
        .green {
            background: green;
        }
  
        .blue {
            background: blue;
        }
  
        label {
            margin-right: 15px;
        }
    </style>
  
    @include('test.test-scripts')
</head>
  
<body>
  
    <div>
        <!--checkboxes-->
        <label>
            <input type="checkbox" name="colorCheckbox" class="radio-custom-button" value="red">
            red
        </label>
  
        <label>
            <input type="checkbox" name="colorCheckbox" class="radio-custom-button" value="green"> 
            green
        </label>
  
        <label>
            <input type="checkbox" name="colorCheckbox" class="radio-custom-button" value="blue"> 
            blue
        </label>

        <button type="button" name="reset" class="reset-button" value="reset" >Reset</button> 
    </div>
  
    <!--Divisions to be shown and hidden-->
    <div class="red box">Red Selected</div>
    <div class="green box">Green Selected</div>
    <div class="blue box">Blue Selected</div>
</body>
  
</html>