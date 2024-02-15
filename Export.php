<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Export.css">
    <title>Export</title>
</head>
<body>
    <nav class="Bar">
       <a href="Main_Signed.html"><img src="Logo_Banner.jpg" alt="Lyra"></a> 
        <div class="links">
            <a href="About_Us_Signed.php">About Us</a>
          <a href="contactUs_Signed.php">Contact Us</a>
          <a href="Import.php">Import</a>
          <a href="Export.php">Export</a>
        </div>
      </nav>


      <div class="Info">
        <div class="InputGroup">
            <label for="Name"></label>
            <input type="text" name="Name" id="Name" placeholder="Name of the Company">
        </div>
    
        <div class="InputGroup">
            <label for="Country"></label>
            <input type="text" name="Country" id="Country" placeholder="Country">
        </div>
    
        <div class="InputGroup">
            <select name="cars" id="cars">
                <option value="volvo">Kosova</option>
                <option value="saab">Albania</option>
                <option value="opel">Bulgaria</option>
                <option value="audi">Hungary</option>
                <option value="audi">Srbia</option>
                <option value="audi">North Macedonia</option>
                <option value="audi">Bosnia and Herezegovina</option>
                <option value="audi">Montenegro</option>
              </select>
        </div>
    
        <div class="InputGroup">
            <label for="pName"></label>
            <input type="text" name="pName" id="pName" placeholder="Product Name">
        </div>
    
        <div class="InputGroup">
            <label for="eCountry"></label>
            <input type="text" name="eCountry" id="eCountry" placeholder="Country to Export">
        </div>
    
        <div class="InputGroup">
            <label for="Price"></label>
            <input type="text" name="Price" id="Price" placeholder="Price">
        </div>
    
        <div class="TextAreaGroup">
            <label for="txt">   </label>
            <textarea name="" id="txt" cols="30" rows="10" placeholder="Info for Product...."></textarea>
        </div>
    </div>

    <div class="hero" id="hero-1">
        <label for="input-file-1" class="drop-area">
            <input type="file" accept="image/*" id="input-file-1" class="input-file" hidden>
            <div class="img-view">
                <img src="Upload.jpg" alt="Upload">
                <p>Drag Icon and Upload</p>
                <span>Upload any image from desktop</span>
            </div>
        </label>
    </div>
    <script src="Export.js"></script>
</body>
</html>